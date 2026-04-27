<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientInfo;
use Illuminate\Support\Facades\Mail;
use App\Services\BulkSmsBdService;

class SendMessageController extends Controller
{
    public function index()
    {
        $clients = ClientInfo::orderBy('client_name', 'asc')->get();
        return view('admin.send-message.index', compact('clients'));
    }

    public function sendEmail(Request $request, BulkSmsBdService $smsService)
    {
        $request->validate([
            'client_id' => 'required_if:recipient_type,single|nullable|exists:client_info,id',
            'recipient_type' => 'required|in:single,all',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($request->recipient_type === 'single') {
            $client = ClientInfo::findOrFail($request->client_id);
            if (!$client->email) {
                return back()->with('error', 'Client does not have an email address.');
            }
            Mail::raw($request->message, function ($mail) use ($client, $request) {
                $mail->to($client->email)->subject($request->subject);
            });
            return back()->with('success', 'Email sent to ' . $client->client_name . ' successfully.');
        } else {
            $clients = ClientInfo::whereNotNull('email')->get();
            if ($clients->isEmpty()) {
                return back()->with('error', 'No clients with email addresses found.');
            }
            foreach ($clients as $client) {
                Mail::raw($request->message, function ($mail) use ($client, $request) {
                    $mail->to($client->email)->subject($request->subject);
                });
            }
            return back()->with('success', 'Email sent to ' . $clients->count() . ' clients successfully.');
        }
    }

    public function sendSms(Request $request, BulkSmsBdService $smsService)
    {
        $request->validate([
            'client_id' => 'required_if:recipient_type,single|nullable|exists:client_info,id',
            'recipient_type' => 'required|in:single,all',
            'message' => 'required|string|max:160',
        ]);

        if ($request->recipient_type === 'single') {
            $client = ClientInfo::findOrFail($request->client_id);
            if (!$client->mobile) {
                return back()->with('error', 'Client does not have a mobile number.');
            }
            $result = $smsService->sendSms($client->mobile, $request->message);
            if (isset($result['error'])) {
                return back()->with('error', 'SMS failed: ' . $result['error']);
            }
            $status = $result['status'] ?? 'unknown';
            $response = json_encode($result['response'] ?? $result);
            return back()->with('success', "SMS sent to {$client->client_name}. Status: {$status}. Response: {$response}");
        } else {
            $clients = ClientInfo::whereNotNull('mobile')->get();
            if ($clients->isEmpty()) {
                return back()->with('error', 'No clients with mobile numbers found.');
            }
            $results = [];
            foreach ($clients as $client) {
                $result = $smsService->sendSms($client->mobile, $request->message);
                $results[] = ['client' => $client->client_name, 'result' => $result];
            }
            return back()->with('success', 'SMS request sent to ' . $clients->count() . ' clients. Check logs for detailed status.');
        }
    }
}

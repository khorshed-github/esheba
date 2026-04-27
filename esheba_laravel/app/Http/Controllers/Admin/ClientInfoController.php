<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientInfo;

use Illuminate\Support\Facades\Mail;
use App\Services\BulkSmsBdService;

class ClientInfoController extends Controller
{
    // Send email to a single client
    public function sendEmail(Request $request, $id)
    {
        $client = ClientInfo::findOrFail($id);
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        Mail::raw($request->message, function ($mail) use ($client, $request) {
            $mail->to($client->email)
                ->subject($request->subject);
        });
        return back()->with('success', 'Email sent successfully.');
    }

    // Send email to all clients
    public function sendEmailAll(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        $clients = ClientInfo::whereNotNull('email')->get();
        foreach ($clients as $client) {
            Mail::raw($request->message, function ($mail) use ($client, $request) {
                $mail->to($client->email)
                    ->subject($request->subject);
            });
        }
        return back()->with('success', 'Emails sent to all clients.');
    }

    // Send SMS to a single client
    public function sendSms(Request $request, $id, BulkSmsBdService $smsService)
    {
        $client = ClientInfo::findOrFail($id);
        $request->validate([
            'message' => 'required|string',
        ]);
        $result = $smsService->sendSms($client->mobile, $request->message);
        if (isset($result['error'])) {
            return back()->with('error', 'SMS failed: ' . $result['error']);
        }
        $status = $result['status'] ?? 'unknown';
        $response = json_encode($result['response'] ?? $result);
        return back()->with('success', "SMS Status: {$status}. Response: {$response}");
    }

    // Send SMS to all clients
    public function sendSmsAll(Request $request, BulkSmsBdService $smsService)
    {
        $request->validate([
            'message' => 'required|string',
        ]);
        $clients = ClientInfo::whereNotNull('mobile')->get();
        $results = [];
        foreach ($clients as $client) {
            $results[] = $smsService->sendSms($client->mobile, $request->message);
        }
        return back()->with('success', 'SMS sent to all clients.');
    }
    public function index()
    {
        $clients = ClientInfo::orderBy('id', 'desc')->get();
        return view('admin.client-info.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.client-info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:50',
            'url' => 'nullable|url|max:255',
            'domain' => 'nullable|string|max:255',
            'hosting' => 'nullable|string|max:255',
            'expire_date' => 'nullable|date',
            'amount' => 'nullable|numeric',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->only(['company_name','client_name','email','mobile','url','domain','hosting','expire_date','amount']);
        $data['status'] = $request->has('status') ? 1 : 1; // default active

        ClientInfo::create($data);

        return redirect()->route('admin.client-info.index')->with('success', 'Client created successfully.');
    }

    public function show($id)
    {
        $client = ClientInfo::findOrFail($id);
        return view('admin.client-info.show', compact('client'));
    }

    public function edit($id)
    {
        $client = ClientInfo::findOrFail($id);
        return view('admin.client-info.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:50',
            'url' => 'nullable|url|max:255',
            'domain' => 'nullable|string|max:255',
            'hosting' => 'nullable|string|max:255',
            'expire_date' => 'nullable|date',
            'amount' => 'nullable|numeric',
            'status' => 'nullable|boolean',
        ]);

        $client = ClientInfo::findOrFail($id);
        $client->company_name = $request->company_name;
        $client->client_name = $request->client_name;
        $client->email = $request->email;
        $client->mobile = $request->mobile;
        $client->url = $request->url;
        $client->domain = $request->domain;
        $client->hosting = $request->hosting;
        $client->expire_date = $request->expire_date;
        $client->amount = $request->amount;
        $client->status = $request->has('status') ? 1 : $client->status;
        $client->save();

        return redirect()->route('admin.client-info.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $client = ClientInfo::findOrFail($id);
        $client->delete();
        return redirect()->route('admin.client-info.index')->with('success', 'Client deleted successfully.');
    }

    // Block/unblock client (toggle)
    public function block($id)
    {
        $client = ClientInfo::findOrFail($id);
        $client->status = $client->status ? 0 : 1;
        $client->save();
        $msg = $client->status ? 'Client unblocked.' : 'Client blocked.';
        return redirect()->route('admin.client-info.index')->with('success', $msg);
    }
}

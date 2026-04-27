<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BulkSmsBdService
{
    protected $apiUrl;
    protected $apiKey;
    protected $senderId;

    public function __construct()
    {
        $this->apiUrl = config('bulksmsbd.api_url');
        $this->apiKey = config('bulksmsbd.api_key');
        $this->senderId = config('bulksmsbd.sender_id');
    }

    public function sendSms($to, $message)
    {
        // Basic validation
        if (empty($this->apiUrl) || empty($this->apiKey) || empty($to) || empty($message)) {
            return ['success' => false, 'error' => 'Missing API credentials, destination number, or message.'];
        }

        try {
            $payload = [
                'api_key' => $this->apiKey,
                'type' => 'text',
                'number' => $to,
                'senderid' => $this->senderId,
                'message' => $message,
            ];

            $response = Http::asForm()->post($this->apiUrl, $payload);

            // log full response for debugging
            //\Log::info('BulkSmsBd sendSms response', ['url' => $this->apiUrl, 'payload' => $payload, 'status' => $response->status(), 'body' => $response->body()]);

            // try to decode json, otherwise return raw body
            $json = null;
            try {
                $json = $response->json();
            } catch (\Throwable $e) {
                $json = ['raw' => $response->body()];
            }

            return ['success' => $response->successful(), 'status' => $response->status(), 'response' => $json];
        } catch (\Throwable $e) {
            //\Log::error('BulkSmsBd sendSms exception', ['exception' => $e->getMessage()]);
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

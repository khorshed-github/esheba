<?php
return [
    'api_url' => env('BULKSMSBD_API_URL', 'https://bulksmsbd.net/api/sms/send'),
    'api_key' => env('BULKSMSBD_API_KEY'),
    'sender_id' => env('BULKSMSBD_SENDER_ID'),
];

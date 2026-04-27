<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\BulkSmsBdService;

class TestSms extends Command
{
    protected $signature = 'test:sms {number?} {message?}';
    protected $description = 'Test SMS sending';

    public function handle()
    {
        $number = $this->argument('number') ?? '+8801700000000';
        $message = $this->argument('message') ?? 'Test SMS from Laravel';

        $this->info("Testing SMS to: $number");
        $this->info("Message: $message");

        $service = app(BulkSmsBdService::class);
        $result = $service->sendSms($number, $message);

        $this->info('Result:');
        $this->line(json_encode($result, JSON_PRETTY_PRINT));
    }
}

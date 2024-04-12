<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Netgsm\Sms\SmsSend;

class SendReminderSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phoneNumber;
    protected $reminderTime;
    protected $reminderTemplate;

    public function __construct($phoneNumber, $reminderTime, $reminderTemplate)
    {
        $this->phoneNumber = $phoneNumber;
        $this->reminderTime = $reminderTime;
        $this->reminderTemplate = $reminderTemplate;
    }

    public function handle()
    {
        if (Carbon::now()->gte($this->reminderTime)) {
            return;
        }

        sleep($this->reminderTime->timestamp - Carbon::now()->timestamp);

        $this->sendSMS($this->phoneNumber, $this->reminderTemplate);
    }

    protected function sendSMS($phoneNumber, $message)
    {
        $sms = new SmsSend;

        $data = array(
            'msgheader' => env('NETGSM_HEADER'),
            'gsm' => $phoneNumber,
            'message' => $message,
            'filter' => '0',
        );

        return $sms->smsgonder1_1($data);
    }
}

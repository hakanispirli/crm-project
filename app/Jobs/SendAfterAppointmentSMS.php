<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Netgsm\Sms\SmsSend;

class SendAfterAppointmentSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phoneNumber;
    protected $afterAppointmentTime;

    public function __construct($phoneNumber, $afterAppointmentTime)
    {
        $this->phoneNumber = $phoneNumber;
        $this->afterAppointmentTime = $afterAppointmentTime;
    }

    public function handle()
    {
        if (Carbon::now()->gte($this->afterAppointmentTime)) {
            return;
        }

        sleep($this->afterAppointmentTime->timestamp - Carbon::now()->timestamp);

        $this->sendSMS($this->phoneNumber, 'Your after appointment SMS template goes here.');
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

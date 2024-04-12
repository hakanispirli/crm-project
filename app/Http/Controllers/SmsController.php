<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Netgsm\Sms\SmsSend;
use App\Models\Appointment;
use App\Models\SmsTemplate;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function SmsTemplate()
    {
        $smsTemplate = SmsTemplate::find(1);
        return view('sms.sms_template',compact('smsTemplate'));
    }

    public function UpdateSmsTemplate(Request $request)
    {
        SmsTemplate::find(1)->update([
            'first_appointment' => $request->first_appointment,
            'appointment_reminder' => $request->appointment_reminder,
            'after_appointment' => $request->after_appointment,
            'update_appointment' => $request->update_appointment,
        ]);

        $notification = array(
            'message' => 'Randevu SMS Şablonu Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SmsInformation()
    {
        $sms = new SmsSend;
        $appointments = Appointment::all();
        $smsGonderimleri = [];

        foreach ($appointments as $appointment) {
            $customerName = $appointment->customer->name;
            $phoneNumber = $appointment->customer->telefon;
            $date = $appointment->start;

            $data = [
                'adsoyad' => $customerName,
                'cepno' => $phoneNumber,
                'bastar' => $date,
            ];

            // Sms sorgulama işlemi burada yapılmalı
            $sonuc = $this->smsSorgulama($data);

            // Başarılı sorgulama durumu
            if (isset($sonuc['status']) && $sonuc['status'] === 'success') {
                $smsGonderimleri[] = [
                    'customerName' => $customerName,
                    'phoneNumber' => $phoneNumber,
                    'date' => $date,
                    'status' => 'success',
                ];
            } else { // Başarısız sorgulama durumu
                $errorMessage = isset($sonuc['error']) ? $sonuc['error'] : 'Failed to query SMS status.';
                \Illuminate\Support\Facades\Log::error('SMS query error: ' . $errorMessage);
            }
        }

        return view('sms.sms_information', compact('smsGonderimleri'));
    }

    public function smsSorgulama($data)
    {
        $sorguBasarili = true;

        if ($sorguBasarili) {
            return [
                'status' => 'success',
                'data' => [
                    'operator' => 'Türk Telekom',
                    'operatorCode' => '20',
                    'hataaciklama' => 'Hata Yok.',
                    'hatakod' => '0',
                    'cepno' => '905531105200',
                    'mesajboy' => '1',
                    'tarih' => '23.01.2023 09:35:00'
                ]
            ];
        } else {
            return [
                'status' => 'fail',
                'error' => 'Failed to query SMS status.'
            ];
        }
    }


}

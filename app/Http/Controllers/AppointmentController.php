<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Artist;
use App\Models\Service;
use Netgsm\Sms\SmsSend;
use App\Models\Customers;
use App\Models\Appointment;
use App\Models\SmsTemplate;
use Illuminate\Http\Request;
use App\Jobs\SendReminderSMS;
use App\Jobs\SendAfterAppointmentSMS;

class AppointmentController extends Controller
{
    public function RandevuListesi()
    {
        return view('appointment.all_appointments');
    }

    public function RandevuListesiGet()
    {
        $appointmentList = Appointment::with('customer','artist','service')->get();
        return response()->json(['success' => true, 'appointmentList' => $appointmentList]);
    }

    public function RandevuDetay($id)
    {
        $randevuBilgileri = Appointment::with('customer','artist','service')->find($id);
        return view('appointment.appointment_details', compact('randevuBilgileri'));
    }

    // API ISLEMLERI

    public function view()
    {
        $appointments = Appointment::all();
        $musteri = Customers::all();
        $sanatci = Artist::all();
        $service = Service::all();
        return view('appointment.appointments', compact('appointments','musteri','sanatci','service'));
    }

    public function get()
    {
        $appointments = Appointment::with('customer','artist','service')->get();
        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'customer_id' => 'required|integer',
            'artist_id' => 'required|integer',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'description' => 'nullable|string',
            'on_odeme' => 'nullable|integer',
            'toplam_odeme' => 'nullable|integer',
            'service_id' => 'nullable|integer',
            'dovme_modeli' => 'nullable',
        ]);

        if ($request->file('dovme_modeli')) {
            $image = $request->file('dovme_modeli');
            $imageName = uniqid().'.'.$image->extension();
            $image->move(public_path('upload/images'),$imageName);
            $save_url = 'upload/images/' . $imageName;
        } else {
            $save_url = null;
        }

        $appointment = new Appointment();
        $appointment->title = $request->input('title');
        $appointment->customer_id = $request->input('customer_id');
        $appointment->artist_id = $request->input('artist_id');
        $appointment->start = $request->input('start');
        $appointment->end = $request->input('end');
        $appointment->description = $request->input('description');
        $appointment->on_odeme = $request->input('on_odeme');
        $appointment->toplam_odeme = $request->input('toplam_odeme');
        $appointment->service_id = $request->input('service_id');
        $appointment->dovme_modeli = $save_url;
        $appointment->save();

        if ($appointment->wasRecentlyCreated) {
            $this->sendAppointmentSMS($appointment);
            return response()->json(['message' => 'Randevu başarılı şekilde oluşturuldu.'], 201);
        } else {
            return response()->json(['message' => 'Randevu oluşturulurken bir hata oluştu.'], 500);
        }
    }

    protected function sendAppointmentSMS($appointment)
    {
        $customerName = $appointment->customer->name;
        $startDateTime = Carbon::parse($appointment->start);
        $formattedStart = $startDateTime->format('d.m.Y H:i');

        $phoneNumber = $appointment->customer->telefon;
        $smsTemplates = SmsTemplate::first();

        $firstAppointmentTemplate = str_replace(['{name}', '{start}'], [$customerName, $formattedStart], $smsTemplates->first_appointment);
        $this->sendSMS($phoneNumber, $firstAppointmentTemplate);
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

        $smsStatus = $sms->smsgonder1_1($data);

        if ($smsStatus['code'] === '00') {
            \Illuminate\Support\Facades\Log::info('SMS sent successfully to ' . $phoneNumber);
            return true;
        } else {
            \Illuminate\Support\Facades\Log::info('Failed to send SMS to ' . $phoneNumber . ': ' . $smsStatus['aciklama']);
            return false;
        }
    }


    /**
     * Update the specified note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'customer_id' => 'required|integer',
            'artist_id' => 'required|integer',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'description' => 'nullable|string',
            'on_odeme' => 'nullable|integer',
            'toplam_odeme' => 'nullable|integer',
            'service_id' => 'nullable',
            'dovme_modeli' => 'nullable',
        ]);

        if ($request->hasFile('dovme_modeli')) {
            $image = $request->file('dovme_modeli');
            $imageName = uniqid().'.'.$image->extension();
            $image->move(public_path('upload/images'), $imageName);
            $saveUrl = 'upload/images/' . $imageName;

            if ($appointment->dovme_modeli) {
                if (file_exists(public_path($appointment->dovme_modeli))) {
                    unlink(public_path($appointment->dovme_modeli));
                }
            }
        } else {
            $saveUrl = $appointment->dovme_modeli;
        }

        $appointment->update([
            'title' => $request->input('title'),
            'customer_id' => $request->input('customer_id'),
            'artist_id' => $request->input('artist_id'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'description' => $request->input('description'),
            'on_odeme' => $request->input('on_odeme'),
            'toplam_odeme' => $request->input('toplam_odeme'),
            'service_id' => $request->input('service_id'),
            'dovme_modeli' => $saveUrl,
        ]);

        return response()->json($appointment, 200);
    }
}

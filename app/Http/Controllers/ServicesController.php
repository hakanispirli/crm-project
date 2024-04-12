<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function ServicesView()
    {
        return view('services.services');
    }

    public function ServicesGet()
    {
        $services = Service::all();
        return response()->json(['success' => true, 'services' => $services]);
    }

    public function ServicesAdd(Request $request)
    {
        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        $services = new Service();
        $services->service_name = $validatedData['service_name'];
        $services->save();

        return response()->json(['success' => true, 'message' => 'Hizmet başarıyla eklendi']);
    }

    public function ServicesEdit($id)
    {
        $services = Service::find($id);
        return view('services.edit_services', compact('services'));
    }

    public function ServicesUpdate(Request $request)
    {
        $services_id = $request->id;

        Service::find($services_id)->update([
            'service_name' => $request->service_name,
        ]);

        $notification = array(
            'message' => 'Hizmet Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('services.view')->with($notification);

    }

    public function ServicesDelete($id)
    {
        $services = Service::find($id);
        $services->delete();

        $notification = array(
            'message' => 'Hizmet Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('services.view')->with($notification);
    }
}

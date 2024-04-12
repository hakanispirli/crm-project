<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function Customers ()
    {
        return view('customers.customers');
    }

    public function allCustomers()
    {
        $customers = Customers::all();
        return response()->json(['success' => true, 'customers' => $customers]);
    }

    public function EditCustomer($id)
    {
        $customer = Customers::find($id);
        return view('customers.edit_customers', compact('customer'));
    }

    public function UpdateCustomer(Request $request)
    {
        $customer_id = $request->id;

        Customers::find($customer_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefon' => $request->telefon,
        ]);

        $notification = array(
            'message' => 'Müşteri Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('customers')->with($notification);

    }

    public function AddCustomers(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers|max:255',
            'telefon' => 'required|max:11',
        ]);

        $customer = new Customers();
        $customer->name = $validatedData['name'];
        $customer->email = $validatedData['email'];
        $customer->telefon = $validatedData['telefon'];
        $customer->save();

        return response()->json(['success' => true, 'message' => 'Müşteri başarıyla eklendi']);
    }

    public function DeleteCustomer($id)
    {
        $customer = Customers::find($id);
        $customer->delete();

        $notification = array(
            'message' => 'Müşteri Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('customers')->with($notification);
    }

}

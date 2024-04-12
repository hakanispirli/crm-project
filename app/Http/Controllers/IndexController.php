<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        return view('admin_login');
    }

    public function Faq()
    {
        return view('faq');
    }

    public function LoginSubmit(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgilerle eşleşen bir hesap bulunamadı.',
        ]);
    }

    public function Logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Çıkış Başarılı',
            'alert-type' =>'success'
        );

        return redirect('/')->with($notification);
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('profile.profile_setting', compact('profileData'));
    }

    public function ProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->telefon = $request->telefon;

        if ($request->file('gorsel')) {
            $file = $request->file('gorsel');
            @unlink(public_path('upload/admin_images/'.$data->gorsel));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['gorsel'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profil Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(Request $request)
    {
        $request->validate([
            'old_password'  =>  'required',
            'new_password'  =>  'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Mevcut şifreyi yanlış girildi!',
                'alert-type' =>'error'
            );
            return back()->with($notification);
        }

        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Şifre başarılı şekilde değiştirildi.',
            'alert-type' =>'success'
        );
        return back()->with($notification);
    }

    public function Dashboard()
    {
        $product = Product::all();
        $users = User::all();
        $orders = Order::all();
        $customers = Customers::all();
        $appointment = Appointment::with('customer')->get();
        return view('dashboard', compact('product' , 'orders' , 'customers','appointment','users'));
    }
}

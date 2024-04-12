<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LockScreenController extends Controller
{
    public function showLockScreenForm()
    {
        return view('include.lock_screen');
    }

    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        } else {
            return back()->withErrors(['password' => 'Hatalı Şifre.'])->withInput();
        }
    }
}

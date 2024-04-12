<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin_login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Giriş başarılı olduğunda giriş denemesini kaydet
        $this->recordLoginAttempt(true, $request);

        $notification = array(
            'message' => 'Giriş Başarılı',
            'alert-type' =>'success'
        );

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function recordLoginAttempt(bool $isSuccessful, LoginRequest $request): void
    {
        // Giriş yapan kullanıcıyı al
        $user = Auth::user();

        // Kullanıcının bilgilerini güncelle
        $user->last_successful_login_at = now();
        $user->last_login_ip = $request->ip();
        $user->save();
    }

}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/admin/dashboard'); // atau route setelah login
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email atau password salah.',
    //     ])->withInput($request->only('email'));
    // }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Mohon centang verifikasi reCAPTCHA.',
        ]);

        // Verifikasi token ke Google
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $googleResult = $response->json();

        if (!isset($googleResult['success']) || $googleResult['success'] !== true) {
            return back()->withErrors([
                'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.',
            ])->withInput();
        }

        // Lanjut login
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/openbeacon');
    }
}

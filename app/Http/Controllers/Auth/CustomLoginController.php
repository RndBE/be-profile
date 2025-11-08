<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
        $this->checkTooManyLoginAttempts($request); // cek batas percobaan

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Mohon centang verifikasi reCAPTCHA.',
        ]);

        // Verifikasi reCAPTCHA ke Google
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

        // Jika login berhasil
        if (Auth::attempt($request->only('email', 'password'))) {
    RateLimiter::clear($this->throttleKey($request));
    session()->forget('login_wait_seconds'); // reset waktu tunggu
    $request->session()->regenerate();
    return redirect()->intended('/admin/dashboard');
}


        // Login gagal → tambah hitungan
        RateLimiter::hit($this->throttleKey($request));

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    protected function checkTooManyLoginAttempts(Request $request)
{
    $maxAttempts = 3; // maksimal percobaan
    $decayMinutes = 1; // waktu tunggu (1 menit)

    if (RateLimiter::tooManyAttempts($this->throttleKey($request), $maxAttempts)) {
        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        // Simpan waktu tunggu di session agar bisa ditampilkan di frontend
        session()->put('login_wait_seconds', $seconds);

        throw ValidationException::withMessages([
            'email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam $seconds detik.",
        ]);
    }
}




    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/openbeacon');
    }
}

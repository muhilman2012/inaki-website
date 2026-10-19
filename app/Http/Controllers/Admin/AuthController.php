<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Tampilkan formulir login admin.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check() && Auth::user()->isAdmin() && Auth::user()->is_active) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Proses otentikasi login admin secara aman.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Alamat email administrator wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $throttleKey = Str::transliterate(Str::lower($request->input('email')) . '|' . $request->ip());

        // Perlindungan serangan Brute-Force (Maks 5 percobaan per menit)
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => "Terlalu banyak percobaan login gagal. Demi keamanan, silakan tunggu {$seconds} detik sebelum mencoba kembali.",
                ]);
        }

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            RateLimiter::hit($throttleKey, 60);

            $attemptsLeft = RateLimiter::remaining($throttleKey, 5);
            $warningMsg = $attemptsLeft > 0
                ? "Kombinasi email atau kata sandi salah. Sisa percobaan: {$attemptsLeft} kali."
                : 'Kombinasi email atau kata sandi salah. Akun terkunci sementara.';

            return back()->withInput($request->only('email', 'remember'))
                ->withErrors(['email' => $warningMsg]);
        }

        $user = Auth::user();

        // Validasi status aktif akun
        if (!$user->is_active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Akun Administrator Anda telah dinonaktifkan oleh sistem. Hubungi administrator utama.']);
        }

        // Validasi hak akses role administrator
        if (!$user->isAdmin()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'Akses ditolak. Akun Anda tidak memiliki hak akses administrator.']);
        }

        // Bersihkan counter rate limiter setelah sukses login
        RateLimiter::clear($throttleKey);

        // Rekam riwayat waktu dan IP login terakhir
        $user->forceFill([
            'last_login_at' => now(),
            'last_login_ip' => $request->ip(),
        ])->save();

        // Regenerasi ID sesi untuk pencegahan serangan Session Fixation
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'))
            ->with('success', 'Selamat datang kembali, ' . $user->name . '! Sesi Administrator aktif.');
    }

    /**
     * Logout administrator dan bersihkan sesi secara aman.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Anda telah berhasil keluar dari Portal Administrator INAKI.');
    }
}

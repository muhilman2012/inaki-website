<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->guest(route('admin.login'))
                ->with('warning', 'Silakan masuk terlebih dahulu untuk mengakses Panel Administrator.');
        }

        $user = Auth::user();

        if (!$user->is_active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Akun Administrator Anda berstatus non-aktif. Silakan hubungi pengurus pusat INAKI.']);
        }

        if (!$user->isAdmin()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Akses ditolak. Akun Anda tidak memiliki hak akses sebagai Administrator.']);
        }

        return $next($request);
    }
}

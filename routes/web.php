<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MemberVerificationController;
use App\Http\Controllers\MemberRegistrationController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

// ==========================================
// RUTE WEBSITE PUBLIK INAKI
// ==========================================

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/publikasi', function () {
    return view('publikasi');
})->name('publikasi');

// Rute Keamanan Unduh & Pratinjau Dokumen Publikasi Resmi
Route::get('/publikasi/unduh/{slug}', [PublicationController::class, 'download'])
    ->where('slug', '[a-z0-9\-]+')
    ->name('publikasi.unduh');

Route::get('/publikasi/baca/{slug}', [PublicationController::class, 'preview'])
    ->where('slug', '[a-z0-9\-]+')
    ->name('publikasi.baca');

// Rute Layanan Keanggotaan Publik & Pendaftaran Online
Route::get('/keanggotaan', function () {
    return view('keanggotaan');
})->name('keanggotaan');

Route::get('/keanggotaan/daftar', [MemberRegistrationController::class, 'create'])->name('keanggotaan.daftar');
Route::post('/keanggotaan/daftar', [MemberRegistrationController::class, 'store'])->name('keanggotaan.daftar.submit');
Route::get('/keanggotaan/daftar/sukses/{code}', [MemberRegistrationController::class, 'sukses'])->name('keanggotaan.sukses');
Route::get('/keanggotaan/status', [MemberRegistrationController::class, 'cekStatus'])->name('keanggotaan.status');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/audio-stream/mars-inaki', function () {
    return response()->file(public_path('audio/mars-inaki.mp3'), [
        'Content-Type' => 'audio/mpeg',
        'Accept-Ranges' => 'bytes',
    ]);
})->name('audio.mars');

// Pintasan & Pengalihan Publik
Route::redirect('/peraturan', '/publikasi#direktori-regulasi');
Route::redirect('/keanggotaan/perpanjang', '/keanggotaan/status')->name('keanggotaan.perpanjang');

// Rute Akses Login Repositori Anggota (Fitur dalam Pengembangan)
Route::get('/repository/login', function () {
    return view('publikasi.repository-login');
})->name('repository.login');

Route::get('/login', function () {
    return redirect()->route('repository.login');
})->name('login');


// ==========================================
// RUTE PORTAL ADMINISTRATOR INAKI
// ==========================================

Route::prefix('admin')->group(function () {
    // Rute Tamu Admin (Belum Login)
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    });

    // Rute Terproteksi Administrator
    Route::middleware('admin.auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/publikasi', [AdminDashboardController::class, 'publikasi'])->name('admin.publikasi');
        Route::get('/regulasi', [AdminDashboardController::class, 'regulasi'])->name('admin.regulasi');
        Route::get('/pengaturan', [AdminDashboardController::class, 'pengaturan'])->name('admin.pengaturan');

        // Manajemen & Verifikasi Keanggotaan
        Route::get('/anggota', [MemberVerificationController::class, 'index'])->name('admin.anggota');
        Route::get('/anggota/{id}', [MemberVerificationController::class, 'show'])->name('admin.anggota.detail');
        Route::post('/anggota/{id}/verifikasi', [MemberVerificationController::class, 'verify'])->name('admin.anggota.verifikasi');
        Route::post('/anggota/{id}/tolak', [MemberVerificationController::class, 'reject'])->name('admin.anggota.tolak');
        Route::post('/anggota/{id}/kembalikan', [MemberVerificationController::class, 'revert'])->name('admin.anggota.kembalikan');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});

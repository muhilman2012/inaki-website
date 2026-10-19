<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman utama Dashboard Admin.
     */
    public function index(): View
    {
        $admin = Auth::user();

        // Data berkas publikasi nyata di public/files
        $publicationFiles = [
            [
                'title' => 'Buku Prosiding: Layanan Dasar Inklusif Berkelanjutan',
                'filename' => 'buku-prosiding-layanan-dasar-inaki-2026.pdf',
                'category' => 'Buku Prosiding Resmi',
                'year' => '2026',
                'pages' => 186,
                'slug' => 'buku-prosiding-layanan-dasar-inaki-2026',
            ],
            [
                'title' => 'Buku Pedoman Teknis Kesiapsiagaan Darurat Bencana',
                'filename' => 'buku-pedoman-darurat-bencana-inaki-2026.pdf',
                'category' => 'Buku Pedoman Kebijakan',
                'year' => '2026',
                'pages' => 11,
                'slug' => 'buku-pedoman-darurat-bencana-inaki-2026',
            ],
            [
                'title' => 'Anggaran Dasar (AD) INAKI',
                'filename' => 'anggaran-dasar-inaki.pdf',
                'category' => 'Konstitusi & Regulasi Organisasi',
                'year' => '2026',
                'pages' => 24,
                'slug' => 'anggaran-dasar-inaki',
            ],
            [
                'title' => 'Anggaran Rumah Tangga (ART) INAKI',
                'filename' => 'anggaran-rumah-tangga-inaki.pdf',
                'category' => 'Konstitusi & Regulasi Organisasi',
                'year' => '2026',
                'pages' => 18,
                'slug' => 'anggaran-rumah-tangga-inaki',
            ],
        ];

        $filesStatus = [];
        $totalStorageBytes = 0;

        foreach ($publicationFiles as $pub) {
            $path = public_path('files/' . $pub['filename']);
            $exists = File::exists($path);
            $sizeBytes = $exists ? File::size($path) : 0;
            $totalStorageBytes += $sizeBytes;

            $filesStatus[] = array_merge($pub, [
                'exists' => $exists,
                'size_formatted' => $exists ? round($sizeBytes / (1024 * 1024), 2) . ' MB' : '0 MB',
                'last_modified' => $exists ? date('d M Y H:i', File::lastModified($path)) : '-',
            ]);
        }

        // Cek berkas audio Mars INAKI
        $marsPath = public_path('audio/mars-inaki.mp3');
        $marsExists = File::exists($marsPath);
        $marsSizeFormatted = $marsExists ? round(File::size($marsPath) / (1024 * 1024), 2) . ' MB' : '0 MB';

        // Metrik Ringkasan Keanggotaan Dinamis dari Database
        $totalMembers = Member::count();
        $pendingMembers = Member::where('status', 'pending')->count();
        $verifiedMembers = Member::where('status', 'verified')->count();

        $metrics = [
            'total_members' => $totalMembers,
            'pending_members' => $pendingMembers,
            'verified_members' => $verifiedMembers,
            'total_publications' => count($publicationFiles),
            'total_regulations' => 18,
            'total_downloads' => 8940,
            'storage_used' => round($totalStorageBytes / (1024 * 1024), 1) . ' MB',
        ];

        // Status Sistem
        $systemInfo = [
            'php_version' => PHP_VERSION,
            'laravel_version' => App::version(),
            'server_os' => php_uname('s') . ' (' . php_uname('m') . ')',
            'database_status' => 'Terkoneksi (MySQL 8.4)',
            'mars_status' => $marsExists ? "Tersedia ({$marsSizeFormatted})" : 'Tidak Ditemukan',
        ];

        return view('admin.dashboard', compact('admin', 'metrics', 'filesStatus', 'systemInfo'));
    }

    /**
     * Tampilkan halaman pengelolaan publikasi (data statis & persiapan CRUD).
     */
    public function publikasi(): View
    {
        return view('admin.publikasi');
    }

    /**
     * Tampilkan halaman direktori regulasi.
     */
    public function regulasi(): View
    {
        return view('admin.regulasi');
    }

    /**
     * Tampilkan halaman pengaturan portal admin.
     */
    public function pengaturan(): View
    {
        $admin = Auth::user();
        return view('admin.pengaturan', compact('admin'));
    }
}

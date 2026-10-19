<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PublicationController extends Controller
{
    /**
     * Whitelist publikasi resmi yang diizinkan untuk diunduh dan dipratinjau.
     * Menggunakan whitelist mencegah kerentanan Path Traversal / Arbitrary File Download (CWE-22).
     */
    public const PUBLICATIONS = [
        'prosiding-layanan-dasar-2026' => [
            'filename' => 'buku-prosiding-layanan-dasar-inaki-2026.pdf',
            'download_name' => 'Buku-Prosiding-INAKI-Layanan-Dasar-Inklusif-2026.pdf',
            'title' => 'Kumpulan Dokumen Risalah Kebijakan (Policy Brief) Terpilih tentang Layanan Dasar yang Inklusif',
        ],
        'pedoman-darurat-bencana-2026' => [
            'filename' => 'buku-pedoman-darurat-bencana-inaki-2026.pdf',
            'download_name' => 'Buku-Pedoman-Pelayanan-Darurat-Bencana-INAKI-2026.pdf',
            'title' => 'Pedoman Pelayanan Darurat Pasca Bencana Tingkat Pemerintah Daerah Tahun 2026',
        ],
        'anggaran-dasar-inaki' => [
            'filename' => 'anggaran-dasar-inaki.pdf',
            'download_name' => 'Anggaran-Dasar-INAKI.pdf',
            'title' => 'Anggaran Dasar Perkumpulan Ikatan Analis Kebijakan Indonesia (INAKI)',
        ],
        'anggaran-rumah-tangga-inaki' => [
            'filename' => 'anggaran-rumah-tangga-inaki.pdf',
            'download_name' => 'Anggaran-Rumah-Tangga-INAKI.pdf',
            'title' => 'Anggaran Rumah Tangga (ART) Ikatan Nasional Kebijakan Indonesia (INAKI)',
        ],
    ];

    /**
     * Ambil path file yang aman dan terverifikasi di storage.
     */
    protected function getSafeFilePath(string $slug): array
    {
        // 1. Validasi format slug strictly alphanumeric dan strip
        if (!preg_match('/^[a-z0-9\-]+$/', $slug) || !array_key_exists($slug, self::PUBLICATIONS)) {
            abort(404, 'Dokumen publikasi tidak ditemukan atau tidak tersedia.');
        }

        $publication = self::PUBLICATIONS[$slug];
        $filename = basename($publication['filename']);

        // 2. Prioritaskan penyimpanan aman di storage/app/publications
        $storageDir = storage_path('app/publications');
        $targetPath = $storageDir . DIRECTORY_SEPARATOR . $filename;

        // Fallback jika berada di public/files
        if (!file_exists($targetPath)) {
            $fallbackDir = public_path('files');
            $targetPath = $fallbackDir . DIRECTORY_SEPARATOR . $filename;
        }

        // 3. Verifikasi realpath untuk memastikan tidak terjadi escape direktori
        $realPath = realpath($targetPath);
        $realStorageDir = realpath($storageDir);
        $realPublicDir = realpath(public_path('files'));

        $isInsideStorage = $realStorageDir && $realPath && str_starts_with($realPath, $realStorageDir);
        $isInsidePublic = $realPublicDir && $realPath && str_starts_with($realPath, $realPublicDir);

        if (!$realPath || (!$isInsideStorage && !$isInsidePublic) || !is_file($realPath)) {
            abort(404, 'Berkas dokumen fisik tidak ditemukan di repositori server.');
        }

        return [$realPath, $publication];
    }

    /**
     * Header keamanan HTTP standar untuk pencegahan MIME-sniffing dan XSS.
     */
    protected function getSecurityHeaders(): array
    {
        return [
            'Content-Type' => 'application/pdf',
            'X-Content-Type-Options' => 'nosniff',
            'X-Frame-Options' => 'SAMEORIGIN',
            'Content-Security-Policy' => "default-src 'none'; style-src 'unsafe-inline';",
            'Cache-Control' => 'private, max-age=3600, must-revalidate',
        ];
    }

    /**
     * Unduh file publikasi secara aman dengan Content-Disposition attachment.
     */
    public function download(string $slug): BinaryFileResponse
    {
        [$filePath, $publication] = $this->getSafeFilePath($slug);
        $headers = $this->getSecurityHeaders();

        return response()->download($filePath, $publication['download_name'], $headers);
    }

    /**
     * Pratinjau / baca dokumen di browser tab dengan Content-Disposition inline.
     */
    public function preview(string $slug): BinaryFileResponse
    {
        [$filePath, $publication] = $this->getSafeFilePath($slug);
        $headers = array_merge($this->getSecurityHeaders(), [
            'Content-Disposition' => 'inline; filename="' . $publication['download_name'] . '"',
        ]);

        return response()->file($filePath, $headers);
    }
}

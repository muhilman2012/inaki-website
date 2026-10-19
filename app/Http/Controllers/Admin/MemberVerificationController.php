<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MemberVerificationController extends Controller
{
    /**
     * Tampilkan daftar seluruh permohonan keanggotaan dengan filter & pencarian.
     */
    public function index(Request $request): View
    {
        $status = $request->input('status', 'all');
        $search = trim($request->input('q', ''));
        $tipe = $request->input('tipe', 'all');

        $query = Member::query()->latest();

        if ($status !== 'all' && in_array($status, ['pending', 'verified', 'rejected'])) {
            $query->where('status', $status);
        }

        if ($tipe !== 'all' && in_array($tipe, ['CPNS', 'PNS', 'PPPK', 'NON ASN'])) {
            $query->where('tipe_profesi', $tipe);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('hp', 'like', "%{$search}%")
                    ->orWhere('nama_organisasi', 'like', "%{$search}%")
                    ->orWhere('nomor_kta', 'like', "%{$search}%")
                    ->orWhere('registration_code', 'like', "%{$search}%");
            });
        }

        $members = $query->paginate(15)->withQueryString();

        $counts = [
            'total' => Member::count(),
            'pending' => Member::where('status', 'pending')->count(),
            'verified' => Member::where('status', 'verified')->count(),
            'rejected' => Member::where('status', 'rejected')->count(),
        ];

        return view('admin.anggota', compact('members', 'counts', 'status', 'search', 'tipe'));
    }

    /**
     * Tampilkan detail verifikasi satu calon anggota.
     */
    public function show(int $id): View
    {
        $member = Member::with('verifier')->findOrFail($id);

        return view('admin.anggota-detail', compact('member'));
    }

    /**
     * Setujui pendaftaran dan terbitkan Nomor KTA Digital.
     */
    public function verify(Request $request, int $id): RedirectResponse
    {
        $member = Member::findOrFail($id);

        $customKta = trim($request->input('custom_kta', ''));
        $nomorKta = $customKta !== '' ? $customKta : ($member->nomor_kta ?: Member::generateKtaNumber());

        $member->update([
            'status' => 'verified',
            'nomor_kta' => $nomorKta,
            'catatan_verifikasi' => $request->input('catatan_verifikasi', 'Berkas persyaratan lengkap, transfer pembayaran tervalidasi, dan KTA Digital resmi diterbitkan.'),
            'verified_at' => now(),
            'verified_by' => Auth::id(),
        ]);

        return redirect()->back()
            ->with('success', "Keanggotaan atas nama {$member->nama} berhasil diverifikasi! Nomor KTA: {$nomorKta}.");
    }

    /**
     * Tolak pendaftaran keanggotaan dengan alasan catatan.
     */
    public function reject(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'alasan_penolakan' => ['required', 'string', 'max:500'],
        ], [
            'alasan_penolakan.required' => 'Wajib memberikan alasan penolakan berkas calon anggota.',
        ]);

        $member = Member::findOrFail($id);

        $member->update([
            'status' => 'rejected',
            'catatan_verifikasi' => $request->input('alasan_penolakan'),
            'verified_at' => now(),
            'verified_by' => Auth::id(),
        ]);

        return redirect()->back()
            ->with('warning', "Pendaftaran {$member->nama} ditandai sebagai Ditolak dengan alasan: {$request->input('alasan_penolakan')}");
    }

    /**
     * Kembalikan status ke Menunggu Verifikasi (Pending).
     */
    public function revert(int $id): RedirectResponse
    {
        $member = Member::findOrFail($id);

        $member->update([
            'status' => 'pending',
            'verified_at' => null,
            'verified_by' => null,
        ]);

        return redirect()->back()
            ->with('success', "Status pendaftaran {$member->nama} berhasil dikembalikan ke status Menunggu Verifikasi.");
    }
}

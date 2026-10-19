<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MemberRegistrationController extends Controller
{
    /**
     * Tampilkan formulir pendaftaran anggota baru.
     */
    public function create(): View
    {
        return view('keanggotaan.daftar');
    }

    /**
     * Simpan data pendaftaran anggota baru dan unggah berkas persyaratan.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'jenis_kelamin' => ['required', 'in:LAKI-LAKI,PEREMPUAN'],
            'agama' => ['required', 'string', 'max:50'],
            'tipe_profesi' => ['required', 'in:CPNS,PNS,PPPK,NON ASN'],
            'jenis_jfak' => ['required', 'string', 'max:100'],
            'jenis_jfak_custom' => ['nullable', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:30'],
            'pangkat_gol' => ['required', 'string', 'max:100'],
            'pendidikan_terakhir' => ['required', 'string', 'max:50'],
            'nama_organisasi' => ['required', 'string', 'max:255'],
            'unit_organisasi' => ['required', 'string', 'max:255'],
            'kepakaran' => ['required', 'array', 'min:1'],
            'kepakaran.*' => ['string'],
            'kepakaran_custom' => ['nullable', 'string', 'max:255'],
            'hp' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'file_sk' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:1024'], // Maksimal 1 MB
            'file_tf' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:1024'], // Maksimal 1 MB
            'file_foto' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:1024'],   // Pas foto 3x4 Maksimal 1 MB
        ], [
            'nama.required' => 'Nama lengkap tanpa gelar wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib dipilih.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'agama.required' => 'Agama wajib dipilih.',
            'tipe_profesi.required' => 'Tipe profesi (CPNS/PNS/PPPK/NON ASN) wajib dipilih.',
            'jenis_jfak.required' => 'Jenis jabatan JFAK wajib dipilih.',
            'nip.required' => 'NIP wajib diisi (isikan tanda - jika Non ASN).',
            'pangkat_gol.required' => 'Pangkat/Golongan wajib dipilih (isikan tanda - jika Non ASN).',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib dipilih.',
            'nama_organisasi.required' => 'Nama organisasi/instansi lengkap wajib diisi.',
            'unit_organisasi.required' => 'Unit organisasi/eselon/OPD wajib diisi.',
            'kepakaran.required' => 'Pilih minimal 1 (satu) bidang kepakaran Saudara.',
            'hp.required' => 'Nomor WhatsApp aktif wajib diisi.',
            'email.required' => 'Alamat email aktif wajib diisi.',
            'file_sk.required' => 'Berkas SK Jabatan JFAK / SK Profesi wajib diunggah.',
            'file_sk.max' => 'Ukuran berkas SK maksimal 1 MB.',
            'file_tf.required' => 'Bukti transfer pendaftaran Rp 150.000 wajib diunggah.',
            'file_tf.max' => 'Ukuran berkas bukti transfer maksimal 1 MB.',
            'file_foto.required' => 'Pas foto 3x4 berwarna wajib diunggah.',
            'file_foto.max' => 'Ukuran pas foto maksimal 1 MB.',
            'file_foto.mimes' => 'Pas foto harus berformat JPG, JPEG, atau PNG.',
        ]);

        // Simpan Berkas Unggahan
        $pathSk = $request->file('file_sk')->store('members/sk', 'public');
        $pathTf = $request->file('file_tf')->store('members/tf', 'public');
        $pathFoto = $request->file('file_foto')->store('members/foto', 'public');

        // Standarisasi Teks Huruf Kapital Sesuai Ketentuan Formulir
        $namaFormatted = Str::upper(trim($validated['nama']));
        $tempatLahirFormatted = Str::upper(trim($validated['tempat_lahir']));
        $organisasiFormatted = Str::upper(trim($validated['nama_organisasi']));
        $unitFormatted = Str::upper(trim($validated['unit_organisasi']));
        $jenisJfakCustom = !empty($validated['jenis_jfak_custom']) ? Str::upper(trim($validated['jenis_jfak_custom'])) : null;
        $kepakaranCustom = !empty($validated['kepakaran_custom']) ? Str::upper(trim($validated['kepakaran_custom'])) : null;

        // Bersihkan NIP (hapus spasi jika ada)
        $nipClean = Str::replace(' ', '', trim($validated['nip']));

        // Buat Kode Registrasi Unik
        $registrationCode = Member::generateRegistrationCode();

        $member = Member::create([
            'registration_code' => $registrationCode,
            'nama' => $namaFormatted,
            'tempat_lahir' => $tempatLahirFormatted,
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => Str::upper($validated['agama']),
            'tipe_profesi' => $validated['tipe_profesi'],
            'jenis_jfak' => $validated['jenis_jfak'],
            'jenis_jfak_custom' => $jenisJfakCustom,
            'nip' => $nipClean,
            'pangkat_gol' => $validated['pangkat_gol'],
            'pendidikan_terakhir' => $validated['pendidikan_terakhir'],
            'nama_organisasi' => $organisasiFormatted,
            'unit_organisasi' => $unitFormatted,
            'kepakaran' => $validated['kepakaran'],
            'kepakaran_custom' => $kepakaranCustom,
            'hp' => trim($validated['hp']),
            'email' => Str::lower(trim($validated['email'])),
            'file_sk' => $pathSk,
            'file_tf' => $pathTf,
            'file_foto' => $pathFoto,
            'status' => 'pending',
        ]);

        return redirect()->route('keanggotaan.sukses', ['code' => $member->registration_code])
            ->with('registration_success', true);
    }

    /**
     * Tampilkan halaman konfirmasi berhasil mendaftar.
     */
    public function sukses(string $code): View|RedirectResponse
    {
        $member = Member::where('registration_code', $code)->firstOrFail();

        return view('keanggotaan.sukses', compact('member'));
    }

    /**
     * Cek status pendaftaran mandiri oleh calon anggota (pencarian via NIP, Email, atau Kode).
     */
    public function cekStatus(Request $request): View
    {
        $query = trim($request->input('q', ''));
        $result = null;

        if ($query !== '') {
            $result = Member::where('registration_code', $query)
                ->orWhere('nip', $query)
                ->orWhere('email', $query)
                ->orWhere('nomor_kta', $query)
                ->first();
        }

        return view('keanggotaan.status', compact('query', 'result'));
    }
}

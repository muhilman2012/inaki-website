<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MemberRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Halaman formulir pendaftaran anggota dapat dimuat dengan baik.
     */
    public function test_registration_form_screen_can_be_rendered(): void
    {
        $response = $this->get('/keanggotaan/daftar');

        $response->assertStatus(200);
        $response->assertSee('Pendaftaran Anggota INAKI');
        $response->assertSee('Bank BNI');
        $response->assertSee('8881146255');
        $response->assertSee('Rp 150.000');
    }

    /**
     * Validasi gagal jika data wajib belum diisi.
     */
    public function test_registration_fails_when_required_fields_are_missing(): void
    {
        $response = $this->post('/keanggotaan/daftar', []);

        $response->assertSessionHasErrors([
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'tipe_profesi',
            'jenis_jfak',
            'nip',
            'pangkat_gol',
            'pendidikan_terakhir',
            'nama_organisasi',
            'unit_organisasi',
            'kepakaran',
            'hp',
            'email',
            'file_sk',
            'file_tf',
            'file_foto',
        ]);
    }

    /**
     * Calon anggota dapat berhasil mendaftar dengan data lengkap dan berkas valid.
     */
    public function test_prospective_member_can_register_successfully(): void
    {
        Storage::fake('public');

        $skFile = UploadedFile::fake()->create('sk-jabatan.pdf', 500, 'application/pdf');
        $tfFile = UploadedFile::fake()->image('bukti-transfer.jpg', 600, 800);
        $fotoFile = UploadedFile::fake()->image('pas-foto.jpg', 300, 400);

        $formData = [
            'nama' => 'rendy kurniawan saputra',
            'tempat_lahir' => 'surabaya',
            'tanggal_lahir' => '1990-06-15',
            'jenis_kelamin' => 'LAKI-LAKI',
            'agama' => 'ISLAM',
            'tipe_profesi' => 'PNS',
            'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI MUDA',
            'nip' => '199006152015031002',
            'pangkat_gol' => 'Penata / III/c',
            'pendidikan_terakhir' => 'STRATA 2 (S2)',
            'nama_organisasi' => 'kementerian komunikasi dan informatika',
            'unit_organisasi' => 'badan litbang sdm',
            'kepakaran' => ['TEKNOLOGI DAN INOVASI', 'ADMINISTRASI DAN REFORMASI BIROKRASI'],
            'hp' => '081234567890',
            'email' => 'rendy.kurniawan@kominfo.go.id',
            'file_sk' => $skFile,
            'file_tf' => $tfFile,
            'file_foto' => $fotoFile,
        ];

        $response = $this->post('/keanggotaan/daftar', $formData);
        $response->assertSessionHasNoErrors();

        $member = Member::where('email', 'rendy.kurniawan@kominfo.go.id')->first();
        $this->assertNotNull($member);

        // Verifikasi nama dan organisasi otomatis dikonversi ke HURUF KAPITAL
        $this->assertEquals('RENDY KURNIAWAN SAPUTRA', $member->nama);
        $this->assertEquals('SURABAYA', $member->tempat_lahir);
        $this->assertEquals('KEMENTERIAN KOMUNIKASI DAN INFORMATIKA', $member->nama_organisasi);
        $this->assertEquals('BADAN LITBANG SDM', $member->unit_organisasi);
        $this->assertEquals('pending', $member->status);
        $this->assertStringStartsWith('REG-', $member->registration_code);

        // Verifikasi berkas tersimpan di storage
        Storage::disk('public')->assertExists($member->file_sk);
        Storage::disk('public')->assertExists($member->file_tf);
        Storage::disk('public')->assertExists($member->file_foto);

        $response->assertRedirect(route('keanggotaan.sukses', ['code' => $member->registration_code]));
    }

    /**
     * Halaman cek status publik dapat menemukan data anggota.
     */
    public function test_member_can_check_registration_status(): void
    {
        $member = Member::create([
            'registration_code' => 'REG-202610-9999',
            'nama' => 'MAULANA MALIK',
            'tempat_lahir' => 'MALANG',
            'tanggal_lahir' => '1992-01-01',
            'jenis_kelamin' => 'LAKI-LAKI',
            'agama' => 'ISLAM',
            'tipe_profesi' => 'PNS',
            'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI PERTAMA',
            'nip' => '199201012019021003',
            'pangkat_gol' => 'Penata Muda / III/a',
            'pendidikan_terakhir' => 'STRATA 1 (S1)',
            'nama_organisasi' => 'LEMBAGA ADMINISTRASI NEGARA',
            'unit_organisasi' => 'PUSAT KAJIAN MANAJEMEN ASN',
            'kepakaran' => ['ADMINISTRASI DAN REFORMASI BIROKRASI'],
            'hp' => '081299998888',
            'email' => 'maulana@lan.go.id',
            'file_sk' => 'members/sk/sample.pdf',
            'file_tf' => 'members/tf/sample.jpg',
            'file_foto' => 'members/foto/sample.jpg',
            'status' => 'pending',
        ]);

        $response = $this->get('/keanggotaan/status?q=199201012019021003');

        $response->assertStatus(200);
        $response->assertSee('MAULANA MALIK');
        $response->assertSee('MENUNGGU VERIFIKASI');
    }

    /**
     * Admin dapat melihat daftar pendaftar dan membuka detail permohonan.
     */
    public function test_admin_can_view_member_management_and_detail(): void
    {
        $admin = User::create([
            'name' => 'Administrator INAKI',
            'email' => 'admin@inaki.or.id',
            'password' => Hash::make('InakiAdmin2026!'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $member = Member::create([
            'registration_code' => 'REG-202610-8888',
            'nama' => 'ANDI WIJAYA',
            'tempat_lahir' => 'MAKASSAR',
            'tanggal_lahir' => '1985-03-25',
            'jenis_kelamin' => 'LAKI-LAKI',
            'agama' => 'ISLAM',
            'tipe_profesi' => 'PNS',
            'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI MADYA',
            'nip' => '198503252009121002',
            'pangkat_gol' => 'Pembina / IV/a',
            'pendidikan_terakhir' => 'STRATA 2 (S2)',
            'nama_organisasi' => 'KEMENTERIAN DALAM NEGERI',
            'unit_organisasi' => 'DITJEN BINA PEMERINTAHAN DESA',
            'kepakaran' => ['OTONOMI DAERAH DAN DESA'],
            'hp' => '081388887777',
            'email' => 'andi.wijaya@kemendagri.go.id',
            'file_sk' => 'members/sk/sample.pdf',
            'file_tf' => 'members/tf/sample.jpg',
            'file_foto' => 'members/foto/sample.jpg',
            'status' => 'pending',
        ]);

        // Daftar anggota admin
        $this->actingAs($admin)->get('/admin/anggota')
            ->assertStatus(200)
            ->assertSee('ANDI WIJAYA')
            ->assertSee('REG-202610-8888');

        // Detail permohonan anggota admin
        $this->actingAs($admin)->get("/admin/anggota/{$member->id}")
            ->assertStatus(200)
            ->assertSee('ANDI WIJAYA')
            ->assertSee('Pratinjau KTA Digital INAKI')
            ->assertSee('Setujui & Terbitkan KTA Digital');
    }

    /**
     * Admin dapat memverifikasi anggota dan menerbitkan KTA resmi.
     */
    public function test_admin_can_verify_member(): void
    {
        $admin = User::create([
            'name' => 'Administrator INAKI',
            'email' => 'admin@inaki.or.id',
            'password' => Hash::make('InakiAdmin2026!'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $member = Member::create([
            'registration_code' => 'REG-202610-7777',
            'nama' => 'RATNA SARI',
            'tempat_lahir' => 'YOGYAKARTA',
            'tanggal_lahir' => '1988-07-10',
            'jenis_kelamin' => 'PEREMPUAN',
            'agama' => 'ISLAM',
            'tipe_profesi' => 'PNS',
            'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI MUDA',
            'nip' => '198807102010122001',
            'pangkat_gol' => 'Penata Tingkat I / III/d',
            'pendidikan_terakhir' => 'STRATA 2 (S2)',
            'nama_organisasi' => 'KEMENTERIAN KESEHATAN',
            'unit_organisasi' => 'BADAN KEBIJAKAN PEMBANGUNAN KESEHATAN',
            'kepakaran' => ['KESEHATAN'],
            'hp' => '081277776666',
            'email' => 'ratna.sari@kemkes.go.id',
            'file_sk' => 'members/sk/sample.pdf',
            'file_tf' => 'members/tf/sample.jpg',
            'file_foto' => 'members/foto/sample.jpg',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->post("/admin/anggota/{$member->id}/verifikasi", [
            'custom_kta' => 'KTA-INAKI-2026-9999',
            'catatan_verifikasi' => 'Berkas lengkap dan pembayaran tervalidasi.',
        ]);

        $member->refresh();

        $this->assertEquals('verified', $member->status);
        $this->assertEquals('KTA-INAKI-2026-9999', $member->nomor_kta);
        $this->assertEquals($admin->id, $member->verified_by);
        $this->assertNotNull($member->verified_at);
        $response->assertSessionHas('success');
    }

    /**
     * Admin dapat menolak permohonan keanggotaan dengan alasan.
     */
    public function test_admin_can_reject_member(): void
    {
        $admin = User::create([
            'name' => 'Administrator INAKI',
            'email' => 'admin@inaki.or.id',
            'password' => Hash::make('InakiAdmin2026!'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $member = Member::create([
            'registration_code' => 'REG-202610-6666',
            'nama' => 'JOKO SUSILO',
            'tempat_lahir' => 'SOLO',
            'tanggal_lahir' => '1993-04-12',
            'jenis_kelamin' => 'LAKI-LAKI',
            'agama' => 'ISLAM',
            'tipe_profesi' => 'NON ASN',
            'jenis_jfak' => 'PRAKTISI',
            'nip' => '-',
            'pangkat_gol' => '-',
            'pendidikan_terakhir' => 'STRATA 1 (S1)',
            'nama_organisasi' => 'LEMBAGA RISET MANDIRI',
            'unit_organisasi' => 'DIVISI KEBIJAKAN',
            'kepakaran' => ['EKONOMI DAN KEUANGAN'],
            'hp' => '081266665555',
            'email' => 'joko@riset.org',
            'file_sk' => 'members/sk/sample.pdf',
            'file_tf' => 'members/tf/sample.jpg',
            'file_foto' => 'members/foto/sample.jpg',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->post("/admin/anggota/{$member->id}/tolak", [
            'alasan_penolakan' => 'Bukti transfer nominal tidak sesuai Rp 150.000.',
        ]);

        $member->refresh();

        $this->assertEquals('rejected', $member->status);
        $this->assertEquals('Bukti transfer nominal tidak sesuai Rp 150.000.', $member->catatan_verifikasi);
        $response->assertSessionHas('warning');
    }
}

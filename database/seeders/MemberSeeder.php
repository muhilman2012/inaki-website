<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();

        // Anggota 1: Terverifikasi (Utama)
        Member::updateOrCreate(
            ['registration_code' => 'REG-202610-0001'],
            [
                'nama' => 'TRI WIDODO',
                'tempat_lahir' => 'SURAKARTA',
                'tanggal_lahir' => '1978-05-12',
                'jenis_kelamin' => 'LAKI-LAKI',
                'agama' => 'ISLAM',
                'tipe_profesi' => 'PNS',
                'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI UTAMA',
                'nip' => '197805122002121001',
                'pangkat_gol' => 'Pembina Utama / IV/e',
                'pendidikan_terakhir' => 'S3',
                'nama_organisasi' => 'LEMBAGA ADMINISTRASI NEGARA',
                'unit_organisasi' => 'DEPUTI BIDANG KAJIAN KEBIJAKAN DAN INOVASI ADMINISTRASI NEGARA',
                'kepakaran' => ['ADMINISTRASI DAN REFORMASI BIROKRASI', 'EKONOMI DAN KEUANGAN'],
                'hp' => '081234567890',
                'email' => 'tri.widodo@lan.go.id',
                'file_sk' => 'members/sk/sample-sk-1.pdf',
                'file_tf' => 'members/tf/sample-tf-1.jpg',
                'file_foto' => 'members/foto/sample-foto-1.jpg',
                'nomor_kta' => 'KTA-INAKI-2026-0001',
                'status' => 'verified',
                'catatan_verifikasi' => 'Berkas SK JFAK Utama dan transfer pembayaran Rp 150.000 valid dan terverifikasi.',
                'verified_at' => now()->subDays(5),
                'verified_by' => $admin?->id,
            ]
        );

        // Anggota 2: Terverifikasi (Madya)
        Member::updateOrCreate(
            ['registration_code' => 'REG-202610-0002'],
            [
                'nama' => 'HARIS FAOZAN',
                'tempat_lahir' => 'BANDUNG',
                'tanggal_lahir' => '1982-03-15',
                'jenis_kelamin' => 'LAKI-LAKI',
                'agama' => 'ISLAM',
                'tipe_profesi' => 'PNS',
                'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI MADYA',
                'nip' => '198203152006041003',
                'pangkat_gol' => 'Pembina Tingkat I / IV/b',
                'pendidikan_terakhir' => 'S2',
                'nama_organisasi' => 'KEMENTERIAN PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI BIROKRASI',
                'unit_organisasi' => 'DEPUTI BIDANG KEBIJAKAN SUMBER DAYA MANUSIA APARATUR',
                'kepakaran' => ['ADMINISTRASI DAN REFORMASI BIROKRASI', 'TEKNOLOGI DAN INOVASI'],
                'hp' => '081398765432',
                'email' => 'haris.faozan@menpan.go.id',
                'file_sk' => 'members/sk/sample-sk-2.pdf',
                'file_tf' => 'members/tf/sample-tf-2.jpg',
                'file_foto' => 'members/foto/sample-foto-2.jpg',
                'nomor_kta' => 'KTA-INAKI-2026-0002',
                'status' => 'verified',
                'catatan_verifikasi' => 'Berkas lengkap dan sesuai kriteria.',
                'verified_at' => now()->subDays(2),
                'verified_by' => $admin?->id,
            ]
        );

        // Anggota 3: Menunggu Verifikasi (PNS Muda)
        Member::updateOrCreate(
            ['registration_code' => 'REG-202610-0003'],
            [
                'nama' => 'SITI NURHALIZA',
                'tempat_lahir' => 'JAKARTA',
                'tanggal_lahir' => '1991-08-20',
                'jenis_kelamin' => 'PEREMPUAN',
                'agama' => 'ISLAM',
                'tipe_profesi' => 'PNS',
                'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI MUDA',
                'nip' => '199108202018012002',
                'pangkat_gol' => 'Penata Tingkat I / III/d',
                'pendidikan_terakhir' => 'S2',
                'nama_organisasi' => 'PEMERINTAH PROVINSI DKI JAKARTA',
                'unit_organisasi' => 'BADAN PERENCANAAN PEMBANGUNAN DAERAH (BAPPEDA)',
                'kepakaran' => ['KESEHATAN', 'SOSIAL DAN KEPENDUDUKAN'],
                'hp' => '081711223344',
                'email' => 'siti.nurhaliza@jakarta.go.id',
                'file_sk' => 'members/sk/sample-sk-3.pdf',
                'file_tf' => 'members/tf/sample-tf-3.jpg',
                'file_foto' => 'members/foto/sample-foto-3.jpg',
                'nomor_kta' => null,
                'status' => 'pending',
                'catatan_verifikasi' => null,
                'verified_at' => null,
                'verified_by' => null,
            ]
        );

        // Anggota 4: Menunggu Verifikasi (PPPK Pertama)
        Member::updateOrCreate(
            ['registration_code' => 'REG-202610-0004'],
            [
                'nama' => 'BAMBANG PRATAMA',
                'tempat_lahir' => 'SEMARANG',
                'tanggal_lahir' => '1995-11-04',
                'jenis_kelamin' => 'LAKI-LAKI',
                'agama' => 'KRISTEN PROTESTAN',
                'tipe_profesi' => 'PPPK',
                'jenis_jfak' => 'ANALIS KEBIJAKAN AHLI PERTAMA',
                'nip' => '199511042023211005',
                'pangkat_gol' => 'PPPK, X (AHLI PERTAMA)',
                'pendidikan_terakhir' => 'S1',
                'nama_organisasi' => 'PEMERINTAH KABUPATEN BOGOR',
                'unit_organisasi' => 'DINAS LINGKUNGAN HIDUP',
                'kepakaran' => ['LINGKUNGAN DAN KEHUTANAN', 'INFRASTRUKTUR DAN TRANSPORTASI'],
                'hp' => '085678901234',
                'email' => 'bambang.pratama@bogorkab.go.id',
                'file_sk' => 'members/sk/sample-sk-4.pdf',
                'file_tf' => 'members/tf/sample-tf-4.jpg',
                'file_foto' => 'members/foto/sample-foto-4.jpg',
                'nomor_kta' => null,
                'status' => 'pending',
                'catatan_verifikasi' => null,
                'verified_at' => null,
                'verified_by' => null,
            ]
        );

        // Anggota 5: Menunggu Verifikasi (Non ASN Praktisi)
        Member::updateOrCreate(
            ['registration_code' => 'REG-202610-0005'],
            [
                'nama' => 'DEWI LESTARI',
                'tempat_lahir' => 'YOGYAKARTA',
                'tanggal_lahir' => '1989-02-18',
                'jenis_kelamin' => 'PEREMPUAN',
                'agama' => 'KATOLIK',
                'tipe_profesi' => 'NON ASN',
                'jenis_jfak' => 'PRAKTISI',
                'nip' => '-',
                'pangkat_gol' => '-',
                'pendidikan_terakhir' => 'S2',
                'nama_organisasi' => 'PUSAT STUDI KEBIJAKAN PUBLIK NUSANTARA',
                'unit_organisasi' => 'DIVISI RISET DAN ADVOKASI KEBIJAKAN',
                'kepakaran' => ['HUKUM DAN HAM', 'OTONOMI DAERAH DAN DESA'],
                'hp' => '087812345678',
                'email' => 'dewi.lestari@pskpn.org',
                'file_sk' => 'members/sk/sample-sk-5.pdf',
                'file_tf' => 'members/tf/sample-tf-5.jpg',
                'file_foto' => 'members/foto/sample-foto-5.jpg',
                'nomor_kta' => null,
                'status' => 'pending',
                'catatan_verifikasi' => null,
                'verified_at' => null,
                'verified_by' => null,
            ]
        );
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('registration_code', 32)->unique();
            
            // Biodata Calon Anggota
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 20);
            $table->string('agama', 30);
            
            // Profesi & Kepegawaian
            $table->string('tipe_profesi', 20); // CPNS, PNS, PPPK, NON ASN
            $table->string('jenis_jfak'); // Jenjang JFAK / Praktisi / Akademisi / Lainnya
            $table->string('jenis_jfak_custom')->nullable();
            $table->string('nip', 30)->default('-'); // 18 digit untuk ASN, atau '-'
            $table->string('pangkat_gol', 60)->default('-'); // Pangkat/Gol atau '-'
            $table->string('pendidikan_terakhir', 30); // D3, D4, S1, S2, S3
            
            // Organisasi & Penempatan
            $table->string('nama_organisasi'); // Kementerian, Lembaga, Pemda, Lainnya (Kapital)
            $table->string('unit_organisasi'); // Unit Eselon I/II/OPD/SKPD (Kapital)
            
            // Kepakaran & Bidang Fokus
            $table->json('kepakaran'); // Array JSON pilihan kepakaran
            $table->string('kepakaran_custom')->nullable();
            
            // Kontak & Verifikasi
            $table->string('hp', 30); // Nomor WA
            $table->string('email');
            
            // Berkas Unggahan (Path File)
            $table->string('file_sk'); // SK Jabatan JFAK / SK Profesi
            $table->string('file_tf'); // Bukti Transfer Rp 150.000 (Bank BNI)
            $table->string('file_foto'); // Pas Foto 3x4
            
            // Status Administrasi & KTA Digital
            $table->string('nomor_kta')->nullable()->unique(); // Nomor KTA resmi setelah verifikasi
            $table->string('status', 20)->default('pending'); // pending, verified, rejected
            $table->text('catatan_verifikasi')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

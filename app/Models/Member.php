<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_code',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'tipe_profesi',
        'jenis_jfak',
        'jenis_jfak_custom',
        'nip',
        'pangkat_gol',
        'pendidikan_terakhir',
        'nama_organisasi',
        'unit_organisasi',
        'kepakaran',
        'kepakaran_custom',
        'hp',
        'email',
        'file_sk',
        'file_tf',
        'file_foto',
        'nomor_kta',
        'status',
        'catatan_verifikasi',
        'verified_at',
        'verified_by',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'kepakaran' => 'array',
            'verified_at' => 'datetime',
        ];
    }

    /**
     * Relasi ke administrator yang memverifikasi.
     */
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * Cek status pendaftaran.
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isVerified(): bool
    {
        return $this->status === 'verified';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    /**
     * URL Akses Berkas
     */
    public function getFotoUrlAttribute(): string
    {
        return $this->file_foto ? asset('storage/' . $this->file_foto) : asset('images/icons/avatar-placeholder.png');
    }

    public function getSkUrlAttribute(): string
    {
        return $this->file_sk ? asset('storage/' . $this->file_sk) : '#';
    }

    public function getTfUrlAttribute(): string
    {
        return $this->file_tf ? asset('storage/' . $this->file_tf) : '#';
    }

    /**
     * Generate Kode Registrasi Unik
     */
    public static function generateRegistrationCode(): string
    {
        $prefix = 'REG-' . date('Ym') . '-';
        $latest = self::where('registration_code', 'like', $prefix . '%')->latest('id')->first();
        $nextNumber = 1;

        if ($latest && preg_match('/-(\d+)$/', $latest->registration_code, $matches)) {
            $nextNumber = (int) $matches[1] + 1;
        }

        return $prefix . str_pad((string) $nextNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Generate Nomor KTA Resmi INAKI
     */
    public static function generateKtaNumber(): string
    {
        $year = date('Y');
        $prefix = 'KTA-INAKI-' . $year . '-';
        $count = self::whereNotNull('nomor_kta')->where('nomor_kta', 'like', $prefix . '%')->count() + 1;

        return $prefix . str_pad((string) $count, 4, '0', STR_PAD_LEFT);
    }
}

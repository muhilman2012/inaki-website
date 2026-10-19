<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Uji halaman login admin dapat dimuat dengan sukses.
     */
    public function test_admin_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Portal Administrator Terpadu');
        $response->assertSee('Masuk ke Panel Kendali');
        $response->assertDontSee('Daftar Akun Baru');
        $response->assertDontSee('Register');
        $response->assertDontSee('Kembali ke Beranda Utama');
    }

    /**
     * Uji admin dapat login dengan kredensial yang valid.
     */
    public function test_admin_can_authenticate_with_valid_credentials(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@inaki.or.id'],
            [
                'name' => 'Administrator INAKI',
                'password' => Hash::make('InakiAdmin2026!'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $response = $this->post('/admin/login', [
            'email' => 'admin@inaki.or.id',
            'password' => 'InakiAdmin2026!',
        ]);

        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect('/admin/dashboard');
    }

    /**
     * Uji login gagal jika kata sandi salah.
     */
    public function test_admin_cannot_authenticate_with_invalid_password(): void
    {
        $this->post('/admin/login', [
            'email' => 'admin@inaki.or.id',
            'password' => 'WrongPassword!',
        ]);

        $this->assertGuest();
    }

    /**
     * Uji tamu yang belum login dicegah mengakses dashboard admin.
     */
    public function test_guests_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    /**
     * Uji admin terotentikasi dapat mengakses dashboard dan melihat dokumen.
     */
    public function test_authenticated_admin_can_access_dashboard(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@inaki.or.id'],
            [
                'name' => 'Administrator INAKI',
                'password' => Hash::make('InakiAdmin2026!'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Halo, Administrator INAKI!');
        $response->assertSee('Integritas Berkas Publikasi');
        $response->assertSee('Buku Prosiding: Layanan Dasar Inklusif Berkelanjutan');
    }

    /**
     * Uji admin terotentikasi dapat mengakses menu-menu statis admin.
     */
    public function test_authenticated_admin_can_access_submenus(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@inaki.or.id'],
            [
                'name' => 'Administrator INAKI',
                'password' => Hash::make('InakiAdmin2026!'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $this->actingAs($admin)->get('/admin/publikasi')->assertStatus(200)->assertSee('Koleksi Publikasi Resmi INAKI');
        $this->actingAs($admin)->get('/admin/regulasi')->assertStatus(200)->assertSee('Katalog Regulasi & Dasar Hukum');
        $this->actingAs($admin)->get('/admin/anggota')->assertStatus(200)->assertSee('Manajemen Verifikasi Anggota');
        $this->actingAs($admin)->get('/admin/pengaturan')->assertStatus(200)->assertSee('Pengaturan Akun Administrator');
    }

    /**
     * Uji proses logout admin.
     */
    public function test_admin_can_logout(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@inaki.or.id'],
            [
                'name' => 'Administrator INAKI',
                'password' => Hash::make('InakiAdmin2026!'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $response = $this->actingAs($admin)->post('/admin/logout');

        $this->assertGuest();
        $response->assertRedirect('/admin/login');
    }
}

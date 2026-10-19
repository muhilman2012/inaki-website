<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_displays_bright_perpanjangan_button_and_kta_monitoring(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Perpanjangan');
        $response->assertSee('Masa Berlaku KTA');
        $response->assertSee('from-emerald-600');
        $response->assertSee('novalidate');
        $response->assertSee('Monitoring KTA Digital');
        $response->assertSee('Warta Terkini');
        $response->assertSee('Rekomendasi Kebijakan Berbasis Bukti Nasional');
        $response->assertDontSee('Tonton Video Deklarasi');
        $response->assertSee('for="kta_employment_status"', false);
        $response->assertSee('id="kta_employment_status"', false);
        $response->assertSee('aria-label="Buka Menu Navigasi"', false);
    }

    public function test_keanggotaan_page_displays_standardisasi_administrasi(): void
    {
        $response = $this->get('/keanggotaan');

        $response->assertStatus(200);
        $response->assertSee('Standardisasi Administrasi');
        $response->assertSee('Tinjauan Kartu Tanda Anggota');
        $response->assertSee('KTA Digital Resmi');
        $response->assertSee('Tahapan Verifikasi');
        $response->assertSee('Portal Layanan Terpadu');
    }

    public function test_publikasi_page_has_no_badge_and_links_to_repository_login(): void
    {
        $response = $this->get('/publikasi');

        $response->assertStatus(200);
        $response->assertDontSee('Repositori Ilmiah & Direktori Regulasi Terakreditasi');
        $response->assertSee('Dalam Tahap Pengembangan Sistem');
        $response->assertSee(route('repository.login'));
    }

    public function test_repository_login_page_is_separated_and_displays_development_notice(): void
    {
        $response = $this->get('/repository/login');

        $response->assertStatus(200);
        $response->assertSee('Portal Repositori Anggota');
        $response->assertSee('Layanan Dalam Tahap Pengembangan');
        $response->assertSee(route('home'));
        $response->assertDontSee(route('admin.login'));
        $response->assertDontSee('Kembali ke Halaman Publikasi');
    }

    public function test_public_login_redirects_to_repository_login_not_admin(): void
    {
        $response = $this->get('/login');

        $response->assertRedirect(route('repository.login'));
    }

    public function test_admin_login_remains_strictly_separated(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Portal Administrator Terpadu');
    }

    public function test_custom_404_error_page_renders_cleanly(): void
    {
        $response = $this->get('/halaman-acak-yang-pasti-tidak-ada-12345');

        $response->assertStatus(404);
        $response->assertSee('Halaman Tidak Ditemukan');
        $response->assertSee('Error 404');
        $response->assertSee('Kembali ke Beranda');
    }
}

@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Ringkasan Eksekutif')

@section('content')

    <!-- Welcome Hero Banner -->
    <div class="relative overflow-hidden rounded-2xl bg-white border border-slate-200/90 p-6 sm:p-8 shadow-xs">
        <div class="relative z-10 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-semibold mb-3">
                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                <span>Selamat Datang Kembali</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline tracking-tight">
                Halo, {{ $admin->name }}!
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2 leading-relaxed">
                Panel ini siap digunakan untuk mengelola data anggota, direktori regulasi JFAK, berkas publikasi, serta pemantauan website resmi Ikatan Analis Kebijakan Indonesia.
            </p>
            <div class="mt-4 flex flex-wrap items-center gap-3 text-xs text-slate-600">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 font-medium">
                    <span class="material-symbols-outlined text-[16px] text-blue-600">schedule</span>
                    <span>Waktu Sesi: {{ now()->translatedFormat('l, d F Y - H:i') }} WIB</span>
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 font-medium">
                    <span class="material-symbols-outlined text-[16px] text-emerald-600">verified_user</span>
                    <span>Hak Akses: Super Administrator</span>
                </span>
            </div>
        </div>

        <!-- Decorative Watermark Icon in background -->
        <div class="absolute right-4 -bottom-6 opacity-5 pointer-events-none select-none hidden lg:block text-slate-900">
            <span class="material-symbols-outlined text-[200px]">admin_panel_settings</span>
        </div>
    </div>

    <!-- 4 Key Stat Metrics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <!-- Card 1: Anggota -->
        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 hover:border-slate-300 hover:shadow-sm transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Anggota</span>
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-[22px]">group</span>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline">
                {{ number_format($metrics['total_members'], 0, ',', '.') }}
            </div>
            <div class="mt-2 flex items-center justify-between text-xs">
                <span class="{{ $metrics['pending_members'] > 0 ? 'text-amber-700 font-bold' : 'text-emerald-700 font-semibold' }} flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">{{ $metrics['pending_members'] > 0 ? 'pending' : 'check_circle' }}</span>
                    {{ $metrics['pending_members'] }} Menunggu Cek
                </span>
                <a href="{{ route('admin.anggota') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                    Lihat &rarr;
                </a>
            </div>
        </div>

        <!-- Card 2: Dokumen Publikasi -->
        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 hover:border-slate-300 hover:shadow-sm transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Publikasi Resmi</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-[22px]">menu_book</span>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline">
                {{ $metrics['total_publications'] }} Dokumen
            </div>
            <div class="mt-2 flex items-center justify-between text-xs">
                <span class="text-slate-500">Ukuran: {{ $metrics['storage_used'] }}</span>
                <a href="{{ route('admin.publikasi') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                    Kelola &rarr;
                </a>
            </div>
        </div>

        <!-- Card 3: Regulasi JFAK -->
        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 hover:border-slate-300 hover:shadow-sm transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Direktori Regulasi</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-[22px]">gavel</span>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline">
                {{ $metrics['total_regulations'] }} Aturan
            </div>
            <div class="mt-2 flex items-center justify-between text-xs">
                <span class="text-emerald-700 font-semibold">AD/ART &amp; PerLAN</span>
                <a href="{{ route('admin.regulasi') }}" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                    Daftar &rarr;
                </a>
            </div>
        </div>

        <!-- Card 4: Total Unduhan -->
        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 hover:border-slate-300 hover:shadow-sm transition-all shadow-xs group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Aktivitas Unduhan</span>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-[22px]">download</span>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline">
                {{ number_format($metrics['total_downloads'], 0, ',', '.') }}
            </div>
            <div class="mt-2 flex items-center justify-between text-xs">
                <span class="text-blue-700 font-semibold">Tercatat di Server</span>
                <span class="text-slate-400">Terproteksi</span>
            </div>
        </div>

    </div>

    <!-- Live Publication Files Health Table -->
    <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-xs">
        <div class="p-5 sm:p-6 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white">
            <div>
                <h3 class="text-base sm:text-lg font-bold text-slate-900 font-headline flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-500 text-[22px]">folder_special</span>
                    <span>Integritas Berkas Publikasi &amp; Pedoman Resmi</span>
                </h3>
                <p class="text-xs text-slate-500 mt-1">
                    Status berkas PDF pada direktori server <code class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 font-mono text-[11px]">public/files/</code> yang diakses publik.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <a 
                    href="{{ route('publikasi') }}" 
                    target="_blank" 
                    class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold transition-colors border border-slate-200"
                >
                    <span class="material-symbols-outlined text-[16px] text-blue-600">visibility</span>
                    <span>Lihat di Web Publik</span>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-[11px] uppercase tracking-wider text-slate-500 font-bold">
                        <th class="py-3.5 px-5">Nama Dokumen</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Ukuran</th>
                        <th class="py-3.5 px-4">Status Berkas</th>
                        <th class="py-3.5 px-5 text-right">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs sm:text-sm">
                    @foreach($filesStatus as $file)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 border border-rose-200">
                                        <span class="material-symbols-outlined text-[20px]">picture_as_pdf</span>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-bold text-slate-900 text-xs sm:text-sm leading-snug">
                                             {{ $file['title'] }}
                                        </p>
                                        <p class="text-[11px] text-slate-500 font-mono truncate mt-0.5">
                                            {{ $file['filename'] }} &bull; {{ $file['pages'] }} Hlm
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-xs text-slate-600">
                                <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 border border-slate-200 font-medium">
                                    {{ $file['category'] }}
                                </span>
                            </td>
                            <td class="py-4 px-4 font-mono text-xs text-slate-600 font-semibold">
                                {{ $file['size_formatted'] }}
                            </td>
                            <td class="py-4 px-4">
                                @if($file['exists'])
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Tersedia &amp; Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Berkas Tidak Ada
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-5 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <a 
                                        href="{{ route('publikasi.baca', $file['slug']) }}" 
                                        target="_blank" 
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-blue-50 transition-colors"
                                        title="Pratinjau PDF di Tab Baru"
                                    >
                                        <span class="material-symbols-outlined text-[18px]">visibility</span>
                                    </a>
                                    <a 
                                        href="{{ route('publikasi.unduh', $file['slug']) }}" 
                                        class="p-1.5 rounded-lg text-slate-500 hover:text-emerald-600 hover:bg-emerald-50 transition-colors"
                                        title="Unduh Berkas Asli"
                                    >
                                        <span class="material-symbols-outlined text-[18px]">download</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- System Diagnostics & Fast Shortcuts Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Server Diagnostics Card -->
        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 sm:p-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-blue-600 text-[22px]">dns</span>
                <span>Diagnostik Server &amp; Lingkungan</span>
            </h3>

            <div class="space-y-3 text-xs sm:text-sm">
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <span class="text-slate-500">Framework &amp; Versi PHP</span>
                    <span class="font-bold text-slate-900 font-mono">Laravel {{ $systemInfo['laravel_version'] }} / PHP {{ $systemInfo['php_version'] }}</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <span class="text-slate-500">Koneksi Database</span>
                    <span class="font-bold text-emerald-700 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        {{ $systemInfo['database_status'] }}
                    </span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <span class="text-slate-500">Audio Mars INAKI (Stream)</span>
                    <span class="font-bold text-blue-600 font-mono">{{ $systemInfo['mars_status'] }}</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <span class="text-slate-500">Sesi Login Terakhir</span>
                    <span class="font-semibold text-slate-700">
                        {{ $admin->last_login_at ? $admin->last_login_at->translatedFormat('d M Y, H:i') : 'Sesi Pertama Kali' }}
                        @if($admin->last_login_ip)
                            <span class="text-slate-400 font-mono">({{ $admin->last_login_ip }})</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        <!-- Quick Admin Shortcuts Card -->
        <div class="bg-white border border-slate-200/90 rounded-2xl p-5 sm:p-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-purple-600 text-[22px]">rocket_launch</span>
                <span>Pintasan Manajemen Cepat</span>
            </h3>

            <div class="grid grid-cols-2 gap-3">
                <a 
                    href="{{ route('admin.publikasi') }}" 
                    class="p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-300 hover:bg-blue-50/30 transition-all group"
                >
                    <span class="material-symbols-outlined text-[24px] text-amber-500 group-hover:scale-105 transition-transform">upload_file</span>
                    <p class="font-bold text-slate-900 text-xs sm:text-sm mt-2">Kelola Publikasi</p>
                    <p class="text-[11px] text-slate-500 mt-0.5">Tambah buku &amp; prosiding</p>
                </a>

                <a 
                    href="{{ route('admin.regulasi') }}" 
                    class="p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-300 hover:bg-blue-50/30 transition-all group"
                >
                    <span class="material-symbols-outlined text-[24px] text-emerald-600 group-hover:scale-105 transition-transform">library_books</span>
                    <p class="font-bold text-slate-900 text-xs sm:text-sm mt-2">Direktori Regulasi</p>
                    <p class="text-[11px] text-slate-500 mt-0.5">Update peraturan JFAK</p>
                </a>

                <a 
                    href="{{ route('admin.anggota') }}" 
                    class="p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-300 hover:bg-blue-50/30 transition-all group"
                >
                    <span class="material-symbols-outlined text-[24px] text-purple-600 group-hover:scale-105 transition-transform">how_to_reg</span>
                    <p class="font-bold text-slate-900 text-xs sm:text-sm mt-2">Verifikasi Anggota</p>
                    <p class="text-[11px] text-slate-500 mt-0.5">Data KTA &amp; JFAK</p>
                </a>

                <a 
                    href="{{ route('admin.pengaturan') }}" 
                    class="p-4 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-300 hover:bg-blue-50/30 transition-all group"
                >
                    <span class="material-symbols-outlined text-[24px] text-blue-600 group-hover:scale-105 transition-transform">lock_reset</span>
                    <p class="font-bold text-slate-900 text-xs sm:text-sm mt-2">Keamanan Akun</p>
                    <p class="text-[11px] text-slate-500 mt-0.5">Ubah sandi &amp; profil</p>
                </a>
            </div>
        </div>

    </div>

@endsection

<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Repositori Anggota | INAKI - Ikatan Nasional Analis Kebijakan</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col justify-center font-body text-slate-800 antialiased selection:bg-amber-500 selection:text-slate-900 bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">

    <!-- Main Content Area (Header atas dihilangkan agar fokus & elegan) -->
    <main class="w-full max-w-lg mx-auto">
        
        <!-- Branding Header (Logo terpusat di tengah) -->
        <div class="flex flex-col items-center text-center mb-6 sm:mb-8">
            <a href="{{ route('home') }}" class="inline-flex justify-center mb-3 transition-transform hover:scale-105 duration-200" title="Ke Beranda INAKI">
                <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-16 sm:h-20 w-auto drop-shadow-xs">
            </a>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-800 text-xs font-semibold tracking-wide uppercase mb-3 shadow-2xs">
                <span class="material-symbols-outlined text-[15px]">menu_book</span>
                <span>Portal Repositori Anggota</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-headline">
                Akses Repositori Ilmiah
            </h1>
            <p class="text-slate-600 text-xs sm:text-sm mt-1.5 max-w-md mx-auto leading-relaxed">
                Koleksi resensi buku, naskah kebijakan, dan artikel jurnal fungsional analis kebijakan se-Indonesia.
            </p>
        </div>

        <!-- Login / Development Card -->
        <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/50 relative overflow-hidden space-y-6">
            
            <!-- Top Accent Line -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 via-orange-500 to-amber-400"></div>

            <!-- Development Stage Notice Alert -->
            <div class="p-4 sm:p-5 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs sm:text-sm flex items-start gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center shrink-0 border border-amber-300">
                    <span class="material-symbols-outlined text-[24px]">construction</span>
                </div>
                <div class="space-y-1">
                    <h2 class="font-bold text-amber-900 text-sm font-headline">Layanan Dalam Tahap Pengembangan</h2>
                    <p class="text-amber-800/90 text-xs leading-relaxed">
                        Portal autentikasi mandiri repositori anggota saat ini masih dalam proses sinkronisasi basis data keanggotaan dan digitalisasi arsip karya ilmiah. Akses login anggota akan segera dibuka setelah proses integrasi rampung.
                    </p>
                </div>
            </div>

            <!-- Form Pratinjau (Disabled / Preview) -->
            <div class="space-y-4 opacity-75">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                        Nomor KTA / Nomor Induk Pegawai (NIP)
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">badge</span>
                        <input type="text" disabled placeholder="Contoh: KTA-INAKI-2026-0001 atau NIP" class="w-full h-11 pl-10 pr-4 rounded-xl bg-slate-50 border border-slate-200 text-slate-500 text-xs sm:text-sm cursor-not-allowed">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">
                        Kata Sandi Anggota
                    </label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]">lock</span>
                        <input type="password" disabled placeholder="••••••••" class="w-full h-11 pl-10 pr-4 rounded-xl bg-slate-50 border border-slate-200 text-slate-500 text-xs sm:text-sm cursor-not-allowed">
                    </div>
                </div>

                <button type="button" disabled class="w-full h-11 rounded-xl bg-amber-100 border border-amber-200 text-amber-800 font-bold text-xs sm:text-sm flex items-center justify-center gap-2 cursor-not-allowed shadow-none">
                    <span class="material-symbols-outlined text-[18px]">lock</span>
                    <span>Masuk ke Repositori (Segera Hadir)</span>
                </button>
            </div>

            <!-- Action Alternatives -->
            <div class="pt-4 border-t border-slate-100 space-y-3">
                <p class="text-[11px] text-slate-500 text-center font-medium">Layanan keanggotaan aktif yang dapat diakses:</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <a href="{{ route('keanggotaan.daftar') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-medium flex items-center gap-2 transition group">
                        <span class="material-symbols-outlined text-blue-600 text-[18px]">person_add</span>
                        <div class="min-w-0 flex-1">
                            <p class="font-bold text-slate-900 group-hover:text-blue-600 truncate">Daftar Anggota</p>
                            <p class="text-[10px] text-slate-500 truncate">Registrasi anggota baru</p>
                        </div>
                    </a>

                    <a href="{{ route('keanggotaan.status') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-medium flex items-center gap-2 transition group">
                        <span class="material-symbols-outlined text-emerald-600 text-[18px]">how_to_reg</span>
                        <div class="min-w-0 flex-1">
                            <p class="font-bold text-slate-900 group-hover:text-emerald-600 truncate">Cek Status KTA</p>
                            <p class="text-[10px] text-slate-500 truncate">Monitoring KTA Digital</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <!-- Navigasi Kembali ke Landing Page INAKI (Bukan Admin) -->
        <div class="text-center mt-6 text-xs text-slate-500">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-blue-600 hover:text-blue-700 font-semibold hover:underline transition">
                <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                <span>Kembali ke Halaman Utama INAKI</span>
            </a>
        </div>

    </main>

    <!-- Simple Footer -->
    <footer class="mt-8 text-center text-xs text-slate-500 space-y-1">
        <p>&copy; {{ date('Y') }} Ikatan Nasional Analis Kebijakan (INAKI). Gedung Graha Wicaksana Kampus PPLPN LAN RI.</p>
    </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | INAKI</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        .font-headline { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }
    </style>
</head>
<body class="h-full flex flex-col justify-between text-slate-800 antialiased selection:bg-blue-600 selection:text-white bg-slate-50">

    <!-- Top Minimal Bar -->
    <header class="w-full py-4 sm:py-5 px-6 sm:px-10 flex items-center justify-between border-b border-slate-200/80 bg-white/90 backdrop-blur-md">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group">
            <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-8 sm:h-9 w-auto">
        </a>
        <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-blue-600 hover:text-blue-700 transition">
            <span class="material-symbols-outlined text-[18px]">home</span>
            <span class="hidden sm:inline">Beranda Utama</span>
        </a>
    </header>

    <!-- Error Content Container -->
    <main class="flex-grow flex items-center justify-center px-4 py-12 sm:py-16">
        <div class="w-full max-w-lg mx-auto text-center">
            
            <!-- Error Icon Box -->
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-3xl @yield('icon-bg', 'bg-blue-50 text-blue-600 ring-8 ring-blue-50/50') mb-6 shadow-xs">
                <span class="material-symbols-outlined text-[40px]">@yield('icon', 'error')</span>
            </div>

            <!-- Error Code Pill -->
            <div class="mb-3">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-extrabold tracking-wider font-mono @yield('badge-class', 'bg-slate-100 text-slate-600 border border-slate-200') uppercase">
                    Error @yield('code')
                </span>
            </div>

            <!-- Error Heading -->
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline tracking-tight mb-3">
                @yield('title')
            </h1>

            <!-- Error Message / Description -->
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-md mx-auto mb-8">
                @yield('message')
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ url('/') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-sm hover:shadow transition-all active:scale-98">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    <span>Kembali ke Beranda</span>
                </a>
                <button onclick="window.history.back()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white hover:bg-slate-100 text-slate-700 font-semibold text-sm border border-slate-200 transition active:scale-98 cursor-pointer">
                    <span class="material-symbols-outlined text-[18px]">undo</span>
                    <span>Halaman Sebelumnya</span>
                </button>
            </div>

            <!-- Contact Link -->
            <div class="mt-8 pt-6 border-t border-slate-200/70 text-xs text-slate-500">
                Membutuhkan bantuan segera? Silakan <a href="{{ url('/kontak') }}" class="text-blue-600 font-semibold hover:underline">Hubungi Sekretariat INAKI</a>.
            </div>

        </div>
    </main>

    <!-- Simple Footer -->
    <footer class="w-full py-4 px-6 text-center text-xs text-slate-500 border-t border-slate-200/60 bg-white">
        &copy; {{ date('Y') }} Ikatan Nasional Analis Kebijakan (INAKI). Gedung Graha Wicaksana Kampus PPLPN LAN RI.
    </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator | INAKI - Ikatan Analis Kebijakan Indonesia</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Theme Color -->
    <meta name="theme-color" content="#004ac6">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <!-- Alpine.js & Vite Assets -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full flex flex-col justify-center font-body text-slate-800 antialiased selection:bg-blue-600 selection:text-white bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">

    <!-- Main Content Area (Header dihapus sesuai permintaan, terfokus & elegan) -->
    <main class="w-full max-w-md mx-auto" x-data="{ showPassword: false, isSubmitting: false }">
        
        <!-- Branding Header (Logo terpusat di tengah) -->
        <div class="flex flex-col items-center text-center mb-6 sm:mb-8">
            <a href="{{ route('home') }}" class="inline-flex justify-center mb-3 transition-transform hover:scale-105 duration-200" title="Ke Beranda INAKI">
                <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-16 sm:h-20 w-auto drop-shadow-xs">
            </a>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-semibold tracking-wide uppercase mb-3 shadow-2xs">
                <span class="material-symbols-outlined text-[14px]">shield_person</span>
                <span>Portal Administrator Terpadu</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-headline">
                Masuk ke Panel Kendali
            </h1>
            <p class="text-slate-600 text-xs sm:text-sm mt-1.5 max-w-sm mx-auto leading-relaxed">
                Akses otorisasi untuk mengelola publikasi, regulasi JFAK, dan database keanggotaan INAKI.
            </p>
        </div>

        <!-- Login Card Container -->
        <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/50 relative overflow-hidden">
            
            <!-- Top Subtle Primary Accent -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-500"></div>

            <!-- Session / Error Notification Alert -->
            @if(session('status'))
                <div class="mb-5 p-3.5 rounded-xl bg-blue-50 border border-blue-200 flex items-start gap-3 text-blue-800 text-xs sm:text-sm">
                    <span class="material-symbols-outlined text-[20px] text-blue-600 shrink-0">info</span>
                    <p class="leading-relaxed font-medium">{{ session('status') }}</p>
                </div>
            @endif

            @if(session('warning'))
                <div class="mb-5 p-3.5 rounded-xl bg-amber-50 border border-amber-200 flex items-start gap-3 text-amber-800 text-xs sm:text-sm">
                    <span class="material-symbols-outlined text-[20px] text-amber-600 shrink-0">warning</span>
                    <p class="leading-relaxed">{{ session('warning') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 p-3.5 rounded-xl bg-rose-50 border border-rose-200 flex items-start gap-3 text-rose-800 text-xs sm:text-sm">
                    <span class="material-symbols-outlined text-[20px] text-rose-600 shrink-0">error</span>
                    <div class="space-y-1">
                        @foreach($errors->all() as $error)
                            <p class="leading-relaxed font-medium">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}" @submit="isSubmitting = true" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-xs sm:text-sm font-semibold text-slate-700 mb-2">
                        Alamat Email Administrator
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <span class="material-symbols-outlined text-[20px]">alternate_email</span>
                        </div>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            autocomplete="email" 
                            required 
                            value="{{ old('email') }}"
                            placeholder="admin@inaki.or.id" 
                            class="w-full pl-11 pr-4 py-2.5 sm:py-3 bg-white border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all shadow-xs @error('email') border-rose-500 ring-2 ring-rose-500/20 @enderror"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs sm:text-sm font-semibold text-slate-700">
                            Kata Sandi
                        </label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <span class="material-symbols-outlined text-[20px]">lock</span>
                        </div>
                        <input 
                            id="password" 
                            name="password" 
                            :type="showPassword ? 'text' : 'password'" 
                            autocomplete="current-password" 
                            required 
                            placeholder="••••••••••••" 
                            class="w-full pl-11 pr-11 py-2.5 sm:py-3 bg-white border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all shadow-xs @error('password') border-rose-500 ring-2 ring-rose-500/20 @enderror"
                        >
                        <button 
                            type="button" 
                            @click="showPassword = !showPassword" 
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors focus:outline-none cursor-pointer"
                            title="Tampilkan / Sembunyikan Kata Sandi"
                        >
                            <span class="material-symbols-outlined text-[20px]" x-text="showPassword ? 'visibility_off' : 'visibility'">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2.5 cursor-pointer select-none group">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            id="remember"
                            {{ old('remember') ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500 transition cursor-pointer"
                        >
                        <span class="text-xs sm:text-sm text-slate-600 group-hover:text-slate-900 transition-colors">
                            Ingat sesi login saya
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button 
                        type="submit" 
                        :disabled="isSubmitting"
                        class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-bold text-sm tracking-wide shadow-md shadow-blue-600/25 transition-all transform active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-blue-600/30 disabled:opacity-70 disabled:cursor-not-allowed cursor-pointer"
                    >
                        <span x-show="!isSubmitting" class="material-symbols-outlined text-[20px]">login</span>
                        <svg x-show="isSubmitting" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span x-text="isSubmitting ? 'Memverifikasi Kredensial...' : 'Masuk ke Dashboard'">Masuk ke Dashboard</span>
                    </button>
                </div>
            </form>

            <!-- Strict Non-Registration Notice -->
            <div class="mt-6 pt-5 border-t border-slate-100 text-center">
                <div class="inline-flex items-center gap-1.5 text-xs text-slate-500 font-medium">
                    <span class="material-symbols-outlined text-[16px] text-amber-600">admin_panel_settings</span>
                    <span>Akses terbatas khusus Pengurus &amp; Staf Resmi DPP INAKI.</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 text-center text-xs text-slate-500 space-y-1">
            <p>&copy; 2026 Ikatan Analis Kebijakan Indonesia (INAKI). Hak Cipta Dilindungi.</p>
        </div>
    </main>

</body>
</html>

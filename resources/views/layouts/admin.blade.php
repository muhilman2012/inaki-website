<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Portal Admin INAKI</title>
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
<body class="h-full bg-slate-100 font-body text-slate-800 antialiased selection:bg-blue-600 selection:text-white" x-data="{ sidebarOpen: false }">

    <!-- Frozen App Container: Sidebar Fixed, Main Scrolls -->
    <div class="h-screen flex overflow-hidden bg-slate-100">
        
        <!-- Mobile Sidebar Backdrop -->
        <div 
            x-show="sidebarOpen" 
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="sidebarOpen = false" 
            class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-xs lg:hidden"
            style="display: none;"
        ></div>

        <!-- Mobile Sidebar Drawer -->
        <aside 
            x-show="sidebarOpen"
            x-transition:enter="transition-transform duration-300 ease-in-out"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition-transform duration-300 ease-in-out"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-slate-200 flex flex-col justify-between lg:hidden shadow-2xl"
            style="display: none;"
        >
            <div>
                <!-- Brand Header -->
                <div class="h-20 flex items-center justify-between px-6 border-b border-slate-200 bg-white">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-10 w-auto">
                        <div>
                            <span class="block text-base font-extrabold text-slate-900 font-headline tracking-tight leading-tight">
                                INAKI ADMIN
                            </span>
                            <span class="block text-[10px] font-semibold text-blue-600 tracking-wider uppercase">
                                Portal Manajemen
                            </span>
                        </div>
                    </a>
                    <button @click="sidebarOpen = false" class="p-1.5 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100">
                        <span class="material-symbols-outlined text-[22px]">close</span>
                    </button>
                </div>

                <!-- Navigation List -->
                <nav class="p-4 space-y-6 overflow-y-auto max-h-[calc(100vh-11rem)]">
                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Menu Utama
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-600' }}">dashboard</span>
                                    <span>Dashboard Ringkasan</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Publikasi &amp; Regulasi
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.publikasi') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.publikasi') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.publikasi') ? 'text-white' : 'text-amber-500' }}">menu_book</span>
                                        <span>Kelola Publikasi</span>
                                    </div>
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-slate-100 text-slate-600 border border-slate-200">4 File</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.regulasi') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.regulasi') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.regulasi') ? 'text-white' : 'text-emerald-600' }}">gavel</span>
                                        <span>Direktori Regulasi</span>
                                    </div>
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-slate-100 text-slate-600 border border-slate-200">18 Aturan</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Keanggotaan &amp; Data
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.anggota') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.anggota*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.anggota*') ? 'text-white' : 'text-purple-600' }}">badge</span>
                                        <span>Database Anggota</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Sistem &amp; Akun
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('admin.pengaturan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.pengaturan') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.pengaturan') ? 'text-white' : 'text-slate-500' }}">settings</span>
                                    <span>Pengaturan Akun</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Mobile Footer Profile -->
            <div class="p-4 border-t border-slate-200 bg-slate-50">
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 text-white font-bold flex items-center justify-center text-xs shrink-0">
                            {{ auth()->user()->initials ?? 'AD' }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold text-slate-900 truncate">{{ auth()->user()->name ?? 'Administrator' }}</p>
                            <p class="text-[11px] text-slate-500 truncate">Super Admin</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50">
                            <span class="material-symbols-outlined text-[20px]">logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Desktop Freeze Panel Sidebar (Pinned / Never Scrolls with Page) -->
        <aside class="hidden lg:flex lg:flex-col lg:w-72 lg:shrink-0 bg-white border-r border-slate-200 h-full justify-between select-none z-30 shadow-xs">
            <div>
                <!-- Brand Header -->
                <div class="h-20 flex items-center px-6 border-b border-slate-200 bg-white">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                        <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-10 w-auto group-hover:scale-105 transition-transform duration-200">
                        <div>
                            <span class="block text-base font-extrabold text-slate-900 font-headline tracking-tight leading-tight">
                                INAKI ADMIN
                            </span>
                            <span class="block text-[10px] font-semibold text-blue-600 tracking-wider uppercase">
                                Portal Manajemen
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links List (Scrolls inside itself if screen is very short) -->
                <nav class="p-4 space-y-6 overflow-y-auto max-h-[calc(100vh-10.5rem)]">
                    
                    <!-- Kategori Utama -->
                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Menu Utama
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a 
                                    href="{{ route('admin.dashboard') }}" 
                                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-sm transition-all duration-150 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}"
                                >
                                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-600' }}">dashboard</span>
                                    <span>Dashboard Ringkasan</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Kategori Konten & Publikasi -->
                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Publikasi &amp; Regulasi
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a 
                                    href="{{ route('admin.publikasi') }}" 
                                    class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm transition-all duration-150 {{ request()->routeIs('admin.publikasi') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}"
                                >
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.publikasi') ? 'text-white' : 'text-amber-500' }}">menu_book</span>
                                        <span>Kelola Publikasi</span>
                                    </div>
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-slate-100 text-slate-600 border border-slate-200">4 File</span>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="{{ route('admin.regulasi') }}" 
                                    class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm transition-all duration-150 {{ request()->routeIs('admin.regulasi') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}"
                                >
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.regulasi') ? 'text-white' : 'text-emerald-600' }}">gavel</span>
                                        <span>Direktori Regulasi</span>
                                    </div>
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-slate-100 text-slate-600 border border-slate-200">18 Aturan</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Kategori Keanggotaan & Data -->
                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Keanggotaan &amp; Data
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a 
                                    href="{{ route('admin.anggota') }}" 
                                    class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm transition-all duration-150 {{ request()->routeIs('admin.anggota*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}"
                                >
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.anggota*') ? 'text-white' : 'text-purple-600' }}">badge</span>
                                        <span>Database Anggota</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Kategori Pengaturan -->
                    <div>
                        <div class="px-3 mb-2 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                            Sistem &amp; Konfigurasi
                        </div>
                        <ul class="space-y-1">
                            <li>
                                <a 
                                    href="{{ route('admin.pengaturan') }}" 
                                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-sm transition-all duration-150 {{ request()->routeIs('admin.pengaturan') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/20 font-semibold' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}"
                                >
                                    <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.pengaturan') ? 'text-white' : 'text-slate-500' }}">settings</span>
                                    <span>Pengaturan &amp; Akun</span>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="{{ route('home') }}" 
                                    target="_blank"
                                    class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-all duration-150"
                                >
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-[20px] text-blue-500">open_in_new</span>
                                        <span>Website Publik</span>
                                    </div>
                                    <span class="material-symbols-outlined text-[16px] text-slate-400">arrow_outward</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>

            <!-- User Profile & Quick Logout Footer -->
            <div class="p-4 border-t border-slate-200 bg-slate-50/70">
                <div class="flex items-center justify-between gap-3 p-2 rounded-xl bg-white border border-slate-200 shadow-2xs">
                    <div class="flex items-center gap-2.5 min-w-0">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 text-white font-bold flex items-center justify-center text-xs shrink-0 shadow-xs">
                            {{ auth()->user()->initials ?? 'AD' }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-xs font-bold text-slate-900 truncate">
                                {{ auth()->user()->name ?? 'Administrator' }}
                            </p>
                            <p class="text-[11px] text-slate-500 truncate">
                                Super Administrator
                            </p>
                        </div>
                    </div>

                    <!-- Logout Button Form -->
                    <form method="POST" action="{{ route('admin.logout') }}" class="shrink-0">
                        @csrf
                        <button 
                            type="submit" 
                            title="Keluar / Logout"
                            class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors cursor-pointer"
                        >
                            <span class="material-symbols-outlined text-[20px]">logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area: Scrolls independently while sidebar is pinned -->
        <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">
            
            <!-- Topbar Header -->
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8 shrink-0 z-20">
                
                <div class="flex items-center gap-3 sm:gap-4">
                    <button 
                        @click="sidebarOpen = true" 
                        class="p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 lg:hidden focus:outline-none cursor-pointer"
                    >
                        <span class="material-symbols-outlined text-[24px]">menu</span>
                    </button>
                    
                    <div>
                        <h1 class="text-base sm:text-xl font-bold text-slate-900 font-headline tracking-tight">
                            @yield('page-title', 'Dashboard Administrator')
                        </h1>
                        <p class="text-[11px] sm:text-xs text-slate-500 hidden sm:block">
                            Ikatan Analis Kebijakan Indonesia • Sistem Administrasi Terpusat
                        </p>
                    </div>
                </div>

                <!-- Right Topbar Items (Badge yang tidak perlu sudah dibuang) -->
                <div class="flex items-center gap-3">
                    
                    <!-- External Site Shortcut -->
                    <a 
                        href="{{ route('home') }}" 
                        target="_blank" 
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-medium transition-colors border border-slate-200"
                        title="Buka Website Publik di Tab Baru"
                    >
                        <span class="material-symbols-outlined text-[16px] text-blue-600">language</span>
                        <span class="hidden sm:inline">Lihat Web Publik</span>
                        <span class="material-symbols-outlined text-[14px] text-slate-400">arrow_outward</span>
                    </a>

                    <!-- Profile Dropdown Menu in Topbar -->
                    <div class="relative" x-data="{ userMenu: false }">
                        <button 
                            @click="userMenu = !userMenu" 
                            class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-slate-100 transition-colors focus:outline-none cursor-pointer"
                        >
                            <div class="w-8 h-8 rounded-lg bg-blue-600 text-white font-bold flex items-center justify-center text-xs shadow-xs">
                                {{ auth()->user()->initials ?? 'AD' }}
                            </div>
                            <span class="material-symbols-outlined text-[18px] text-slate-400">expand_more</span>
                        </button>

                        <div 
                            x-show="userMenu" 
                            @click.away="userMenu = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-56 rounded-xl bg-white border border-slate-200 shadow-xl py-2 z-50 divide-y divide-slate-100"
                            style="display: none;"
                        >
                            <div class="px-4 py-2.5">
                                <p class="text-xs font-bold text-slate-900">{{ auth()->user()->name }}</p>
                                <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('admin.pengaturan') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs text-slate-700 hover:text-blue-600 hover:bg-slate-50">
                                    <span class="material-symbols-outlined text-[18px] text-slate-400">person</span>
                                    <span>Profil &amp; Keamanan</span>
                                </a>
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs text-slate-700 hover:text-blue-600 hover:bg-slate-50">
                                    <span class="material-symbols-outlined text-[18px] text-slate-400">speed</span>
                                    <span>Performa Portal</span>
                                </a>
                            </div>
                            <div class="py-1">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 text-left cursor-pointer">
                                        <span class="material-symbols-outlined text-[18px]">logout</span>
                                        <span>Keluar (Logout)</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </header>

            <!-- Main Scrollable Content Area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-8 bg-slate-50">
                <div class="max-w-7xl mx-auto space-y-6">

                    <!-- Flash Notification Banners -->
                    @if(session('success'))
                        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-3 shadow-2xs">
                            <span class="material-symbols-outlined text-[22px] text-emerald-600 shrink-0">check_circle</span>
                            <p class="font-medium">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(session('warning'))
                        <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-sm flex items-center gap-3 shadow-2xs">
                            <span class="material-symbols-outlined text-[22px] text-amber-600 shrink-0">warning</span>
                            <p class="font-medium">{{ session('warning') }}</p>
                        </div>
                    @endif

                    @if(session('error') || $errors->any())
                        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm flex items-center gap-3 shadow-2xs">
                            <span class="material-symbols-outlined text-[22px] text-rose-600 shrink-0">error</span>
                            <div>
                                @if(session('error'))
                                    <p class="font-medium">{{ session('error') }}</p>
                                @endif
                                @foreach($errors->all() as $err)
                                    <p class="font-medium">{{ $err }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Injected Page Content -->
                    @yield('content')

                </div>
            </main>

            <!-- Admin Footer -->
            <footer class="py-3 px-6 sm:px-8 border-t border-slate-200 bg-white text-center sm:flex sm:items-center sm:justify-between text-xs text-slate-500 shrink-0">
                <p>&copy; 2026 Ikatan Analis Kebijakan Indonesia (INAKI). Hak Cipta Dilindungi.</p>
                <p class="mt-1 sm:mt-0 flex items-center justify-center gap-2">
                    <span>Versi Portal 1.0.0</span>
                    <span>•</span>
                    <span class="text-blue-600 font-medium">Laravel 12 / PHP 8.5</span>
                </p>
            </footer>

        </div>
    </div>

</body>
</html>

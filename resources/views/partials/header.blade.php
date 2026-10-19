<!-- ==================== HEADER SECTION ==================== -->
<header class="w-full bg-white shadow-sm border-b border-slate-200 sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    
    <!-- 1. Utility Top Bar (Dibersihkan: Tanpa Kanal Resmi & Tanpa Akreditasi LAN RI) -->
    <div class="bg-slate-50 border-b border-slate-100 py-2.5 px-6 lg:px-12 text-xs text-slate-600 transition-all min-h-[38px] md:h-[38px] flex items-center">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-y-2 w-full">
            <!-- Info Lokasi Gedung Graha Wicaksana -->
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-blue-600 shrink-0">
                    <path d="M10 12h4"></path><path d="M10 8h4"></path><path d="M14 21v-3a2 2 0 0 0-4 0v3"></path>
                    <path d="M6 10H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2"></path>
                    <path d="M6 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"></path>
                </svg>
                <span class="font-medium tracking-tight">Gedung Graha Wicaksana Kampus PPLPN LAN / ASN Corporate University LAN RI</span>
            </div>

            <!-- Info Kontak Hotline & Surel -->
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-blue-600 shrink-0">
                        <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                    </svg>
                    <span class="font-medium">Hotline:</span>
                    <a href="tel:+62213868201" class="hover:text-blue-600 transition-colors">+62 21 386 8201</a>
                </div>
                <div class="flex items-center space-x-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 text-blue-600 shrink-0">
                        <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                    </svg>
                    <a href="mailto:sekretariat@inaki.or.id" class="hover:text-blue-600 transition-colors">sekretariat@inaki.or.id</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Main Navigation Bar (Tanpa Search Bar & Tanpa Tombol Portal Anggota, Menu Tertata Rapi & Seimbang) -->
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-20 flex items-center justify-between">
        
        <!-- Logo INAKI -->
        <a href="{{ url('/') }}" class="flex items-center gap-3 group focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg p-1">
            <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-11 w-auto object-contain transition-transform group-hover:scale-105"
                 onerror="this.src='https://lh3.googleusercontent.com/aida-public/AB6AXuD6-y_hu52563tVdzH9HklNaleHU-4Wa1MUhvTZPTw6Ej4ZNtK48vFD8LSCdfX9v-EuZTHns10YK5WFfXfrTBYZbUcOFyA31XAzFg6SW2unW2H6MPhKQ_39bDGDcBkp7gEdLyns12aAkVAoUWwwrRU1Q0L_S_ANUgFZv8juJfOI_Xr92ib1Z1hDcLR1Vzepej2pV0lIs-tu2UnqKJmHsTswKFHUw2kKAKvFv4enGec5MYJQKYobLVyLkQ'">
            <div class="flex flex-col">
                <span class="font-display font-extrabold text-xl tracking-tight text-slate-900 leading-none">INAKI</span>
                <span class="text-[10px] font-semibold tracking-wider text-slate-600 uppercase mt-0.5">Ikatan Nasional Analis Kebijakan</span>
            </div>
        </a>

        <!-- Menu Navigasi Utama -->
        <nav class="hidden md:flex items-center space-x-1.5 lg:space-x-3 bg-slate-50/80 p-1.5 rounded-2xl border border-slate-200/70">
            <!-- Beranda -->
            <a href="{{ url('/') }}" class="px-5 py-2.5 rounded-xl font-display font-semibold text-sm transition-all {{ request()->is('/') ? 'text-blue-600 bg-white shadow-sm border border-slate-200/60' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/60' }}">
                Beranda
            </a>

            <!-- Tentang Kami -->
            <a href="{{ url('/tentang-kami') }}" class="px-5 py-2.5 rounded-xl font-display font-semibold text-sm transition-all {{ request()->is('tentang-kami*') ? 'text-blue-600 bg-white shadow-sm border border-slate-200/60' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/60' }}">
                Tentang Kami
            </a>

            <!-- Publikasi -->
            <a href="{{ url('/publikasi') }}" class="px-5 py-2.5 rounded-xl font-display font-semibold text-sm transition-all {{ request()->is('publikasi*') ? 'text-blue-600 bg-white shadow-sm border border-slate-200/60' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/60' }}">
                Publikasi
            </a>

            <!-- Keanggotaan -->
            <a href="{{ url('/keanggotaan') }}" class="px-5 py-2.5 rounded-xl font-display font-semibold text-sm transition-all {{ request()->is('keanggotaan*') ? 'text-blue-600 bg-white shadow-sm border border-slate-200/60' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/60' }}">
                Keanggotaan
            </a>


            <!-- Kontak Kami -->
            <a href="{{ url('/kontak') }}" class="px-5 py-2.5 rounded-xl font-display font-semibold text-sm transition-all {{ request()->is('kontak*') ? 'text-blue-600 bg-white shadow-sm border border-slate-200/60' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/60' }}">
                Kontak Kami
            </a>
        </nav>

        <!-- Mobile Menu Button (Hamburger) -->
        <div class="md:hidden flex items-center">
            <button @click="mobileMenuOpen = !mobileMenuOpen" 
                    type="button" 
                    aria-label="Buka Menu Navigasi" 
                    :aria-expanded="mobileMenuOpen ? 'true' : 'false'"
                    aria-controls="mobile-nav-dropdown"
                    class="p-2.5 rounded-xl text-slate-700 hover:text-slate-900 hover:bg-slate-100 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-600/30">
                <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-nav-dropdown"
         x-show="mobileMenuOpen" 
         x-cloak
         x-collapse
         class="md:hidden border-t border-slate-200 bg-white px-6 py-4 space-y-1.5 shadow-lg">
        <a href="{{ url('/') }}" class="block px-4 py-2.5 rounded-xl font-display font-semibold text-sm {{ request()->is('/') ? 'text-blue-600 bg-blue-50 border border-blue-100' : 'text-slate-600 hover:bg-slate-50' }}">
            Beranda
        </a>
        <a href="{{ url('/tentang-kami') }}" class="block px-4 py-2.5 rounded-xl font-display font-semibold text-sm {{ request()->is('tentang-kami*') ? 'text-blue-600 bg-blue-50 border border-blue-100' : 'text-slate-600 hover:bg-slate-50' }}">
            Tentang Kami
        </a>
        <a href="{{ url('/publikasi') }}" class="block px-4 py-2.5 rounded-xl font-display font-semibold text-sm {{ request()->is('publikasi*') ? 'text-blue-600 bg-blue-50 border border-blue-100' : 'text-slate-600 hover:bg-slate-50' }}">
            Publikasi
        </a>
        <a href="{{ url('/keanggotaan') }}" class="block px-4 py-2.5 rounded-xl font-display font-semibold text-sm {{ request()->is('keanggotaan*') ? 'text-blue-600 bg-blue-50 border border-blue-100' : 'text-slate-600 hover:bg-slate-50' }}">
            Keanggotaan
        </a>
        <a href="{{ url('/kontak') }}" class="block px-4 py-2.5 rounded-xl font-display font-semibold text-sm {{ request()->is('kontak*') ? 'text-blue-600 bg-blue-50 border border-blue-100' : 'text-slate-600 hover:bg-slate-50' }}">
            Kontak Kami
        </a>
    </div>

    <!-- 3. Badge Banner Dibawah Header (Freeze saat scroll di halaman awal) -->
    @if(request()->is('/') || request()->routeIs('home'))
        @include('components.home.ticker')
    @endif
</header>

@extends('layouts.admin')

@section('title', 'Pengaturan Akun & Keamanan')
@section('page-title', 'Pengaturan Akun Administrator')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left Column: Admin Profile Card -->
        <div class="bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs space-y-6">
            <div class="text-center">
                <div class="w-20 h-20 rounded-2xl bg-blue-600 text-white font-extrabold text-2xl flex items-center justify-center mx-auto shadow-md shadow-blue-600/20">
                    {{ $admin->initials ?? 'AD' }}
                </div>
                <h3 class="text-lg font-bold text-slate-900 mt-4 font-headline">{{ $admin->name }}</h3>
                <p class="text-xs text-slate-500 font-mono mt-0.5">{{ $admin->email }}</p>
                
                <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-semibold">
                    <span>Role: Super Administrator</span>
                </div>
            </div>

            <div class="border-t border-slate-100 pt-5 space-y-3 text-xs">
                <div class="flex items-center justify-between">
                    <span class="text-slate-500">Kontak Telepon:</span>
                    <span class="text-slate-800 font-mono font-medium">{{ $admin->phone ?? '+62 811-972-8888' }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-500">Status Akun:</span>
                    <span class="text-emerald-700 font-semibold flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Aktif
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-500">Terdaftar Sejak:</span>
                    <span class="text-slate-800 font-mono">{{ $admin->created_at ? $admin->created_at->format('d M Y') : '17 Okt 2026' }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-500">Sesi IP Terakhir:</span>
                    <span class="text-blue-600 font-mono font-medium">{{ $admin->last_login_ip ?? '127.0.0.1' }}</span>
                </div>
            </div>

            <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 text-xs">
                <p class="font-semibold text-slate-800">Hak Akses Penuh</p>
                <p class="mt-1 leading-relaxed">
                    Akun ini memiliki hak akses administrator utama untuk memodifikasi direktori file publikasi, berita, regulasi, dan basis data keanggotaan.
                </p>
            </div>
        </div>

        <!-- Right Column: Security & Password Setting Form -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Change Password Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 shadow-xs">
                <div class="border-b border-slate-100 pb-4 mb-6">
                    <h3 class="text-lg font-bold text-slate-900 font-headline flex items-center gap-2">
                        <span class="material-symbols-outlined text-blue-600 text-[22px]">lock_reset</span>
                        <span>Perbarui Kata Sandi Administrator</span>
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">
                        Gunakan kombinasi minimal 8 karakter dengan huruf kapital, angka, dan simbol untuk keamanan maksimal.
                    </p>
                </div>

                <form onsubmit="event.preventDefault(); alert('Modul ubah kata sandi akan dihubungkan ke controller saat update kredensial.');" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Kata Sandi Saat Ini</label>
                        <input 
                            type="password" 
                            placeholder="••••••••••••" 
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 text-xs sm:text-sm placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600"
                        >
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Kata Sandi Baru</label>
                            <input 
                                type="password" 
                                placeholder="••••••••••••" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 text-xs sm:text-sm placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Konfirmasi Kata Sandi Baru</label>
                            <input 
                                type="password" 
                                placeholder="••••••••••••" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 text-xs sm:text-sm placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600"
                            >
                        </div>
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button 
                            type="submit" 
                            class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-bold shadow-xs transition-all cursor-pointer"
                        >
                            Simpan Perubahan Sandi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Security Audit / Guard Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs">
                <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-emerald-600 text-[22px]">shield</span>
                    <span>Protokol Keamanan Sistem</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                        <span class="material-symbols-outlined text-blue-600 text-[20px] shrink-0">speed</span>
                        <div>
                            <p class="font-bold text-slate-900">Rate Limiter Terpasang</p>
                            <p class="text-slate-500 text-[11px] mt-0.5 leading-relaxed">Membatasi maksimal 5 kegagalan login per IP sebelum penahanan sementara selama 60 detik.</p>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                        <span class="material-symbols-outlined text-blue-600 text-[20px] shrink-0">token</span>
                        <div>
                            <p class="font-bold text-slate-900">CSRF Token Guard</p>
                            <p class="text-slate-500 text-[11px] mt-0.5 leading-relaxed">Semua formulir POST/PUT/DELETE divalidasi dengan token sesi unik anti-pemalsuan.</p>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                        <span class="material-symbols-outlined text-blue-600 text-[20px] shrink-0">no_accounts</span>
                        <div>
                            <p class="font-bold text-slate-900">Pendaftaran Publik Ditutup</p>
                            <p class="text-slate-500 text-[11px] mt-0.5 leading-relaxed">Tidak ada rute register publik terbuka. Akun admin dikelola secara aman.</p>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-start gap-3">
                        <span class="material-symbols-outlined text-blue-600 text-[20px] shrink-0">folder_supervised</span>
                        <div>
                            <p class="font-bold text-slate-900">Path Traversal Shield</p>
                            <p class="text-slate-500 text-[11px] mt-0.5 leading-relaxed">Pengendali berkas publikasi memverifikasi whitelist nama file untuk mencegah kebocoran direktori.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

<section x-show="category === 'semua' || category === 'repository'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         class="rounded-2xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white p-8 sm:p-12 lg:p-14 text-center shadow-lg border border-slate-700/60 relative overflow-hidden">
    <!-- Subtle Backdrop Glow -->
    <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
        <div class="w-96 h-96 bg-amber-400 rounded-full blur-3xl"></div>
    </div>
    <div class="relative z-10 max-w-2xl mx-auto space-y-4">
        <!-- Gembok Ikon Kuning & Status Pill -->
        <div class="flex flex-col items-center gap-2">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-800/90 border border-slate-700 text-amber-400 shadow-inner">
                <span class="material-symbols-outlined text-[24px]">lock</span>
            </div>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-400/10 border border-amber-400/30 text-amber-300 text-xs font-semibold">
                <span class="material-symbols-outlined text-[15px]">construction</span>
                <span>Dalam Tahap Pengembangan Sistem</span>
            </div>
        </div>
        <!-- Heading Repository INAKI -->
        <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white font-headline">
            Repository INAKI
        </h2>
        <!-- Deskripsi Resensi & Jurnal Ilmiah -->
        <p class="text-slate-300 text-xs sm:text-sm leading-relaxed max-w-xl mx-auto">
            Akses eksklusif koleksi <span class="font-medium text-slate-100">Resensi Buku</span> (termasuk referensi dari Bapak Haris Faozan) serta <span class="font-medium text-slate-100">Buku Referensi</span> dan <span class="font-medium text-slate-100">Artikel Jurnal</span> yang dibagikan oleh sesama anggota.
        </p>
        <p class="text-xs text-amber-300/80 font-medium max-w-md mx-auto">
            * Layanan repositori digital anggota sedang dalam tahap pengembangan sistem.
        </p>
        <!-- Tombol Kuning / Oranye Kontras -->
        <div class="pt-2">
            <a class="inline-flex items-center gap-2 px-8 py-3.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-sm shadow-md hover:shadow-lg transition-all transform active:scale-95 font-headline" href="{{ route('repository.login') }}">
                <span class="material-symbols-outlined text-[18px]">lock_open</span>
                <span>Login untuk Akses Repository</span>
            </a>
        </div>
    </div>
</section>
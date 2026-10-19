<section class="max-w-7xl mx-auto px-8 py-10 w-full">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-2">
        <div class="flex flex-col gap-1">
            <div class="flex items-center gap-2 text-primary text-xs font-semibold uppercase tracking-wider">
                <span class="w-2.5 h-0.5 bg-primary rounded-full"></span>
                <span>Karya & Literasi Kebijakan</span>
            </div>
            <h2 class="font-headline text-2xl lg:text-3xl text-on-surface font-bold">
                Publikasi & Pengembangan Kompetensi
            </h2>
        </div>
        <a class="px-4 py-2 rounded-xl bg-surface-container-lowest text-primary hover:bg-surface-container-low font-headline text-sm font-semibold shadow-sm transition-all flex items-center gap-1.5 self-start md:self-auto" href="{{ url('/publikasi') }}">
            <span>Lihat Semua Publikasi</span>
            <span class="material-symbols-outlined text-[18px]">menu_book</span>
        </a>
    </div>

    <!-- Featured Publications Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Book 1 -->
        <div class="rounded-3xl bg-surface-container-lowest p-6 lg:p-8 shadow-sm flex flex-col justify-between gap-4">
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <span class="px-3 py-1 rounded-full bg-primary text-on-primary text-[10px] font-bold uppercase tracking-wide">
                        Buku Prosiding
                    </span>
                    <span class="font-mono text-xs text-slate-600 font-medium">ISBN: 978-623-09-8120-1</span>
                </div>
                <h3 class="font-headline text-xl font-bold text-on-surface">
                    Welcoming Member INAKI 2025 – Membangun Akses, Menguatkan Peran Analis Kebijakan
                </h3>
                <p class="text-sm text-on-surface-variant leading-relaxed">
                    Buku ini merupakan kumpulan rekam jejak pemikiran, rekomendasi strategis, serta dokumentasi ilmiah dari rangkaian acara penyambutan anggota baru INAKI. Merangkum 30 Policy Brief hasil pelatihan anggota terkait pemenuhan layanan dasar yang inklusif dan akuntabel di tingkat daerah.
                </p>
                <div class="flex items-center gap-4 pt-1 text-on-surface-variant text-xs">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-primary" aria-hidden="true">description</span>
                        186 Halaman
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-emerald-700" aria-hidden="true">download_done</span>
                        1,420x Diunduh
                    </span>
                </div>
            </div>
            <div class="pt-2">
                <a href="{{ route('publikasi.unduh', 'prosiding-layanan-dasar-2026') }}" class="w-full py-2.5 rounded-xl bg-surface-container-low text-primary font-headline text-sm font-semibold hover:bg-surface-container transition-all flex items-center justify-center gap-2 group">
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-y-0.5 transition-transform" aria-hidden="true">download</span>
                    <span>Unduh Prosiding Lengkap (PDF)</span>
                </a>
            </div>
        </div>

        <!-- Book 2 -->
        <div class="rounded-3xl bg-surface-container-lowest p-6 lg:p-8 shadow-sm flex flex-col justify-between gap-4">
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <span class="px-3 py-1 rounded-full bg-emerald-800 text-white text-[10px] font-bold uppercase tracking-wider shadow-xs">
                        Buku Pedoman Terkini 2026
                    </span>
                    <span class="font-mono text-xs text-slate-600 font-medium">Edisi I — Cetakan Pertama</span>
                </div>
                <h3 class="font-headline text-xl font-bold text-on-surface">
                    Pedoman Pelayanan Darurat Pasca Bencana di Tingkat Pemerintah Daerah 2026
                </h3>
                <p class="text-sm text-on-surface-variant leading-relaxed">
                    Buku panduan strategis yang disusun sebagai sumbangsih pemikiran berbasis analisis kebijakan dari tim ad-hoc INAKI untuk menjadi acuan taktis bagi Pemerintah Daerah. Menitikberatkan pada 4 pilar utama: Cepat, Terkoordinasi, Adaptif terhadap kerentanan lokal, dan Akuntabel secara anggaran.
                </p>
                <div class="flex items-center gap-4 pt-1 text-on-surface-variant text-xs">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-emerald-600">article</span>
                        11 Halaman
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-emerald-600">verified_user</span>
                        Rekomendasi BNPB & Kemendagri
                    </span>
                </div>
            </div>
            <div class="pt-2">
                <a href="{{ route('publikasi.unduh', 'pedoman-darurat-bencana-2026') }}" class="w-full py-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200/60 font-headline text-sm font-semibold transition-all flex items-center justify-center gap-2 group">
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-y-0.5 transition-transform">download</span>
                    <span>Unduh Pedoman Kebijakan (PDF)</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Repository & Direktori Dual Banners -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Repository -->
        <div class="rounded-2xl bg-primary text-on-primary p-6 shadow-sm flex flex-col justify-between gap-4">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-md flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[26px]">library_books</span>
                </div>
                <div class="flex flex-col">
                    <h4 class="font-headline text-lg font-bold text-white">Repository INAKI</h4>
                    <p class="text-sm text-on-primary/85 mt-1 leading-relaxed">
                        Akses eksklusif koleksi resensi buku, buku referensi kebijakan publik, dan artikel jurnal terakreditasi internasional untuk anggota aktif INAKI.
                    </p>
                </div>
            </div>
            <div>
                <a href="{{ url('/keanggotaan') }}" class="px-5 py-2 rounded-xl bg-white text-primary font-headline text-sm font-semibold hover:bg-surface-container-high transition-all shadow-sm inline-flex items-center gap-1.5">
                    <span>Login untuk Akses Koleksi</span>
                    <span class="material-symbols-outlined text-[16px]">lock_open</span>
                </a>
            </div>
        </div>

        <!-- Direktori Peraturan -->
        <div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm flex flex-col justify-between gap-4">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-surface-container-low text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[26px]">gavel</span>
                </div>
                <div class="flex flex-col">
                    <h4 class="font-headline text-lg font-bold text-on-surface">Direktori Peraturan JFAK</h4>
                    <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">
                        Pusat informasi dan pembaruan regulasi terkait Jabatan Fungsional Analis Kebijakan dari MenPANRB, LAN RI, BKN, serta kompilasi AD/ART dan etika organisasi.
                    </p>
                </div>
            </div>
            <div>
                <a href="{{ url('/publikasi#direktori-regulasi') }}" class="px-5 py-2 rounded-xl bg-surface-container-low text-on-surface hover:text-primary hover:bg-surface-container font-headline text-sm font-semibold transition-all inline-flex items-center gap-1.5">
                    <span>Lihat Daftar Peraturan</span>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                </a>
            </div>
        </div>
    </div>
</section>
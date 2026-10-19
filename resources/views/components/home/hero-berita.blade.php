<section class="max-w-7xl mx-auto px-8 pt-6 pb-10 w-full">
    <div class="flex flex-col gap-1 mb-4">
        <div class="flex items-center gap-2 text-primary text-xs font-semibold uppercase tracking-wider">
            <span class="w-2.5 h-0.5 bg-primary rounded-full"></span>
            <span>Agenda & Kilas Bersejarah</span>
        </div>
        <h2 class="font-headline text-3xl text-on-surface font-extrabold tracking-tight">
            Pemberitaan & Fondasi Gerakan
        </h2>
    </div>

    <!-- Feature Card -->
    <div class="relative w-full rounded-3xl bg-surface-container-lowest shadow-[0_4px_24px_rgba(15,23,42,0.06)] overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
            <!-- Visual Column -->
            <div class="lg:col-span-6 relative min-h-[340px] lg:min-h-[460px] overflow-hidden bg-surface-container">
                <img class="w-full h-full object-cover transition-transform duration-700 hover:scale-105" 
                     src="{{ asset('images/hero-deklarasi.jpg') }}" 
                     alt="Deklarasi INAKI"
                     onerror="this.src='https://lh3.googleusercontent.com/aida-public/AB6AXuAm2w3CABvQV2H2J9rCxjE62meUauuzkVKoSvwIE9fwupTWuOS4shvv3hyHf9YRYzjzquuV8XUPb6F1jMNpS8nsSR0oFsN4Ntqz22Qt6550E8GC3MRfCV9etPNH919COhDl5-3g2tkVMsTDwtnTDKEH2DojnktIL8sKrFEGDN3ztp7Io77MG0JPc46XJ8GoLZogvO47ysxgre1X3nb7wzcMhJv09l070mOwVsISBpqHrUYH22sTdUvfKw'">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent lg:hidden"></div>
                <div class="absolute top-4 left-4 flex items-center gap-2">
                    <span class="px-3 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md text-primary text-[10px] font-bold uppercase tracking-wider shadow-sm">
                        Dokumentasi Resmi
                    </span>
                </div>
                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between text-white text-xs lg:hidden">
                    <span>LAN RI, Jakarta Pusat</span>
                    <span>4 Juli 2025</span>
                </div>
            </div>

            <!-- Content Column -->
            <div class="lg:col-span-6 p-6 lg:p-10 flex flex-col justify-between bg-surface-container-lowest">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="px-3 py-1 rounded-lg bg-primary text-on-primary text-xs font-semibold flex items-center gap-1.5 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-surface-container-lowest animate-pulse"></span>
                            BERITA UTAMA
                        </span>
                        <div class="flex items-center gap-1 text-on-surface-variant text-xs">
                            <span class="material-symbols-outlined text-[16px] text-slate-600" aria-hidden="true">calendar_today</span>
                            <span>4 Juli 2025</span>
                        </div>
                        <span class="text-slate-400" aria-hidden="true">•</span>
                        <div class="flex items-center gap-1 text-on-surface-variant text-xs">
                            <span class="material-symbols-outlined text-[16px] text-slate-600" aria-hidden="true">schedule</span>
                            <span>4 min baca</span>
                        </div>
                    </div>
                    <h1 class="font-headline text-2xl lg:text-3xl text-on-surface font-bold tracking-tight">
                        Momen Bersejarah Pendirian Ikatan Nasional Analis Kebijakan
                    </h1>
                    <p class="text-sm lg:text-base text-on-surface-variant leading-relaxed">
                        INAKI resmi disahkan sebagai wadah tunggal organisasi profesi bagi Jabatan Fungsional Analis Kebijakan (JFAK). Pengukuhan ini disahkan langsung oleh Kepala Lembaga Administrasi Negara (LAN) pada 3 Juli 2025, dengan acara puncak peringatan pada 4 Juli 2025 yang kemudian ditetapkan sebagai hari lahir resmi perkumpulan INAKI di Indonesia.
                    </p>
                    <div class="grid grid-cols-2 gap-2 py-1">
                        <div class="p-2.5 rounded-xl bg-surface-container-low flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]" aria-hidden="true">verified</span>
                            <div class="flex flex-col min-w-0">
                                <span class="text-[10px] text-slate-700 uppercase font-bold tracking-wide">Regulasi Dasar</span>
                                <span class="text-xs text-on-surface font-semibold truncate">Mandat LAN & MenPANRB</span>
                            </div>
                        </div>
                        <div class="p-2.5 rounded-xl bg-surface-container-low flex items-center gap-2">
                            <span class="material-symbols-outlined text-tertiary text-[20px]" aria-hidden="true">groups</span>
                            <div class="flex flex-col min-w-0">
                                <span class="text-[10px] text-slate-700 uppercase font-bold tracking-wide">Sifat Wadah</span>
                                <span class="text-xs text-on-surface font-semibold truncate">Tunggal & Inklusif</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-4 mt-2 flex flex-wrap items-center gap-2">
                    <a href="{{ url('/berita/sejarah-pendirian') }}" class="px-5 py-2.5 rounded-xl bg-primary text-on-primary font-headline text-sm font-semibold hover:bg-primary-container transition-all flex items-center gap-2 shadow-sm">
                        <span>Baca Sejarah Lengkapnya</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
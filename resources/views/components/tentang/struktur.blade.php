<section class="w-full py-10 lg:py-14 scroll-mt-[225px] bg-surface-container-lowest" id="struktur">
    <div class="max-w-7xl mx-auto px-8 flex flex-col gap-8" x-data="{ activePanel: 'pusat' }">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="flex flex-col gap-2">
                <span class="text-xs text-primary font-bold uppercase tracking-wider">Tata Kelola & Lembaga Perhimpunan</span>
                <h2 class="font-headline text-2xl lg:text-3xl font-bold text-on-surface">Struktur Organisasi</h2>
                <p class="text-sm text-on-surface-variant max-w-2xl leading-relaxed">Bagan hierarki kepemimpinan Dewan Pengawas, Pengurus Pusat, dan Komite Instansional INAKI se-Indonesia.</p>
            </div>
            <a href="#" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-surface-container-high text-primary hover:bg-primary hover:text-on-primary font-headline text-xs font-semibold transition-all shadow-sm shrink-0">
                <span class="material-symbols-outlined text-[18px]">download</span>
                <span>Unduh SK Kepengurusan Resmi (PDF)</span>
            </a>
        </div>

        <div class="flex items-center gap-3 p-3.5 rounded-xl bg-surface-container-low text-on-surface-variant text-xs shadow-sm">
            <span class="material-symbols-outlined text-primary text-[20px] shrink-0">info</span>
            <span><em>* Klik pada bagan struktur organisasi di bawah untuk membuka detail kepengurusan masing-masing tingkatan.</em></span>
        </div>

        <!-- Accordion Panels -->
        <div class="flex flex-col gap-4">
            <!-- Panel 1: Pengurus Pusat -->
            <div class="bg-surface-container-low rounded-2xl overflow-hidden shadow-sm transition-all duration-300">
                <button @click="activePanel = (activePanel === 'pusat' ? null : 'pusat')" 
                        class="w-full p-6 text-left flex items-center justify-between gap-4" type="button">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-primary text-on-primary flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[20px]">corporate_fare</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-headline text-base font-bold text-on-surface">Struktur Organisasi Pengurus Pusat</span>
                            <span class="text-xs text-on-surface-variant">Dewan Pengawas, Ketua Umum, Sekretariat Jenderal, Bendahara Umum, & Bidang Teknis</span>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-outline transition-transform duration-300"
                          :class="activePanel === 'pusat' ? 'rotate-180' : ''">expand_more</span>
                </button>
                <div x-show="activePanel === 'pusat'" x-collapse class="px-6 pb-6 pt-2 flex flex-col gap-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-1.5">
                            <span class="text-[10px] text-primary uppercase font-bold">Dewan Pengawas</span>
                            <p class="font-headline text-sm font-bold text-on-surface">Dr. Tri Widodo W. Utomo, SH, MA</p>
                            <span class="text-xs text-on-surface-variant">Kepala LAN RI (Ex-Officio Pembina)</span>
                        </div>
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-1.5">
                            <span class="text-[10px] text-primary uppercase font-bold">Ketua Umum</span>
                            <p class="font-headline text-sm font-bold text-on-surface">Drs. Agus Sudrajat, S.Sos, MA</p>
                            <span class="text-xs text-on-surface-variant">Deputi Kajian Kebijakan & Inovasi</span>
                        </div>
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-1.5">
                            <span class="text-[10px] text-primary uppercase font-bold">Sekretaris Jenderal</span>
                            <p class="font-headline text-sm font-bold text-on-surface">Bambang Suhartono, S.IP, M.Si</p>
                            <span class="text-xs text-on-surface-variant">Analis Kebijakan Ahli Madya</span>
                        </div>
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-1.5">
                            <span class="text-[10px] text-primary uppercase font-bold">Bendahara Umum</span>
                            <p class="font-headline text-sm font-bold text-on-surface">Rini Utami Wardani, SE, M.Ak</p>
                            <span class="text-xs text-on-surface-variant">Analis Kebijakan Ahli Muda</span>
                        </div>
                    </div>

                    <!-- Schematic Bidang Pusat -->
                    <div class="p-5 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-4">
                        <span class="font-headline text-sm text-on-surface font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[18px]">schema</span>
                            Hierarki Pembidangan Pengurus Pusat
                        </span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                            <div class="p-3 rounded-lg bg-surface-container flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">school</span>
                                <div class="flex flex-col">
                                    <span class="text-xs text-on-surface font-semibold">Bidang Pengembangan Kapasitas</span>
                                    <span class="text-[11px] text-on-surface-variant">Pelatihan & Sertifikasi Berkelanjutan</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-lg bg-surface-container flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">rule</span>
                                <div class="flex flex-col">
                                    <span class="text-xs text-on-surface font-semibold">Bidang Advokasi & Etika Profesi</span>
                                    <span class="text-[11px] text-on-surface-variant">Penegakan Kode Etik Analis Kebijakan</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-lg bg-surface-container flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">hub</span>
                                <div class="flex flex-col">
                                    <span class="text-xs text-on-surface font-semibold">Bidang Kerja Sama & Publikasi</span>
                                    <span class="text-[11px] text-on-surface-variant">Jejaring Nasional, Global & Jurnal Ilmiah</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel 2: Komite INAKI LAN -->
            <div class="bg-surface-container-low rounded-2xl overflow-hidden shadow-sm transition-all duration-300">
                <button @click="activePanel = (activePanel === 'lan' ? null : 'lan')" 
                        class="w-full p-6 text-left flex items-center justify-between gap-4" type="button">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-surface-container-high text-primary flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[20px]">account_balance</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-headline text-base font-bold text-on-surface">Struktur Organisasi Komite INAKI LAN</span>
                            <span class="text-xs text-on-surface-variant">Ditetapkan 8 Oktober 2025 • Komite Pembina Instansional Pusat</span>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-outline transition-transform duration-300"
                          :class="activePanel === 'lan' ? 'rotate-180' : ''">expand_more</span>
                </button>
                <div x-show="activePanel === 'lan'" x-collapse class="px-6 pb-6 pt-2 flex flex-col gap-4">
                    <p class="text-sm text-on-surface-variant leading-relaxed">
                        Komite INAKI Lembaga Administrasi Negara bertindak sebagai simpul koordinasi percontohan penerapan standar kompetensi analis kebijakan tingkat instansi pembina, mengoordinasikan telaah regulasi lintas kedeputian dan kurikulum jabatan fungsional.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm">
                            <span class="text-[10px] text-outline uppercase font-semibold">Ketua Komite LAN</span>
                            <p class="font-headline text-sm font-bold text-on-surface mt-1">Dra. Sri Wahyuni, M.Si</p>
                            <span class="text-xs text-on-surface-variant">Puslatbang KHAN</span>
                        </div>
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm">
                            <span class="text-[10px] text-outline uppercase font-semibold">Sekretaris Komite</span>
                            <p class="font-headline text-sm font-bold text-on-surface mt-1">Fajar Irawan, S.Sos, MPA</p>
                            <span class="text-xs text-on-surface-variant">Pusat Pembinaan Analis Kebijakan</span>
                        </div>
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm">
                            <span class="text-[10px] text-outline uppercase font-semibold">SK Penetapan</span>
                            <p class="font-headline text-sm font-bold text-on-surface mt-1">Kep-LAN 88/KOM-INAKI/2025</p>
                            <span class="text-xs text-on-surface-variant">Tanggal: 8 Oktober 2025</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel 3: Komite INAKI BPOM -->
            <div class="bg-surface-container-low rounded-2xl overflow-hidden shadow-sm transition-all duration-300">
                <button @click="activePanel = (activePanel === 'bpom' ? null : 'bpom')" 
                        class="w-full p-6 text-left flex items-center justify-between gap-4" type="button">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-surface-container-high text-primary flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[20px]">health_and_safety</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-headline text-base font-bold text-on-surface">Struktur Organisasi Komite INAKI BPOM</span>
                            <span class="text-xs text-on-surface-variant">Ditetapkan 25 November 2025 • Komite Pengawasan Regulasi Obat & Makanan</span>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-outline transition-transform duration-300"
                          :class="activePanel === 'bpom' ? 'rotate-180' : ''">expand_more</span>
                </button>
                <div x-show="activePanel === 'bpom'" x-collapse class="px-6 pb-6 pt-2 flex flex-col gap-4">
                    <p class="text-sm text-on-surface-variant leading-relaxed">
                        Komite INAKI Badan Pengawas Obat dan Makanan berfokus pada advokasi bukti ilmiah standardisasi regulasi keamanan pangan, kefarmasian, dan suplemen kesehatan dalam tata laksana pengawasan nasional.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm">
                            <span class="text-[10px] text-outline uppercase font-semibold">Ketua Komite BPOM</span>
                            <p class="font-headline text-sm font-bold text-on-surface mt-1">Apt. Hendra Kurniawan, M.Farm</p>
                            <span class="text-xs text-on-surface-variant">Direktorat Registrasi Obat</span>
                        </div>
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm">
                            <span class="text-[10px] text-outline uppercase font-semibold">Sekretaris Komite</span>
                            <p class="font-headline text-sm font-bold text-on-surface mt-1">Nurul Hidayati, S.Si, M.Epid</p>
                            <span class="text-xs text-on-surface-variant">Biro Hukum & Organisasi</span>
                        </div>
                        <div class="p-4 rounded-xl bg-surface-container-lowest shadow-sm">
                            <span class="text-[10px] text-outline uppercase font-semibold">SK Penetapan</span>
                            <p class="font-headline text-sm font-bold text-on-surface mt-1">Kep-BPOM 341/KOM-INAKI/2025</p>
                            <span class="text-xs text-on-surface-variant">Tanggal: 25 November 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
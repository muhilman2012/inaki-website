<section class="w-full px-4 sm:px-6 lg:px-12 py-8">
    <div class="max-w-7xl mx-auto">
        <div class="p-6 sm:p-8 rounded-3xl bg-white border border-[#E2E8F0] shadow-sm">
            <!-- Header Title -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-8">
                <div>
                    <div class="flex items-center gap-2 text-[#2563EB] text-xs font-bold uppercase tracking-wider">
                        <span class="w-2.5 h-0.5 bg-[#2563EB] rounded-full"></span>
                        <span>Standardisasi Administrasi</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold font-display text-[#0F172A] mt-1.5">
                        Tinjauan Kartu Tanda Anggota &amp; Alur Verifikasi
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-2xl leading-relaxed">
                        Standar keanggotaan INAKI dirancang terintegrasi dengan penomoran unik, verifikasi berjenjang, dan akses ke seluruh ekosistem layanan keprofesian analis kebijakan.
                    </p>
                </div>
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200/60 text-blue-700 text-xs font-semibold shrink-0 shadow-2xs">
                    <span class="material-symbols-outlined text-[16px] text-blue-600">verified_user</span>
                    <span>Sistem Autentikasi QR Terintegrasi</span>
                </span>
            </div>

            <!-- Cards Grid: 3 Pilar Utama Administrasi Keanggotaan -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Card 1: Visual Pratinjau KTA Digital Resmi -->
                <div class="rounded-2xl overflow-hidden border border-slate-200 bg-white flex flex-col group hover:shadow-xl hover:border-blue-300 transition-all duration-300">
                    <!-- Visual Widget: KTA Digital Card -->
                    <div class="p-5 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 relative overflow-hidden flex flex-col justify-between min-h-[220px]">
                        <!-- Glow Accent Background -->
                        <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-blue-500/15 pointer-events-none blur-xl"></div>
                        <div class="absolute -left-8 -top-8 w-24 h-24 rounded-full bg-amber-400/10 pointer-events-none blur-lg"></div>

                        <!-- KTA Header -->
                        <div class="flex items-center justify-between border-b border-white/10 pb-2.5 relative z-10">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-6 w-auto brightness-200">
                                <div>
                                    <p class="text-[10px] font-extrabold text-white tracking-widest leading-none">INAKI</p>
                                    <p class="text-[7.5px] text-blue-200/80 uppercase tracking-tight">KTA Digital Resmi</p>
                                </div>
                            </div>
                            <span class="text-[8px] font-bold px-2 py-0.5 rounded-full bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 shadow-xs font-mono tracking-wider">
                                ANGGOTA RESMI
                            </span>
                        </div>

                        <!-- KTA Body -->
                        <div class="flex items-center gap-3.5 my-2.5 relative z-10">
                            <div class="w-14 h-16 rounded-xl bg-slate-800/90 border-2 border-amber-400/70 overflow-hidden shrink-0 shadow-md flex flex-col items-center justify-center text-slate-400 relative">
                                <span class="material-symbols-outlined text-[30px] text-slate-300">person</span>
                                <div class="absolute bottom-0 inset-x-0 bg-slate-950/90 text-[7px] text-center text-amber-300 py-0.5 font-mono font-bold">
                                    3 x 4
                                </div>
                            </div>
                            <div class="min-w-0 flex-1 space-y-0.5">
                                <p class="font-extrabold text-xs text-white uppercase tracking-tight truncate">DR. HARIS FAOZAN, M.SI</p>
                                <p class="text-[9.5px] font-mono text-emerald-300 font-semibold">NIP: 198203152006041003</p>
                                <p class="text-[9px] text-blue-200 truncate">Analis Kebijakan Ahli Madya</p>
                                <p class="text-[8px] text-slate-400 truncate">Lembaga Administrasi Negara</p>
                            </div>
                        </div>

                        <!-- KTA Footer -->
                        <div class="pt-2 border-t border-white/10 flex items-center justify-between text-[8px] relative z-10 font-mono">
                            <span class="text-slate-300">NO: <strong class="text-amber-300">KTA-INAKI-2026-0002</strong></span>
                            <span class="inline-flex items-center gap-1 text-emerald-300 font-sans font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span>QR Auth Active</span>
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="p-5 flex flex-col flex-grow justify-between bg-white">
                        <div>
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                <span class="text-sm font-bold text-slate-900 font-headline">Tampilan KTA Resmi</span>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Struktur kartu tanda anggota elektronik dilengkapi QR Code autentikasi, nomor identitas terstandar, dan legalitas organisasi profesi terdaftar.
                            </p>
                        </div>
                        <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 text-[11px]">Format: E-KTA &amp; Fisik</span>
                            <a href="{{ route('keanggotaan.status') }}" class="font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                                <span>Cek Status</span>
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Alur Verifikasi & Validasi Data -->
                <div class="rounded-2xl overflow-hidden border border-slate-200 bg-white flex flex-col group hover:shadow-xl hover:border-emerald-300 transition-all duration-300">
                    <!-- Visual Widget: 3-Step Verification Pipeline -->
                    <div class="p-5 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-slate-50 relative flex flex-col justify-between min-h-[220px] border-b border-slate-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[15px]">verified</span>
                                <span>Tahapan Verifikasi</span>
                            </span>
                            <span class="text-[9px] px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-semibold">
                                SLA: 1–3 Hari Kerja
                            </span>
                        </div>

                        <!-- 3 Step Flow -->
                        <div class="space-y-2 my-auto">
                            <!-- Step 1 -->
                            <div class="flex items-center gap-2.5 p-2 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                                <div class="w-6 h-6 rounded-lg bg-blue-100 text-blue-700 font-bold text-xs flex items-center justify-center shrink-0">
                                    1
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-[11px] font-bold text-slate-800 leading-tight">Pengisian Formulir &amp; Berkas</p>
                                    <p class="text-[9.5px] text-slate-500 leading-tight truncate">SK JFAK, Pas Foto, &amp; Bukti Transfer</p>
                                </div>
                                <span class="material-symbols-outlined text-emerald-600 text-[16px] shrink-0">check_circle</span>
                            </div>

                            <!-- Step 2 -->
                            <div class="flex items-center gap-2.5 p-2 rounded-xl bg-white border border-emerald-300/80 shadow-2xs ring-1 ring-emerald-500/10">
                                <div class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs flex items-center justify-center shrink-0">
                                    2
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-[11px] font-bold text-slate-800 leading-tight">Validasi NIP &amp; Tim Verifikator</p>
                                    <p class="text-[9.5px] text-slate-500 leading-tight truncate">Pemeriksaan keabsahan administrasi</p>
                                </div>
                                <span class="material-symbols-outlined text-emerald-600 text-[16px] shrink-0">task_alt</span>
                            </div>

                            <!-- Step 3 -->
                            <div class="flex items-center gap-2.5 p-2 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                                <div class="w-6 h-6 rounded-lg bg-amber-100 text-amber-800 font-bold text-xs flex items-center justify-center shrink-0">
                                    3
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-[11px] font-bold text-slate-800 leading-tight">Penerbitan KTA Digital &amp; QR</p>
                                    <p class="text-[9.5px] text-slate-500 leading-tight truncate">Nomor resmi KTA-INAKI-YYYY-XXXX</p>
                                </div>
                                <span class="material-symbols-outlined text-blue-600 text-[16px] shrink-0">badge</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="p-5 flex flex-col flex-grow justify-between bg-white">
                        <div>
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                <span class="text-sm font-bold text-slate-900 font-headline">Sinkronisasi Basis Data</span>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Pemeriksaan berjenjang data NIP, integritas SK JFAK atau lembaga riset, serta penomoran KTA yang terdata resmi dalam database keanggotaan.
                            </p>
                        </div>
                        <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 text-[11px]">Verifikasi Terpusat DPP</span>
                            <a href="{{ route('keanggotaan.daftar') }}" class="font-semibold text-emerald-600 hover:text-emerald-700 flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                                <span>Daftar Sekarang</span>
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Ekosistem Layanan Terpadu Anggota -->
                <div class="rounded-2xl overflow-hidden border border-slate-200 bg-white flex flex-col group hover:shadow-xl hover:border-indigo-300 transition-all duration-300">
                    <!-- Visual Widget: Integrated Services Matrix -->
                    <div class="p-5 bg-gradient-to-br from-blue-900 via-indigo-950 to-slate-900 relative overflow-hidden flex flex-col justify-between min-h-[220px]">
                        <div class="absolute -right-6 -bottom-6 w-28 h-28 rounded-full bg-indigo-500/20 pointer-events-none blur-lg"></div>

                        <div class="flex items-center justify-between border-b border-white/10 pb-2 relative z-10">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-blue-300 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[15px]">hub</span>
                                <span>Fasilitas &amp; Ekosistem</span>
                            </span>
                            <span class="text-[9px] px-2 py-0.5 rounded-full bg-white/10 text-white font-mono">
                                Terpadu 2026
                            </span>
                        </div>

                        <!-- 4 Service Pills Grid -->
                        <div class="grid grid-cols-2 gap-2 my-2 relative z-10">
                            <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/15 text-white">
                                <span class="material-symbols-outlined text-amber-300 text-[18px] mb-0.5">menu_book</span>
                                <p class="text-[11px] font-bold leading-tight">Policy Brief &amp; Riset</p>
                                <p class="text-[8.5px] text-blue-200/80 leading-tight mt-0.5">Akses jurnal &amp; naskah</p>
                            </div>

                            <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/15 text-white">
                                <span class="material-symbols-outlined text-emerald-300 text-[18px] mb-0.5">gavel</span>
                                <p class="text-[11px] font-bold leading-tight">Advokasi Profesi</p>
                                <p class="text-[8.5px] text-blue-200/80 leading-tight mt-0.5">Bantuan &amp; konsultasi</p>
                            </div>

                            <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/15 text-white">
                                <span class="material-symbols-outlined text-cyan-300 text-[18px] mb-0.5">model_training</span>
                                <p class="text-[11px] font-bold leading-tight">Bimtek &amp; Diklat</p>
                                <p class="text-[8.5px] text-blue-200/80 leading-tight mt-0.5">Peningkatan kompetensi</p>
                            </div>

                            <div class="p-2.5 rounded-xl bg-white/10 backdrop-blur-xs border border-white/15 text-white">
                                <span class="material-symbols-outlined text-purple-300 text-[18px] mb-0.5">groups</span>
                                <p class="text-[11px] font-bold leading-tight">Jejaring Nasional</p>
                                <p class="text-[8.5px] text-blue-200/80 leading-tight mt-0.5">K/L dan Pemda</p>
                            </div>
                        </div>

                        <!-- Portal Link -->
                        <div class="pt-2 border-t border-white/10 flex items-center justify-between text-[8px] text-blue-200 relative z-10">
                            <span>Sinergi Pembina Instansi LAN RI</span>
                            <span class="text-amber-300 font-bold">INAKI Satu Pintu</span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="p-5 flex flex-col flex-grow justify-between bg-white">
                        <div>
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                                <span class="text-sm font-bold text-slate-900 font-headline">Portal Layanan Terpadu</span>
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Kemudahan akses repositori ilmiah terakreditasi, bimbingan teknis berkala, advokasi regulasi kebijakan publik, dan forum silaturahmi fungsional.
                            </p>
                        </div>
                        <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 text-[11px]">Khusus Anggota Aktif</span>
                            <a href="{{ route('publikasi') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                                <span>Eksplor Layanan</span>
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section x-show="category === 'semua' || category === 'regulasi' || category === 'repository'"
         id="direktori-regulasi"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         class="space-y-8 scroll-mt-[160px]"
         x-data="{
            regFilter: 'semua',
            searchQuery: '',
            statusFilter: 'semua',
            regulasiList: [
                // PERMENPAN-RB
                {
                    instansi: 'KemenPAN-RB',
                    nomor: 'PermenPAN-RB No. 18 Tahun 2024',
                    judul: 'Jabatan Fungsional di Bidang Pengembangan Kapasitas dan Pembelajaran Aparatur Sipil Negara',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Rumpun JFAK',
                    catatan: 'Ketentuan penataan terbaru rumpun jabatan fungsional kapasitas dan pembelajaran ASN tingkat nasional.',
                    tahun: '2024'
                },
                {
                    instansi: 'KemenPAN-RB',
                    nomor: 'PermenPAN-RB No. 1 Tahun 2023',
                    judul: 'Jabatan Fungsional',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Tata Kelola ASN',
                    catatan: 'Regulasi payung nasional transformasi tata kelola jabatan fungsional ASN berbasis predikat kinerja dan konversi angka kredit.',
                    tahun: '2023'
                },
                {
                    instansi: 'KemenPAN-RB',
                    nomor: 'PermenPAN-RB No. 45 Tahun 2013',
                    judul: 'Jabatan Fungsional Analis Kebijakan dan Angka Kreditnya',
                    status: 'dicabut',
                    statusLabel: 'Dicabut',
                    kategori: 'JFAK & Angka Kredit',
                    catatan: 'Dicabut sebagian dengan PermenPAN-RB No. 1 Tahun 2023, dan dicabut sepenuhnya dengan PermenPAN-RB No. 18 Tahun 2024.',
                    tahun: '2013'
                },

                // PERATURAN LAN RI
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan LAN RI No. 2 Tahun 2026',
                    judul: 'Perubahan atas Peraturan Lembaga Administrasi Negara Nomor 1 Tahun 2026 tentang Uji Kompetensi Jabatan Fungsional di Bidang Pengembangan Kapasitas dan Pembelajaran ASN',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Uji Kompetensi',
                    catatan: 'Penyempurnaan mekanisme pelaksanaan, instrumen penilaian, dan standar uji kompetensi JFAK terkini.',
                    tahun: '2026'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan LAN RI No. 1 Tahun 2026',
                    judul: 'Uji Kompetensi Jabatan Fungsional di Bidang Pengembangan Kapasitas dan Pembelajaran Aparatur Sipil Negara',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Uji Kompetensi',
                    catatan: 'Regulasi terkini standar uji kompetensi penjenjangan dan alih jabatan JFAK. Resmi mencabut Perka LAN No. 15 Tahun 2016.',
                    tahun: '2026'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan LAN RI No. 28 Tahun 2017',
                    judul: 'Pedoman Penulisan Karya Tulis Ilmiah Bagi Analis Kebijakan',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Karya Tulis Ilmiah',
                    catatan: 'Standar metodologi, kaidah sitasi, dan tata cara publikasi KTI di bidang kebijakan publik.',
                    tahun: '2017'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan LAN RI No. 22 Tahun 2017',
                    judul: 'Pedoman Tata Kerja Tim Penilai Jabatan Fungsional Analis Kebijakan dan Tata Cara Penilaian Angka Kredit',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Tim Penilai',
                    catatan: 'Prosedur pembentukan tim penilai dan tata cara penilaian angka kredit analis kebijakan.',
                    tahun: '2017'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan Kepala LAN No. 9 Tahun 2017',
                    judul: 'Pedoman Pengangkatan ke dalam Jabatan Fungsional Analis Kebijakan Melalui Penyesuaian/Inpassing',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Inpassing',
                    catatan: 'Ketentuan dan mekanisme inpassing JFAK. Menggantikan Peraturan LAN No. 33 Tahun 2014.',
                    tahun: '2017'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan Kepala LAN No. 14 Tahun 2016',
                    judul: 'Petunjuk Teknis Penilaian Kualitas Hasil Kegiatan Analis Kebijakan',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Penilaian Kualitas',
                    catatan: 'Bobot dan rubrik evaluasi hasil kerja output advokasi, telaah kebijakan, dan rekomendasi analis kebijakan.',
                    tahun: '2016'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan Kepala LAN No. 15 Tahun 2016',
                    judul: 'Petunjuk Teknis Uji Kompetensi Jabatan Fungsional Analis Kebijakan',
                    status: 'dicabut',
                    statusLabel: 'Dicabut',
                    kategori: 'Uji Kompetensi',
                    catatan: 'Dicabut dan digantikan dengan Peraturan LAN No. 1 Tahun 2026.',
                    tahun: '2016'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan LAN RI No. 33 Tahun 2015',
                    judul: 'Pedoman Penyelenggaraan Pelatihan Jabatan Fungsional Analis Kebijakan',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Pelatihan',
                    catatan: 'Kurikulum, silabus, dan pedoman penyelenggaraan pelatihan teknis pembentukan serta penjenjangan JFAK.',
                    tahun: '2015'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan Kepala LAN No. 27 Tahun 2015',
                    judul: 'Pedoman Pelaksanaan Jabatan Fungsional Analis Kebijakan dan Penilaian Kualitas Hasil Kerja Analis Kebijakan',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Penilaian Kualitas',
                    catatan: 'Standar pelaksanaan tugas dan instrumen penilaian mutu risalah kebijakan (policy brief, policy paper).',
                    tahun: '2015'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan LAN RI No. 32 Tahun 2014',
                    judul: 'Pedoman Penyusunan Formasi Jabatan Fungsional Analis Kebijakan',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Formasi',
                    catatan: 'Metodologi penghitungan kebutuhan formasi JFAK di instansi pemerintah pusat dan daerah.',
                    tahun: '2014'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan Kepala LAN No. 31 Tahun 2014',
                    judul: 'Standar Kompetensi Jabatan Fungsional Analis Kebijakan',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Standar Kompetensi',
                    catatan: 'Rincian kompetensi manajerial, sosial kultural, dan teknis substansi analisis kebijakan publik.',
                    tahun: '2014'
                },
                {
                    instansi: 'LAN RI',
                    nomor: 'Peraturan LAN RI No. 33 Tahun 2014',
                    judul: 'Pedoman Pengangkatan ke dalam Jabatan Fungsional Analis Kebijakan Melalui Penyesuaian/inpassing',
                    status: 'dicabut',
                    statusLabel: 'Dicabut',
                    kategori: 'Inpassing',
                    catatan: 'Dicabut dengan Peraturan Lembaga Administrasi Negara Nomor 9 Tahun 2017.',
                    tahun: '2014'
                },

                // PERATURAN BKN
                {
                    instansi: 'BKN',
                    nomor: 'Peraturan BKN No. 3 Tahun 2023',
                    judul: 'Angka Kredit, Kenaikan Pangkat dan Jenjang Jabatan Fungsional',
                    status: 'berlaku',
                    statusLabel: 'Berlaku',
                    kategori: 'Pangkat & Angka Kredit',
                    catatan: 'Ketentuan teknis nasional integrasi SKP tahunan ke angka kredit konversi dan mekanisme usul kenaikan jenjang pangkat JFAK.',
                    tahun: '2023'
                },

                // PERATURAN ORGANISASI INAKI
                {
                    instansi: 'INAKI',
                    nomor: 'Peraturan Organisasi No. 38/DPP-INAKI/PO.7/X/2025',
                    judul: 'Pedoman Pembentukan Pengurus Cabang Pada Instansi Pusat, Wilayah Dan Daerah',
                    status: 'berlaku',
                    statusLabel: 'Berlaku Resmi',
                    kategori: 'Peraturan Organisasi',
                    catatan: 'Prosedur dan ketentuan pembentukan kepengurusan cabang kementerian/lembaga dan daerah dengan syarat minimal 30 anggota aktif.',
                    tahun: '2025'
                }
            ],
            matchesFilter(item) {
                const matchesInstansi = this.regFilter === 'semua' || 
                    (this.regFilter === 'menpan' && item.instansi === 'KemenPAN-RB') ||
                    (this.regFilter === 'lan' && item.instansi === 'LAN RI') ||
                    (this.regFilter === 'bkn' && item.instansi === 'BKN') ||
                    (this.regFilter === 'inaki' && item.instansi === 'INAKI');

                const matchesStatus = this.statusFilter === 'semua' || item.status === this.statusFilter;

                const q = this.searchQuery.toLowerCase().trim();
                const matchesSearch = !q || 
                    item.nomor.toLowerCase().includes(q) || 
                    item.judul.toLowerCase().includes(q) || 
                    item.catatan.toLowerCase().includes(q) ||
                    item.kategori.toLowerCase().includes(q);

                return matchesInstansi && matchesStatus && matchesSearch;
            }
         }">

    <!-- ==================== HEADER DIREKTORI REGULASI ==================== -->
    <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 p-6 sm:p-8 lg:p-10 shadow-sm relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-200/80 text-primary flex items-center justify-center shrink-0 shadow-xs">
                    <span class="material-symbols-outlined text-[32px]">gavel</span>
                </div>
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-1.5">
                        <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold uppercase tracking-wider bg-primary text-white font-headline">
                            Kompilasi Hukum Resmi
                        </span>
                        <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-md border border-emerald-200">
                            Terupdate 2026
                        </span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-on-surface tracking-tight font-headline">
                        Direktori Regulasi & Kebijakan Jabatan Fungsional
                    </h2>
                    <p class="text-xs sm:text-sm text-on-surface-variant mt-1.5 max-w-3xl leading-relaxed">
                        Himpunan payung hukum resmi Jabatan Fungsional Analis Kebijakan (JFAK) dari <strong>KemenPAN-RB</strong>, <strong>LAN RI</strong> (Instansi Pembina), <strong>BKN</strong>, serta dokumen <strong>Statuta & Anggaran Dasar / Anggaran Rumah Tangga (AD/ART) INAKI</strong>.
                    </p>
                </div>
            </div>

            <!-- Ringkasan Statistik Regulasi -->
            <div class="flex items-center gap-3 shrink-0 w-full md:w-auto justify-end border-t md:border-t-0 pt-4 md:pt-0 border-outline-variant/30">
                <div class="px-4 py-2.5 rounded-xl bg-surface-container-low border border-outline-variant/30 text-center">
                    <span class="block text-lg font-extrabold text-primary font-headline">18+</span>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500">Regulasi Terhimpun</span>
                </div>
                <div class="px-4 py-2.5 rounded-xl bg-surface-container-low border border-outline-variant/30 text-center">
                    <span class="block text-lg font-extrabold text-emerald-600 font-headline">4</span>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500">Instansi / Lembaga</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== BAGIAN SPESIAL: STATUTA AD/ART INAKI ==================== -->
    <div class="bg-gradient-to-br from-slate-900 via-[#0B1C30] to-slate-900 text-white rounded-2xl p-6 sm:p-8 lg:p-10 shadow-md border border-slate-700/60 relative overflow-hidden">
        <!-- Background Ambient Accent -->
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-emerald-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10">
            <!-- Header Statuta -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-slate-700/60">
                <div>
                    <div class="flex items-center gap-2 text-xs font-bold tracking-widest text-amber-400 uppercase font-headline">
                        <span class="material-symbols-outlined text-[18px]">verified_user</span>
                        Statuta & Konstitusi Organisasi Profesi
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold tracking-tight text-white mt-1 font-headline">
                        Anggaran Dasar & Anggaran Rumah Tangga (AD/ART) INAKI
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-2xl leading-relaxed">
                        Dokumen legalitas resmi Perkumpulan Ikatan Analis Kebijakan Indonesia. Ditetapkan di Jakarta pada <strong>04 Juli 2025</strong> sesuai Akta Notaris Nomor 6 Tanggal 13 Februari 2025 dan Nomor 6 Tanggal 11 Juni 2025.
                    </p>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <span class="px-3 py-1 rounded-full bg-emerald-950/90 text-emerald-400 border border-emerald-500/40 text-xs font-semibold">
                        ● Berstatus Hukum Sah
                    </span>
                </div>
            </div>

            <!-- Grid 2 Dokumen AD & ART -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- KARTU 1: ANGGARAN DASAR (AD) -->
                <div class="bg-slate-800/80 rounded-xl p-5 sm:p-6 border border-slate-700/70 hover:border-blue-500/50 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-10 h-10 rounded-xl bg-blue-600/20 text-blue-400 border border-blue-500/30 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-[22px]">auto_stories</span>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-amber-400">Akta Notaris No. 6 Tahun 2025</span>
                                    <h4 class="text-base font-bold text-white font-headline">Anggaran Dasar (AD) INAKI</h4>
                                </div>
                            </div>
                            <span class="px-2 py-0.5 rounded bg-blue-900/60 text-blue-300 text-[10px] font-mono font-medium border border-blue-700/40">24 Hlm</span>
                        </div>

                        <p class="text-xs text-slate-300 mt-3 leading-relaxed">
                            Fondasi konstitusional perkumpulan berlandaskan Pancasila & UUD 1945 dengan <strong>Nilai Dasar AKTIIP</strong> (Akuntabilitas, Kolaboratif, Tanggung Jawab, Integritas, Independen, Profesional).
                        </p>

                        <!-- Rincian Poin Kunci AD -->
                        <div class="mt-4 space-y-1.5 text-[11px] text-slate-300">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[14px] text-emerald-400">check_circle</span>
                                <span><strong>18 BAB & 51 Pasal</strong>: Ruang lingkup, asas, maksud, tujuan & kegiatan organisasi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[14px] text-emerald-400">check_circle</span>
                                <span><strong>Status Keanggotaan</strong>: Anggota Tetap, Anggota Tidak Tetap & Kehormatan (Pasal 17)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[14px] text-emerald-400">check_circle</span>
                                <span><strong>Munas & Kepengurusan</strong>: Forum keputusan tertinggi per 3 tahun sekali (Pasal 26)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi Dokumen AD -->
                    <div class="mt-6 pt-4 border-t border-slate-700/60 flex flex-wrap items-center justify-between gap-3">
                        <a href="{{ route('publikasi.unduh', 'anggaran-dasar-inaki') }}" 
                           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold shadow-sm transition-all group-hover:shadow-blue-500/20">
                            <span class="material-symbols-outlined text-[16px]">download</span>
                            <span>Unduh Berkas AD (PDF)</span>
                        </a>
                        <a href="{{ route('publikasi.baca', 'anggaran-dasar-inaki') }}" 
                           target="_blank"
                           rel="noopener noreferrer" 
                           class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-slate-700/70 hover:bg-slate-700 text-slate-200 text-xs font-semibold border border-slate-600 transition-all">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            <span>Baca Dokumen</span>
                        </a>
                    </div>
                </div>

                <!-- KARTU 2: ANGGARAN RUMAH TANGGA (ART) -->
                <div class="bg-slate-800/80 rounded-xl p-5 sm:p-6 border border-slate-700/70 hover:border-emerald-500/50 transition-all flex flex-col justify-between group">
                    <div>
                        <div class="flex items-start justify-between gap-3">
                            <div class="flex items-center gap-2.5">
                                <div class="w-10 h-10 rounded-xl bg-emerald-600/20 text-emerald-400 border border-emerald-500/30 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-[22px]">menu_book</span>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400">Ditetapkan 04 Juli 2025</span>
                                    <h4 class="text-base font-bold text-white font-headline">Anggaran Rumah Tangga (ART) INAKI</h4>
                                </div>
                            </div>
                            <span class="px-2 py-0.5 rounded bg-emerald-900/60 text-emerald-300 text-[10px] font-mono font-medium border border-emerald-700/40">18 Hlm</span>
                        </div>

                        <p class="text-xs text-slate-300 mt-3 leading-relaxed">
                            Pedoman teknis operasional perkumpulan: tata cara pembentukan pengurus wilayah/daerah, keanggotaan ASN/non-ASN, dewan pengawas, serta atribut resmi organisasi.
                        </p>

                        <!-- Rincian Poin Kunci ART -->
                        <div class="mt-4 space-y-1.5 text-[11px] text-slate-300">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[14px] text-emerald-400">check_circle</span>
                                <span><strong>18 BAB & 35 Pasal</strong>: Pedoman tata kerja, tugas, wewenang & keuangan organisasi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[14px] text-emerald-400">check_circle</span>
                                <span><strong>Syarat Pengurus Cabang</strong>: Memiliki minimal 30 anggota aktif di K/L atau Pemda (Pasal 3)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-[14px] text-emerald-400">check_circle</span>
                                <span><strong>Atribut Resmi</strong>: Pengaturan lambang/logo, mars, dan kartu tanda anggota (Pasal 34)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi Dokumen ART -->
                    <div class="mt-6 pt-4 border-t border-slate-700/60 flex flex-wrap items-center justify-between gap-3">
                        <a href="{{ route('publikasi.unduh', 'anggaran-rumah-tangga-inaki') }}" 
                           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold shadow-sm transition-all group-hover:shadow-emerald-500/20">
                            <span class="material-symbols-outlined text-[16px]">download</span>
                            <span>Unduh Berkas ART (PDF)</span>
                        </a>
                        <a href="{{ route('publikasi.baca', 'anggaran-rumah-tangga-inaki') }}" 
                           target="_blank"
                           rel="noopener noreferrer" 
                           class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-slate-700/70 hover:bg-slate-700 text-slate-200 text-xs font-semibold border border-slate-600 transition-all">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            <span>Baca Dokumen</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Catatan Peraturan Organisasi Terkait -->
            <div class="mt-5 p-4 rounded-xl bg-slate-800/50 border border-slate-700/50 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs text-slate-300">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px] text-amber-400 shrink-0">account_tree</span>
                    <span>
                        <strong>Peraturan Organisasi Terkait:</strong> Peraturan Organisasi DPP INAKI Nomor: <span class="font-mono text-white">38/DPP-INAKI/PO.7/X/2025</span> tentang Pedoman Pembentukan Pengurus Cabang Pada Instansi Pusat, Wilayah Dan Daerah.
                    </span>
                </div>
                <span class="px-2.5 py-1 rounded bg-amber-500/15 text-amber-400 border border-amber-500/30 text-[10px] font-bold uppercase tracking-wider shrink-0">
                    Pedoman Cabang Aktif
                </span>
            </div>
        </div>
    </div>

    <!-- ==================== TABEL INTERAKTIF HIMPUNAN REGULASI NASIONAL ==================== -->
    <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/40 shadow-sm p-6 sm:p-8 space-y-6">
        <!-- Kontrol Filter & Pencarian -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pb-4 border-b border-outline-variant/30">
            <!-- Filter Pills Instansi -->
            <div class="flex flex-wrap items-center gap-1.5">
                <button @click="regFilter = 'semua'"
                        :class="regFilter === 'semua' ? 'bg-primary text-white shadow-xs' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                        class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all">
                    Semua Lembaga
                </button>
                <button @click="regFilter = 'menpan'"
                        :class="regFilter === 'menpan' ? 'bg-primary text-white shadow-xs' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                        class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all">
                    KemenPAN-RB
                </button>
                <button @click="regFilter = 'lan'"
                        :class="regFilter === 'lan' ? 'bg-primary text-white shadow-xs' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                        class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all">
                    LAN RI (Instansi Pembina)
                </button>
                <button @click="regFilter = 'bkn'"
                        :class="regFilter === 'bkn' ? 'bg-primary text-white shadow-xs' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                        class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all">
                    BKN
                </button>
                <button @click="regFilter = 'inaki'"
                        :class="regFilter === 'inaki' ? 'bg-primary text-white shadow-xs' : 'bg-surface-container-low text-on-surface-variant hover:bg-surface-container hover:text-on-surface'"
                        class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all">
                    Peraturan INAKI
                </button>
            </div>

            <!-- Filter Status & Search Box -->
            <div class="flex flex-wrap items-center gap-3">
                <select x-model="statusFilter" class="px-3 py-1.5 rounded-lg border border-outline-variant/40 bg-surface-container-low text-xs font-medium text-on-surface focus:ring-1 focus:ring-primary focus:outline-none">
                    <option value="semua">Semua Status</option>
                    <option value="berlaku">Hanya Berlaku</option>
                    <option value="dicabut">Dicabut / Tidak Berlaku</option>
                </select>

                <div class="relative w-full sm:w-64">
                    <span class="material-symbols-outlined absolute left-2.5 top-1/2 -translate-y-1/2 text-[18px] text-slate-400">search</span>
                    <input type="text" 
                           x-model="searchQuery" 
                           placeholder="Cari nomor, topik, kata kunci..." 
                           class="w-full pl-9 pr-3 py-1.5 rounded-lg border border-outline-variant/40 bg-surface-container-low text-xs text-on-surface focus:ring-1 focus:ring-primary focus:outline-none placeholder:text-slate-400">
                </div>
            </div>
        </div>

        <!-- Daftar Regulasi (List Card View) -->
        <div class="space-y-3.5">
            <template x-for="(item, index) in regulasiList.filter(it => matchesFilter(it))" :key="index">
                <div class="p-4 sm:p-5 rounded-xl border transition-all"
                     :class="item.status === 'berlaku' ? 'bg-surface-container-low border-outline-variant/40 hover:border-primary/40' : 'bg-slate-50/70 border-slate-200/60 opacity-80'">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
                        <div class="flex flex-wrap items-center gap-2">
                            <!-- Badge Instansi -->
                            <span class="px-2.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider font-headline"
                                  :class="{
                                      'bg-blue-100 text-blue-800 border border-blue-200': item.instansi === 'KemenPAN-RB',
                                      'bg-emerald-100 text-emerald-800 border border-emerald-200': item.instansi === 'LAN RI',
                                      'bg-amber-100 text-amber-800 border border-amber-200': item.instansi === 'BKN',
                                      'bg-purple-100 text-purple-800 border border-purple-200': item.instansi === 'INAKI'
                                  }"
                                  x-text="item.instansi">
                            </span>

                            <!-- Nomor Peraturan -->
                            <span class="font-bold text-xs sm:text-sm text-on-surface font-headline" x-text="item.nomor"></span>
                        </div>

                        <!-- Status Badge -->
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider inline-flex items-center gap-1 font-headline"
                                  :class="item.status === 'berlaku' ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 'bg-rose-100 text-rose-800 border border-rose-200'">
                                <span class="w-1.5 h-1.5 rounded-full" :class="item.status === 'berlaku' ? 'bg-emerald-600' : 'bg-rose-600'"></span>
                                <span x-text="item.statusLabel"></span>
                            </span>
                            <span class="text-[11px] font-medium text-slate-500 font-mono" x-text="item.tahun"></span>
                        </div>
                    </div>

                    <!-- Judul / Tentang -->
                    <h4 class="text-sm font-semibold text-primary mt-2 leading-snug font-headline" x-text="'Tentang ' + item.judul"></h4>

                    <!-- Catatan Yuridis & Keterangan -->
                    <div class="mt-2.5 flex flex-col sm:flex-row sm:items-center justify-between gap-2 pt-2.5 border-t border-outline-variant/20 text-xs text-on-surface-variant">
                        <div class="flex items-start gap-1.5 max-w-3xl leading-relaxed">
                            <span class="material-symbols-outlined text-[15px] text-slate-400 shrink-0 mt-0.5">info</span>
                            <span x-text="item.catatan"></span>
                        </div>
                        <span class="px-2 py-0.5 rounded bg-surface-container text-slate-600 text-[10px] font-medium shrink-0 self-start sm:self-auto" x-text="item.kategori"></span>
                    </div>
                </div>
            </template>

            <!-- State Jika Hasil Pencarian Kosong -->
            <div x-show="regulasiList.filter(it => matchesFilter(it)).length === 0" 
                 class="py-12 text-center text-slate-400 bg-surface-container-low rounded-xl border border-dashed border-outline-variant/40">
                <span class="material-symbols-outlined text-[36px] text-slate-300">search_off</span>
                <p class="mt-2 text-sm font-medium text-slate-600">Tidak ada regulasi yang sesuai dengan kata kunci atau filter.</p>
                <button @click="regFilter = 'semua'; statusFilter = 'semua'; searchQuery = ''" class="mt-3 text-xs text-primary font-semibold hover:underline">
                    Reset Filter Pencarian
                </button>
            </div>
        </div>

        <!-- Catatan Kaki Sumber Regulasi Resmi -->
        <div class="pt-4 border-t border-outline-variant/30 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs text-on-surface-variant">
            <span class="text-[11px] text-slate-500">
                * Sumber dokumentasi: JDIH KemenPAN-RB, JDIH Lembaga Administrasi Negara RI, JDIH BKN, dan Sekretariat DPP INAKI.
            </span>
            <div class="flex items-center gap-2 text-primary text-[11px] font-semibold">
                <span class="material-symbols-outlined text-[14px]">help</span>
                <span>Konsultasi Regulasi JFAK? Hubungi Sekretariat INAKI</span>
            </div>
        </div>
    </div>
</section>
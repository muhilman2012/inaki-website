<section class="max-w-7xl mx-auto px-8 py-10 w-full">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- Kolom Kiri: Layanan Mandiri (Span 5) -->
        <div class="lg:col-span-5 flex flex-col gap-4">
            <div class="flex flex-col gap-1">
                <div class="flex items-center gap-2 text-primary text-xs font-semibold uppercase tracking-wider">
                    <span class="w-2.5 h-0.5 bg-primary rounded-full"></span>
                    <span>Layanan Mandiri</span>
                </div>
                <h2 class="font-headline text-2xl lg:text-3xl text-on-surface font-bold">
                    Layanan Keanggotaan & KTA
                </h2>
                <p class="text-sm text-on-surface-variant">
                    Pendaftaran terintegrasi satu pintu dengan verifikasi Nomor Induk Pegawai (NIP) dan status JFAK aktif.
                </p>
            </div>

            <!-- Tombol Aksi Cepat -->
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ url('/keanggotaan/daftar') }}" class="flex flex-col items-center justify-center p-4 rounded-2xl bg-primary text-on-primary hover:bg-primary-container shadow-md transition-all text-center group">
                    <span class="material-symbols-outlined text-[28px] mb-1 group-hover:scale-110 transition-transform">person_add</span>
                    <span class="font-headline text-sm font-bold">Daftar Anggota</span>
                    <span class="text-[10px] text-on-primary/80 font-normal">Registrasi Form Baru</span>
                </a>
                <a href="{{ route('keanggotaan.status') }}" class="flex flex-col items-center justify-center p-4 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-600 text-white hover:from-emerald-500 hover:to-teal-500 shadow-md transition-all text-center group border border-emerald-500/20">
                    <span class="material-symbols-outlined text-[28px] mb-1 text-white group-hover:rotate-180 transition-transform duration-500">autorenew</span>
                    <span class="font-headline text-sm font-bold text-white">Perpanjangan</span>
                    <span class="text-[10px] text-emerald-100 font-normal">Masa Berlaku KTA</span>
                </a>
            </div>

            <!-- Livewire Component: Monitoring KTA -->
            @livewire('kta-monitoring')
        </div>

        <!-- Kolom Kanan: FAQ Accordion dengan Alpine.js (Span 7) -->
        <div class="lg:col-span-7 flex flex-col gap-4" x-data="{ activeFaq: null }">
            <div class="flex flex-col gap-1">
                <div class="flex items-center gap-2 text-tertiary text-xs font-semibold uppercase tracking-wider">
                    <span class="w-2.5 h-0.5 bg-tertiary rounded-full"></span>
                    <span>Bantuan & Tanya Jawab</span>
                </div>
                <h2 class="font-headline text-2xl lg:text-3xl text-on-surface font-bold">
                    Pertanyaan yang Sering Diajukan (FAQ)
                </h2>
                <p class="text-sm text-on-surface-variant">
                    Pahami hak, kewajiban, serta mekanisme tata kelola perkumpulan analis kebijakan.
                </p>
            </div>

            @php
            $faqs = [
                [
                    'id' => 1,
                    'q' => 'Apakah keanggotaan INAKI hanya untuk Jabatan Fungsional Analis Kebijakan?',
                    'a' => 'Tidak. Sesuai Anggaran Dasar dan Anggaran Rumah Tangga (AD/ART) INAKI, keanggotaan bersifat inklusif. Selain Analis Kebijakan (JFAK) aktif, INAKI membuka pintu keanggotaan bagi ASN di luar jabatan fungsional, akademisi, peneliti independen, serta praktisi kebijakan publik di sektor non-pemerintah.'
                ],
                [
                    'id' => 2,
                    'q' => 'Apa persyaratan untuk menjadi Anggota INAKI?',
                    'a' => 'Syarat utama mencakup pengisian formulir pendaftaran daring di portal resmi, melampirkan SK Pengangkatan JFAK (bagi analis ASN) atau surat keterangan institusi/bukti portofolio kebijakan (bagi non-ASN), serta kesediaan mematuhi Pedoman Kode Etik dan Kode Perilaku Analis Kebijakan Indonesia.'
                ],
                [
                    'id' => 3,
                    'q' => 'Iuran keanggotaan digunakan untuk apa saja?',
                    'a' => 'Seluruh iuran dikelola secara transparan dan diaudit berkala untuk membiayai operasional advokasi regulasi, pemeliharaan sistem repositori jurnal/e-library, penyelenggaraan bedah policy brief mingguan tanpa biaya tambahan bagi anggota, serta penguatan komisariat daerah.'
                ],
                [
                    'id' => 4,
                    'q' => 'Apakah benefit bergabung menjadi anggota INAKI?',
                    'a' => 'Anggota memperoleh Kartu Tanda Anggota (KTA) resmi ber-NRA nasional, akses gratis/prioritas ke forum pelatihan bernilai SKP, pendampingan uji kompetensi dan kenaikan jenjang JFAK, akses penuh repositori digital naskah kebijakan, dan jejaring pertukaran data antar-Kementerian/Lembaga/Pemda.'
                ],
                [
                    'id' => 5,
                    'q' => 'Apa kegunaan dari nomor anggota (NRA) & KTA Digital?',
                    'a' => 'Nomor Registrasi Anggota (NRA) merupakan identitas validitas profesi yang diakui dalam instrumen verifikasi portofolio analis kebijakan, integrasi portal uji kompetensi LAN RI, serta verifikasi delegasi resmi konferensi kebijakan internasional.'
                ]
            ];
            @endphp

            <div class="flex flex-col gap-2">
                @foreach($faqs as $faq)
                <div class="rounded-2xl bg-surface-container-lowest p-4 shadow-sm transition-all">
                    <button type="button"
                            @click="activeFaq = (activeFaq === {{ $faq['id'] }} ? null : {{ $faq['id'] }})"
                            :aria-expanded="activeFaq === {{ $faq['id'] }} ? 'true' : 'false'"
                            aria-controls="faq-answer-{{ $faq['id'] }}"
                            class="w-full flex items-center justify-between text-left gap-4 cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary/20 rounded-lg p-1">
                        <span class="font-headline text-base text-on-surface font-semibold">
                            {{ $faq['q'] }}
                        </span>
                        <span class="material-symbols-outlined text-[22px] text-primary shrink-0 transition-transform duration-300"
                              :class="activeFaq === {{ $faq['id'] }} ? 'rotate-180' : ''"
                              aria-hidden="true">
                            expand_more
                        </span>
                    </button>
                    <div id="faq-answer-{{ $faq['id'] }}"
                         role="region"
                         x-show="activeFaq === {{ $faq['id'] }}" 
                         x-collapse
                         class="pt-3 text-sm text-on-surface-variant leading-relaxed">
                        {{ $faq['a'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
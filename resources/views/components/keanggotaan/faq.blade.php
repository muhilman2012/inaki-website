<section class="w-full px-4 sm:px-6 lg:px-12 py-10" x-data="{ activeIndex: null }">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-8">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#EFF6FF] text-[#2563EB] border border-[#DBEAFE] text-xs font-semibold mb-2.5">
                <span class="material-symbols-outlined text-[14px]">help</span>
                <span>Panduan Pertanyaan Umum</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold font-display text-[#0F172A] tracking-tight">Frequently Asked Questions (FAQ)</h2>
            <p class="text-sm sm:text-base text-[#64748B] mt-2">Pertanyaan yang sering diajukan seputar keanggotaan, iuran, dan legalitas INAKI.</p>
        </div>

        <!-- FAQ Items -->
        <div class="max-w-4xl mx-auto flex flex-col gap-3">
            @php
                $faqs = [
                    [
                        'q' => '1. Apakah keanggotaan INAKI hanya untuk Jabatan Fungsional Analis Kebijakan?',
                        'a' => 'INAKI terbuka bagi seluruh pemangku kepentingan kebijakan publik! Meskipun dibentuk sebagai wadah organisasi profesi utama bagi pejabat fungsional Analis Kebijakan (JFAK) berdasarkan mandat PermenPAN-RB No. 1/2023 dan Peraturan LAN No. 14/2020, keanggotaan INAKI juga terbuka untuk ASN non-JFAK, akademisi kampus, peneliti lembaga riset, serta praktisi independen di bidang formulasi dan evaluasi kebijakan.'
                    ],
                    [
                        'q' => '2. Apa persyaratan untuk menjadi Anggota INAKI?',
                        'a' => 'Mengisi formulir online, mengunggah bukti SK Jabatan Fungsional (bagi JFAK) atau surat tugas/identitas profesi (bagi Non-JFAK), pas foto resmi, serta menyetujui Kode Etik dan Kode Perilaku Analis Kebijakan Indonesia.'
                    ],
                    [
                        'q' => '3. Iuran keanggotaan digunakan untuk apa?',
                        'a' => 'Iuran anggota dialokasikan secara transparan untuk penyelenggaraan pelatihan dan peningkatan kompetensi berkelanjutan, penerbitan Policy Brief dan jurnal ilmiah, penyediaan advokasi hukum dan etika profesi, serta operasional kesekretariatan dan pemeliharaan portal digital.'
                    ],
                    [
                        'q' => '4. Apakah benefit bergabung menjadi anggota INAKI?',
                        'a' => 'Akses penuh ke repositori artikel dan jurnal, kesempatan mengikuti bimtek/diklat bersertifikat resmi LAN RI, jejaring komunitas ribuan analis kebijakan se-Indonesia, hak suara dalam musyawarah organisasi, serta Kartu Tanda Anggota (KTA) digital resmi dengan QR verifikasi.'
                    ],
                    [
                        'q' => '5. Apa kegunaan dari nomor anggota INAKI?',
                        'a' => 'Nomor Registrasi Anggota (NRA/KTA) berfungsi sebagai bukti identitas profesi resmi, verifikasi kepesertaan pada forum ilmiah dan pelatihan nasional, validasi angka kredit pengembangan profesi, dan otentikasi dalam portal layanan terpadu.'
                    ],
                    [
                        'q' => '6. Apa yang dimaksud dengan Komisariat dan Cabang INAKI?',
                        'a' => 'Komisariat merupakan perwakilan organisasi tingkat Kementerian/Lembaga (seperti Komite LAN RI dan Komite BPOM), sedangkan Pengurus Cabang mengoordinasikan anggota di tingkat provinsi, kabupaten, dan kota di seluruh Indonesia.'
                    ],
                    [
                        'q' => '7. Bagaimana cara membentuk Komisariat dan Cabang INAKI?',
                        'a' => 'Sekurang-kurangnya 10 orang anggota aktif di suatu instansi atau daerah dapat mengajukan usulan mandat inisiator kepada Pengurus Pusat INAKI melalui sekretariat@inaki.or.id untuk kemudian diterbitkan Surat Keputusan Mandat Pembentukan Resmi.'
                    ],
                ];
            @endphp

            @foreach($faqs as $index => $faq)
                <div class="rounded-2xl bg-white border border-[#E2E8F0] shadow-sm overflow-hidden transition-all">
                    <button @click="activeIndex = (activeIndex === {{ $index }} ? null : {{ $index }})" 
                            type="button" 
                            class="w-full p-5 text-left flex items-center justify-between gap-4 transition-colors hover:bg-[#F8FAFC]">
                        <span class="text-sm sm:text-base font-semibold text-[#0F172A]">{{ $faq['q'] }}</span>
                        <span class="material-symbols-outlined text-[#94A3B8] text-[22px] transition-transform duration-300" 
                              :class="activeIndex === {{ $index }} ? 'rotate-180 text-[#2563EB]' : ''">
                            keyboard_arrow_down
                        </span>
                    </button>
                    <div x-show="activeIndex === {{ $index }}" 
                         x-cloak 
                         x-collapse 
                         class="px-5 pb-5 pt-1 text-[#475569] text-xs sm:text-sm leading-relaxed border-t border-[#F1F5F9]">
                        <p>{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

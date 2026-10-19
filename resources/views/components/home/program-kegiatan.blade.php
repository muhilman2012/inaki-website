@php
$programs = [
    [
        'badge' => 'Rutin Mingguan',
        'badge_color' => 'bg-primary/10 text-primary',
        'icon' => 'article',
        'title' => 'Bedah Policy Brief',
        'desc' => 'Dilakukan 1-2 kali seminggu secara rutin sejak tahun 2025. Mengupas naskah kebijakan terbitan anggota dan merumuskan saran perbaikan secara peer-review.',
        'status' => 'Aktif Berjalan',
        'status_color' => 'text-tertiary',
        'cta' => 'Info Sesi'
    ],
    [
        'badge' => 'Forum Bulanan',
        'badge_color' => 'bg-tertiary/10 text-tertiary',
        'icon' => 'forum',
        'title' => 'INAKI Policy Discussion',
        'desc' => 'Forum bulanan terkemuka yang menghadirkan pakar nasional dengan antusiasme hingga 1.000 peserta via Zoom Webinar dan YouTube Live streaming.',
        'status' => 'Kapasitas: 1.000 Peserta',
        'status_color' => 'text-on-surface-variant font-mono text-xs',
        'cta' => 'Rekaman'
    ],
    [
        'badge' => 'Akademik Terapan',
        'badge_color' => 'bg-secondary-container text-on-secondary-container',
        'icon' => 'school',
        'title' => 'Kuliah Umum Kebijakan Publik',
        'desc' => 'Memperluas wawasan konseptual dan kompetensi praktis anggota dengan narasumber guru besar, menteri, dan pimpinan lembaga negara.',
        'status' => 'Sertifikat SKP LAN',
        'status_color' => 'text-on-surface-variant',
        'cta' => 'Silabus'
    ],
    [
        'badge' => 'Konferensi Tahunan',
        'badge_color' => 'bg-primary/10 text-primary',
        'icon' => 'campaign',
        'title' => 'Seminar Nasional Analisis Kebijakan',
        'desc' => 'Kolaborasi akbar lintas kementerian, lembaga non-kementerian, dan konsorsium universitas dalam mendiskusikan agenda prioritas RPJMN.',
        'status' => 'Call for Papers 2026',
        'status_color' => 'text-on-surface-variant',
        'cta' => 'Detail Call'
    ],
    [
        'badge' => 'SKALA x INAKI',
        'badge_color' => 'bg-tertiary/10 text-tertiary',
        'icon' => 'travel_explore',
        'title' => 'Pelatihan Layanan Dasar Papua',
        'desc' => 'Program kemitraan strategis bersama SKALA untuk penguatan formulasi kebijakan layanan dasar pendidikan dan kesehatan di wilayah Papua & Papua Barat.',
        'status' => 'Fokus Otonomi Khusus',
        'status_color' => 'text-on-surface-variant',
        'cta' => 'Laporan'
    ],
    [
        'badge' => 'LAN RI & Kemendagri',
        'badge_color' => 'bg-primary/10 text-primary',
        'icon' => 'edit_document',
        'title' => 'Penyusunan Policy Brief Standar',
        'desc' => 'Bimbingan teknis intensif penyusunan ringkasan kebijakan ringkas, terukur, dan persuasif yang diakui dalam penilaian DUPAK/SKP Analis Kebijakan.',
        'status' => 'Sertifikasi Resmi',
        'status_color' => 'text-on-surface-variant',
        'cta' => 'Daftar Batch'
    ]
];
@endphp

<section class="max-w-7xl mx-auto px-8 py-10 w-full">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
        <div class="flex flex-col gap-1">
            <div class="flex items-center gap-2 text-primary text-xs font-semibold uppercase tracking-wider">
                <span class="w-2.5 h-0.5 bg-primary rounded-full"></span>
                <span>Program & Kapasitas</span>
            </div>
            <h2 class="font-headline text-2xl lg:text-3xl text-on-surface font-bold">
                Program Kegiatan & Pengembangan Kompetensi
            </h2>
            <p class="text-sm text-on-surface-variant max-w-2xl">
                Fokus pada akselerasi kapabilitas analitis anggota melalui forum mingguan, kemitraan strategis lembaga pemerintah, serta workshop advokasi kebijakan lintas sektor.
            </p>
        </div>
        <div class="shrink-0">
            <a href="{{ url('/kegiatan') }}" class="px-4 py-2 rounded-xl bg-surface-container-lowest text-primary font-headline text-sm font-semibold shadow-sm hover:bg-surface-container transition-all flex items-center gap-1">
                <span>Lihat Seluruh Kalender Kegiatan</span>
                <span class="material-symbols-outlined text-[18px]">calendar_month</span>
            </a>
        </div>
    </div>

    <!-- Filter Pills -->
    <div class="flex flex-wrap items-center gap-2 mb-6">
        <button type="button" class="px-4 py-1.5 rounded-full bg-primary text-on-primary text-xs font-semibold shadow-sm">Semua Agenda (7)</button>
        <button type="button" class="px-4 py-1.5 rounded-full bg-surface-container-low text-slate-700 hover:bg-surface-container text-xs font-semibold transition-all">Rutin Mingguan</button>
        <button type="button" class="px-4 py-1.5 rounded-full bg-surface-container-low text-slate-700 hover:bg-surface-container text-xs font-semibold transition-all">Kemitraan Strategis</button>
        <button type="button" class="px-4 py-1.5 rounded-full bg-surface-container-low text-slate-700 hover:bg-surface-container text-xs font-semibold transition-all">Pelatihan Khusus</button>
    </div>

    <!-- 6 Strategic Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($programs as $item)
        <div class="group rounded-2xl bg-surface-container-lowest p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <span class="px-2.5 py-1 rounded-full {{ $item['badge_color'] }} text-[10px] font-bold">
                        {{ $item['badge'] }}
                    </span>
                    <div class="w-8 h-8 rounded-lg bg-surface-container-low group-hover:bg-primary group-hover:text-on-primary transition-colors flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[18px]">{{ $item['icon'] }}</span>
                    </div>
                </div>
                <h3 class="font-headline text-lg font-bold text-on-surface group-hover:text-primary transition-colors">
                    {{ $item['title'] }}
                </h3>
                <p class="text-sm text-on-surface-variant leading-relaxed">
                    {{ $item['desc'] }}
                </p>
            </div>
            <div class="pt-4 mt-2 flex items-center justify-between text-xs">
                <span class="{{ $item['status_color'] }} font-semibold flex items-center gap-1">
                    @if(str_contains($item['status'], 'Aktif'))
                        <span class="w-2 h-2 rounded-full bg-tertiary"></span>
                    @endif
                    {{ $item['status'] }}
                </span>
                <a href="#" class="text-primary font-semibold flex items-center gap-0.5 group-hover:translate-x-1 transition-transform">
                    {{ $item['cta'] }} <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                </a>
            </div>
        </div>
        @endforeach

        <!-- 7th Special Highlight Card (BNPT) -->
        <div class="md:col-span-2 lg:col-span-3 rounded-2xl bg-gradient-to-r from-surface-container-low via-surface-container to-surface-container-low p-6 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-surface-container-lowest text-primary flex items-center justify-center shrink-0 shadow-sm">
                    <span class="material-symbols-outlined text-[26px]">shield</span>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-xs font-bold text-primary">Kemitraan Khusus BNPT RI</span>
                        <span class="px-2 py-0.5 rounded bg-tertiary/10 text-tertiary text-[10px] font-semibold">Nasional</span>
                    </div>
                    <h4 class="font-headline text-lg font-bold text-on-surface">Advokasi Deradikalisasi & Ketahanan Sosial</h4>
                    <p class="text-xs text-on-surface-variant max-w-3xl">
                        Kerjasama strategis bersama Badan Nasional Penanggulangan Terorisme (BNPT) dalam penyusunan kajian analitis pencegahan ekstremisme berbasis komunitas di lingkungan birokrasi dan daerah.
                    </p>
                </div>
            </div>
            <a href="#" class="px-4 py-2 rounded-xl bg-surface-container-lowest text-primary hover:bg-surface-container-high text-xs font-bold whitespace-nowrap shadow-sm transition-all flex items-center gap-1.5">
                <span>Kajian Strategis BNPT</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
        </div>
    </div>
</section>
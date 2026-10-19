<section class="max-w-7xl mx-auto px-8 py-10 w-full">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-2">
        <div class="flex flex-col gap-1">
            <div class="flex items-center gap-2 text-primary text-xs font-semibold uppercase tracking-wider">
                <span class="w-2.5 h-0.5 bg-primary rounded-full"></span>
                <span>Tentang INAKI</span>
            </div>
            <h2 class="font-headline text-2xl lg:text-3xl text-on-surface font-bold">
                Mandat Profesi, Statistik & Identitas Kebangsaan
            </h2>
        </div>
        <span class="text-sm text-on-surface-variant max-w-md">
            Membangun korps analis kebijakan berintegritas tinggi dengan standar analitis presisi untuk kemajuan tata kelola nasional.
        </span>
    </div>

    <!-- Bento Grid Structure -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <!-- Card A: Sejarah & Visi Misi (Span 7) -->
        <div class="md:col-span-7 rounded-2xl bg-surface-container-lowest p-6 lg:p-8 shadow-sm flex flex-col justify-between">
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[20px]">history_edu</span>
                        </div>
                        <span class="font-headline text-lg font-bold text-on-surface">Sejarah, Visi, & Misi</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-full bg-surface-container-high text-primary text-[10px] font-bold">Akta Notaris 2025</span>
                </div>
                <p class="text-sm text-on-surface-variant leading-relaxed">
                    Perkumpulan Ikatan Nasional Analis Kebijakan (INAKI) didirikan berdasarkan Akta Notaris Taufik SH Nomor 06 tanggal 13 Februari 2025 dan disahkan oleh Kementerian Hukum pada 11 Juni 2025. INAKI menjadi wadah tunggal organisasi profesi Jabatan Fungsional Analis Kebijakan yang dibentuk berdasarkan mandat dari regulasi KemenPANRB dan LAN RI. Keanggotaan INAKI bersifat terbuka bagi Aparatur Sipil Negara non-jabatan fungsional analis kebijakan, akademisi, dan praktisi kebijakan publik.
                </p>
                <div class="p-4 rounded-xl bg-surface-container-low relative overflow-hidden">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>
                    <p class="text-sm text-on-surface leading-relaxed pl-2">
                        <strong class="font-headline text-xs text-primary uppercase tracking-wide block mb-1">VISI INAKI:</strong>
                        Menjadi organisasi profesi yang terdepan dalam mendukung kebijakan publik berbasis bukti, yang responsif, inovatif, serta berkelanjutan untuk tercapainya pembangunan yang inklusif dan berkeadilan.
                    </p>
                </div>
            </div>
            <div class="pt-4 mt-2">
                <a href="{{ url('/tentang-kami') }}" class="px-4 py-2.5 rounded-xl bg-primary text-on-primary font-headline text-sm font-semibold hover:bg-primary-container transition-all inline-flex items-center gap-2">
                    <span>Baca Profil Lengkap & Struktur Organisasi</span>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                </a>
            </div>
        </div>

        <!-- Card B: Real-Time Membership Telemetry (Span 5) -->
        <div class="md:col-span-5 rounded-2xl bg-gradient-to-br from-primary to-primary-container text-on-primary p-6 lg:p-8 shadow-md flex flex-col justify-between relative overflow-hidden">
            <svg class="absolute -right-12 -bottom-12 w-64 h-64 text-white/5 pointer-events-none" fill="none" viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-dasharray="12 12" stroke-width="8"></circle>
                <circle cx="100" cy="100" r="60" stroke="currentColor" stroke-width="4"></circle>
                <circle cx="100" cy="100" r="30" stroke="currentColor" stroke-width="2"></circle>
            </svg>
            <div class="flex flex-col gap-2 relative z-10">
                <div class="flex items-center justify-between">
                    <span class="font-headline text-xs text-on-primary/80 uppercase tracking-wider">Statistik Keanggotaan</span>
                    <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white/15 backdrop-blur-md text-white text-[10px]">
                        <span class="w-2 h-2 rounded-full bg-tertiary-fixed animate-pulse"></span>
                        <span>Update Real-time</span>
                    </div>
                </div>
                <div class="mt-2 flex flex-col">
                    <div class="flex items-baseline gap-2">
                        <span class="font-headline text-4xl lg:text-5xl font-extrabold text-white tracking-tight">2,670</span>
                        <span class="text-xs text-white/80">Anggota Terdaftar</span>
                    </div>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="px-2 py-0.5 rounded-full bg-white/20 text-tertiary-fixed text-[10px] font-bold flex items-center gap-0.5">
                            <span class="material-symbols-outlined text-[14px]">trending_up</span>
                            +14.2%
                        </span>
                        <span class="text-xs text-white/75">pertumbuhan kuartal ini</span>
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-2 bg-white/10 p-4 rounded-xl backdrop-blur-sm text-xs">
                    <div class="flex items-center justify-between text-white">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-md bg-white"></span>
                            <span>JFAK (Jabatan Fungsional)</span>
                        </div>
                        <span class="font-bold">2,595 (97.2%)</span>
                    </div>
                    <div class="w-full bg-black/20 h-2 rounded-full overflow-hidden">
                        <div class="bg-white h-full rounded-full" style="width: 97.2%"></div>
                    </div>
                    <div class="flex items-center justify-between text-white pt-1">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-md bg-tertiary-fixed"></span>
                            <span>Non-JFAK (Akademisi / Praktisi)</span>
                        </div>
                        <span class="font-bold text-tertiary-fixed">75 (2.8%)</span>
                    </div>
                    <div class="w-full bg-black/20 h-2 rounded-full overflow-hidden">
                        <div class="bg-tertiary-fixed h-full rounded-full" style="width: 2.8%"></div>
                    </div>
                </div>
            </div>
            <div class="pt-4 mt-2 relative z-10">
                <a href="{{ url('/tentang-kami#statistik') }}" class="w-full py-2.5 rounded-xl bg-surface-container-lowest text-primary font-headline text-sm font-semibold hover:bg-surface-container-high transition-all flex items-center justify-center gap-2 shadow-sm">
                    <span>Lihat Detail Statistik</span>
                    <span class="material-symbols-outlined text-[16px]">bar_chart</span>
                </a>
            </div>
        </div>

        <!-- Card C: Logo Philosophy (Span 6) -->
        <div class="md:col-span-6 rounded-2xl bg-surface-container-lowest p-6 shadow-sm flex flex-col sm:flex-row gap-4 items-center">
            <div class="w-24 h-24 rounded-2xl bg-surface-container-low flex flex-col items-center justify-center p-2 shrink-0">
                <img src="{{ asset('images/lambang-filosofi.png') }}" alt="Lambang Resmi INAKI" class="w-20 h-20 object-contain"
                     onerror="this.src='https://lh3.googleusercontent.com/aida-public/AB6AXuCysPbjfbziWPSP1Xi_XPl2MW-ceTSihbIsG4KBCTrxP5JkpFFi2Xua0vCvQC3eJ53Uh54xuQ5tya9_IfVH1yBBH1UprjBw5T3uQuxeUjiYgmf2cqWxFciDTBlNXtXp9B48fUJybWhTeADFsQ7gSEAT14odv1e9jUlpu13CROaXbGJaSKE4ZLkgtJPAGXiOMvV_XZjZsaZKRQWuJ6KnNwREW-DkJG7bbsAt6JKFUmLNmCSODWhmf-bf90lHGBpgu4RqvDg'">
            </div>
            <div class="flex flex-col gap-1 text-center sm:text-left">
                <span class="font-headline text-lg font-bold text-on-surface">Logo & Filosofi Lambang</span>
                <p class="text-sm text-on-surface-variant leading-relaxed">
                    Logogram siluet dua insan yang saling bergandengan tangan, mencerminkan harmoni, sinergi lintas institusi, dan kolaborasi strategis dalam perumusan kebijakan publik berbasis bukti.
                </p>
                <a class="text-xs font-semibold text-primary hover:underline inline-flex items-center gap-1 mt-1 justify-center sm:justify-start" href="{{ url('/tentang-kami#filosofi-logo') }}">
                    <span>Makna & Filosofi Warna Resmi</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Card D: Mars INAKI Audio Player (Span 6 with Alpine.js) -->
        <!-- Card D: Mars INAKI Audio Player (Live Karaoke & Real Audio) -->
        <div x-data="{
                isPlaying: false,
                audio: null,
                currentTime: 0,
                duration: 81,
                currentLyric: '♫ Putar untuk mendengarkan Mars INAKI',
                lines: [
                    { start: 6.0,  end: 10.0, text: 'INAKI bersatu, berpadu cita mulia' },
                    { start: 10.0, end: 14.0, text: 'Terukir analis kebijakan' },
                    { start: 14.0, end: 17.5, text: 'Menjembatani nurani bangsa' },
                    { start: 17.5, end: 21.0, text: 'Indonesia yang sejahtera' },
                    { start: 21.0, end: 25.0, text: 'Mendesain strategi, pembangunan merata' },
                    { start: 25.0, end: 29.0, text: 'Dari hulu sampai ke hilir' },
                    { start: 29.0, end: 33.0, text: 'Menyaring data, mengolah fakta' },
                    { start: 33.0, end: 37.0, text: 'Kebijakan berkualitas' },
                    { start: 37.0, end: 45.0, text: 'INAKI punggawa berpikir bagi ibu pertiwi' },
                    { start: 45.0, end: 53.0, text: 'Analis kebijakan profesional, berani, jujur dan berintegritas' },
                    { start: 53.0, end: 60.0, text: 'INAKI demi kebijakan tingkatkan peran fungsional' },
                    { start: 60.0, end: 67.5, text: 'Tak lekang oleh waktu jayalah analis kebijakan' },
                    { start: 67.5, end: 71.0, text: 'Bangkitkan martabat bangsa' },
                    { start: 71.0, end: 78.0, text: 'INAKI untuk Indonesia itu pasti!' }
                ],
                initPlayer() {
                    if (!this.audio) {
                        this.audio = new Audio();
                        this.audio.preload = 'auto';

                        fetch('{{ asset('audio/mars-inaki.mp3') }}')
                            .then(res => res.blob())
                            .then(blob => {
                                const blobUrl = URL.createObjectURL(blob);
                                const prev = this.currentTime || 0;
                                const wasPlaying = this.isPlaying;
                                this.audio.src = blobUrl;
                                if (prev > 0) { try { this.audio.currentTime = prev; } catch(e) {} }
                                if (wasPlaying) this.audio.play().catch(e => {});
                            })
                            .catch(() => {
                                this.audio.src = '{{ asset('audio/mars-inaki.mp3') }}';
                            });

                        this.audio.src = '{{ asset('audio/mars-inaki.mp3') }}';

                        this.audio.addEventListener('loadedmetadata', () => {
                            this.duration = this.audio.duration || 81;
                        });
                        this.audio.addEventListener('timeupdate', () => {
                            this.currentTime = this.audio.currentTime;
                            const t = this.currentTime;
                            const found = this.lines.find(l => t >= l.start && t < l.end);
                            if (found) {
                                this.currentLyric = found.text;
                            } else if (t < 6.0) {
                                this.currentLyric = '♫ Intro Fanfare Mars INAKI ♫';
                            } else if (t >= 78.0) {
                                this.currentLyric = '♫ Outro Musik Penutup ♫';
                            }
                        });
                        this.audio.addEventListener('ended', () => {
                            this.isPlaying = false;
                            this.currentTime = 0;
                            this.currentLyric = 'Selesai — Klik untuk putar ulang.';
                        });
                    }
                },
                toggle() {
                    this.initPlayer();
                    if (this.isPlaying) {
                        this.audio.pause();
                        this.isPlaying = false;
                    } else {
                        this.audio.play().then(() => {
                            this.isPlaying = true;
                        }).catch(e => console.log(e));
                    }
                },
                seek(e) {
                    this.initPlayer();
                    const rect = e.currentTarget.getBoundingClientRect();
                    const pos = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
                    const targetTime = pos * (this.duration || 81);
                    this.currentTime = targetTime;
                    const applyTime = () => {
                        try { this.audio.currentTime = targetTime; } catch(e) {}
                    };
                    if (this.audio.paused) {
                        this.audio.play().then(() => {
                            this.isPlaying = true;
                            applyTime();
                        }).catch(() => { applyTime(); });
                    } else {
                        applyTime();
                    }
                },
                format(sec) {
                    if (!sec || isNaN(sec)) return '00:00';
                    const m = Math.floor(sec / 60);
                    const s = Math.floor(sec % 60);
                    return (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s;
                }
             }" 
             class="md:col-span-6 rounded-2xl bg-surface-container-lowest p-6 shadow-sm flex flex-col justify-between gap-4 border border-slate-100">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[22px]">music_note</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-headline text-lg font-bold text-slate-900 leading-tight">Mars INAKI</span>
                        <span class="text-xs text-slate-500">Lagu Kebanggaan & Panggilan Pengabdian Profesi</span>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-600 text-[10px] font-bold font-mono">Audio 01:21</span>
            </div>

            <!-- Live Lyric Ticker Strip -->
            <div class="w-full bg-slate-50 border border-slate-200/80 rounded-xl px-3.5 py-2 flex items-center gap-2.5 overflow-hidden">
                <span class="w-2 h-2 rounded-full shrink-0" :class="isPlaying ? 'bg-emerald-500 animate-ping' : 'bg-slate-300'"></span>
                <p class="text-xs font-semibold truncate transition-colors duration-200" 
                   :class="isPlaying ? 'text-blue-700' : 'text-slate-500'" 
                   x-text="currentLyric">
                    ♫ Putar untuk mendengarkan Mars INAKI
                </p>
            </div>
            
            <!-- Real Playback Bar & Controls -->
            <div class="w-full bg-slate-100 p-2.5 rounded-xl flex items-center gap-3">
                <button @click="toggle()" 
                        type="button" 
                        :aria-label="isPlaying ? 'Jeda Audio Mars INAKI' : 'Putar Audio Mars INAKI'"
                        class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center shrink-0 shadow-sm active:scale-95 transition-transform" 
                        :title="isPlaying ? 'Jeda' : 'Putar'">
                    <span class="material-symbols-outlined text-[22px]" x-text="isPlaying ? 'pause' : 'play_arrow'" aria-hidden="true">play_arrow</span>
                </button>
                <div class="flex-1 flex flex-col gap-1">
                    <div class="flex items-center justify-between text-[11px] font-mono text-slate-700 font-medium">
                        <span class="font-bold text-blue-700" x-text="format(currentTime)">00:00</span>
                        <span x-text="format(duration)" class="text-slate-700 font-semibold">01:21</span>
                    </div>
                    <!-- Seek bar -->
                    <div @click="seek($event)" class="w-full h-2 bg-slate-200 hover:bg-slate-300 rounded-full cursor-pointer relative overflow-hidden transition-colors" role="progressbar" aria-label="Audio progress bar" :aria-valuenow="Math.round(currentTime)" aria-valuemin="0" :aria-valuemax="Math.round(duration)">
                        <div class="h-full bg-blue-600 rounded-full transition-all duration-100" :style="`width: ${duration ? (currentTime / duration * 100) : 0}%`"></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 text-xs">
                <span class="text-slate-600 font-medium">Harmoni Korps Analis Kebijakan Indonesia</span>
                <a class="text-blue-700 font-semibold hover:underline flex items-center gap-1 shrink-0" href="{{ url('/tentang-kami#mars-inaki') }}">
                    <span>Lirik Lengkap Karaoke</span>
                    <span class="material-symbols-outlined text-[15px]" aria-hidden="true">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</section>
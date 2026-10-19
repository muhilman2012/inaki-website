<section class="w-full py-12 lg:py-16 scroll-mt-[225px] bg-slate-50 border-y border-slate-200" id="mars-inaki"
         x-data="{
            audio: null,
            isPlaying: false,
            currentTime: 0,
            duration: 81,
            volume: 0.85,
            isMuted: false,
            activeCard: -1,
            activeLineIndex: -1,
            currentLyricText: 'Klik tombol putar untuk mendengarkan Mars INAKI',
            blobReady: false,

            lines: [
                { id: 0, card: 0, start: 6.0,  end: 10.0, text: 'INAKI bersatu, berpadu cita mulia' },
                { id: 1, card: 0, start: 10.0, end: 14.0, text: 'Terukir analis kebijakan' },
                { id: 2, card: 0, start: 14.0, end: 17.5, text: 'Menjembatani nurani bangsa' },
                { id: 3, card: 0, start: 17.5, end: 21.0, text: 'Indonesia yang sejahtera' },

                { id: 4, card: 1, start: 21.0, end: 25.0, text: 'Mendesain strategi, pembangunan merata' },
                { id: 5, card: 1, start: 25.0, end: 29.0, text: 'Dari hulu sampai ke hilir' },
                { id: 6, card: 1, start: 29.0, end: 33.0, text: 'Menyaring data, mengolah fakta' },
                { id: 7, card: 1, start: 33.0, end: 37.0, text: 'Kebijakan berkualitas' },

                { id: 8,  card: 2, start: 37.0, end: 45.0, text: 'INAKI punggawa berpikir bagi ibu pertiwi' },
                { id: 9,  card: 2, start: 45.0, end: 53.0, text: 'Analis kebijakan profesional, berani, jujur dan berintegritas' },
                { id: 10, card: 2, start: 53.0, end: 60.0, text: 'INAKI demi kebijakan tingkatkan peran fungsional' },
                { id: 11, card: 2, start: 60.0, end: 67.5, text: 'Tak lekang oleh waktu jayalah analis kebijakan' },
                { id: 12, card: 2, start: 67.5, end: 71.0, text: 'Bangkitkan martabat bangsa' },

                { id: 13, card: 3, start: 71.0, end: 78.0, text: 'INAKI untuk Indonesia itu pasti!' }
            ],

            init() {
                this.audio = new Audio();
                this.audio.preload = 'auto';
                this.audio.volume = this.volume;

                // Load audio via blob for flawless client-side seek without server byte-range limits
                fetch('{{ asset('audio/mars-inaki.mp3') }}')
                    .then(res => res.blob())
                    .then(blob => {
                        const blobUrl = URL.createObjectURL(blob);
                        const prevTime = this.currentTime || 0;
                        const wasPlaying = this.isPlaying;
                        this.audio.src = blobUrl;
                        this.blobReady = true;
                        if (prevTime > 0) {
                            try { this.audio.currentTime = prevTime; } catch(e) {}
                        }
                        if (wasPlaying) {
                            this.audio.play().catch(e => {});
                        }
                    })
                    .catch(() => {
                        this.audio.src = '{{ asset('audio/mars-inaki.mp3') }}';
                    });

                // Immediate fallback src
                this.audio.src = '{{ asset('audio/mars-inaki.mp3') }}';

                this.audio.addEventListener('loadedmetadata', () => {
                    this.duration = this.audio.duration || 81;
                });

                this.audio.addEventListener('timeupdate', () => {
                    this.currentTime = this.audio.currentTime;
                    this.updateLyrics();
                });

                this.audio.addEventListener('ended', () => {
                    this.isPlaying = false;
                    this.currentTime = 0;
                    this.activeCard = -1;
                    this.activeLineIndex = -1;
                    this.currentLyricText = 'Selesai — Klik tombol putar untuk mendengarkan kembali.';
                });
            },

            togglePlay() {
                if (!this.audio) this.init();
                if (this.isPlaying) {
                    this.audio.pause();
                    this.isPlaying = false;
                } else {
                    this.audio.play().then(() => {
                        this.isPlaying = true;
                    }).catch(e => console.log('Playback prevented:', e));
                }
            },

            seekTo(time) {
                if (!this.audio) this.init();
                this.currentTime = time;
                this.updateLyrics();

                const applyTime = () => {
                    try {
                        this.audio.currentTime = time;
                    } catch(e) {}
                };

                if (this.audio.paused) {
                    this.audio.play().then(() => {
                        this.isPlaying = true;
                        applyTime();
                    }).catch(() => {
                        applyTime();
                    });
                } else {
                    applyTime();
                }
            },

            seekProgress(e) {
                if (!this.audio) this.init();
                const rect = e.currentTarget.getBoundingClientRect();
                const pos = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
                const targetTime = pos * (this.duration || 81);
                this.seekTo(targetTime);
            },

            setVolume(val) {
                this.volume = val;
                if (this.audio) {
                    this.audio.volume = val;
                    this.audio.muted = (val == 0);
                }
                this.isMuted = (val == 0);
            },

            toggleMute() {
                if (!this.audio) return;
                this.isMuted = !this.isMuted;
                this.audio.muted = this.isMuted;
            },

            updateLyrics() {
                const t = this.currentTime;
                
                // Identify active card
                if (t >= 6.0 && t < 21.0) {
                    this.activeCard = 0; // BAIT 1
                } else if (t >= 21.0 && t < 37.0) {
                    this.activeCard = 1; // BAIT 2
                } else if (t >= 37.0 && t < 71.0) {
                    this.activeCard = 2; // REFFRAIN
                } else if (t >= 71.0 && t < 78.0) {
                    this.activeCard = 3; // PENUTUP
                } else {
                    this.activeCard = -1;
                }

                // Identify active line
                const line = this.lines.find(l => t >= l.start && t < l.end);
                if (line) {
                    this.activeLineIndex = line.id;
                    this.currentLyricText = line.text;
                } else if (t < 6.0) {
                    this.activeLineIndex = -1;
                    this.currentLyricText = '♫ Intro Musik (Fanfare Mars INAKI) ♫';
                } else if (t >= 78.0) {
                    this.activeLineIndex = -1;
                    this.currentLyricText = '♫ Outro Musik (Fanfare Penutup) ♫';
                }
            },

            formatTime(sec) {
                if (!sec || isNaN(sec)) return '00:00';
                const m = Math.floor(sec / 60);
                const s = Math.floor(sec % 60);
                return (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s;
            }
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex flex-col gap-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="flex flex-col gap-1.5">
                <div class="inline-flex items-center gap-1.5 text-xs text-blue-600 font-bold uppercase tracking-wider">
                    <span class="material-symbols-outlined text-[16px]">music_note</span>
                    <span>Lagu Kebangsaan Profesi</span>
                </div>
                <h2 class="font-display text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Mars INAKI</h2>
                <p class="text-sm text-slate-600 max-w-2xl leading-relaxed">
                    Dengarkan lagu mars kebanggaan Ikatan Nasional Analis Kebijakan — memupuk tekad integritas, objektivitas data, dan bakti bagi Nusantara dengan lirik interaktif karaoke.
                </p>
            </div>

            <!-- Action Badges -->
            <div class="flex items-center gap-2">
                <a href="{{ asset('audio/mars-inaki.mp3') }}" download="Mars-INAKI.mp3" 
                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-white hover:bg-slate-100 text-slate-700 font-display text-xs font-semibold border border-slate-200 transition-all shadow-xs">
                    <span class="material-symbols-outlined text-[18px] text-blue-600">download</span>
                    <span>Unduh MP3</span>
                </a>
                <span class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-blue-50 text-blue-700 border border-blue-200 font-display text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-blue-600" :class="isPlaying ? 'animate-ping' : ''"></span>
                    <span x-text="isPlaying ? 'Sedang Diputar' : 'Audio Siap'">Audio Siap</span>
                </span>
            </div>
        </div>

        <!-- Main Audio Player Box -->
        <div class="p-6 lg:p-8 rounded-3xl bg-white border border-slate-200 shadow-md flex flex-col gap-6 relative overflow-hidden">
            <!-- Background Decorative Accent -->
            <div class="absolute -right-20 -top-20 w-64 h-64 rounded-full bg-blue-50/60 pointer-events-none"></div>

            <!-- Header Audio Info & Karaoke Banner -->
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 pb-4 border-b border-slate-100 relative z-10">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-700 text-white flex items-center justify-center shrink-0 shadow-md shadow-blue-500/20">
                        <span class="material-symbols-outlined text-[30px]" :class="isPlaying ? 'animate-bounce' : ''">library_music</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] text-blue-600 font-bold uppercase tracking-wider font-display">Rekaman Resmi Studio</span>
                        <h3 class="font-display text-lg font-bold text-slate-900 leading-tight">Lagu Mars INAKI</h3>
                        <span class="text-xs text-slate-500">Harmoni Korps Analis Kebijakan Indonesia • 01:21</span>
                    </div>
                </div>

                <!-- Dynamic Live Karaoke Line Display -->
                <div class="w-full lg:w-auto flex-1 max-w-xl bg-slate-50 border border-slate-200/80 rounded-2xl px-5 py-3 flex items-center gap-3 shadow-inner">
                    <div class="w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-[16px]" :class="isPlaying ? 'animate-pulse' : ''">mic</span>
                    </div>
                    <div class="flex flex-col flex-1 overflow-hidden">
                        <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Lirik Berjalan (Live Karaoke):</span>
                        <p class="text-xs sm:text-sm font-semibold truncate transition-colors duration-200"
                           :class="activeCard >= 0 ? 'text-blue-700' : 'text-slate-600'"
                           x-text="currentLyricText">
                            Klik tombol putar untuk mendengarkan Mars INAKI
                        </p>
                    </div>
                    <!-- Status Pulse Dot -->
                    <span class="w-2.5 h-2.5 rounded-full shrink-0" 
                          :class="isPlaying ? 'bg-emerald-500 animate-ping' : 'bg-slate-300'"></span>
                </div>
            </div>

            <!-- Controls, Scrubbing Bar & Waveform -->
            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/70 flex flex-col gap-4 relative z-10">
                <div class="flex items-center gap-4 sm:gap-6">
                    <!-- Play / Pause Main Button -->
                    <button @click="togglePlay()" 
                            type="button"
                            class="w-14 h-14 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center transition-all duration-200 active:scale-95 shadow-md shadow-blue-600/30 shrink-0 group"
                            :title="isPlaying ? 'Jeda Lagu' : 'Putar Lagu'">
                        <span class="material-symbols-outlined text-[32px] transition-transform group-hover:scale-110" 
                              x-text="isPlaying ? 'pause' : 'play_arrow'">play_arrow</span>
                    </button>

                    <!-- Timeline & Scrubbing Container -->
                    <div class="flex flex-col grow gap-2 min-w-0">
                        <!-- Time & Section Indicator (Clean without extra titles) -->
                        <div class="flex items-center justify-between text-xs font-mono font-medium text-slate-500">
                            <span class="text-blue-700 font-bold" x-text="formatTime(currentTime)">00:00</span>
                            <span class="font-sans font-semibold text-slate-700 text-xs hidden sm:inline">
                                <span x-show="activeCard === 0">Bagian: Bait 1</span>
                                <span x-show="activeCard === 1">Bagian: Bait 2</span>
                                <span x-show="activeCard === 2">Bagian: Reffrain</span>
                                <span x-show="activeCard === 3">Bagian: Penutup</span>
                                <span x-show="activeCard < 0" x-text="currentTime < 6 ? 'Intro Musik Fanfare' : 'Mars INAKI'">Mars INAKI</span>
                            </span>
                            <span x-text="formatTime(duration)">01:21</span>
                        </div>

                        <!-- Clickable / Draggable Progress Track -->
                        <div @click="seekProgress($event)" 
                             class="w-full h-3 bg-slate-200 hover:bg-slate-300 rounded-full cursor-pointer relative overflow-hidden transition-colors group">
                            <div class="h-full bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full transition-all duration-100 relative"
                                 :style="`width: ${duration ? (currentTime / duration * 100) : 0}%`">
                                <span class="absolute right-0 top-1/2 -translate-y-1/2 w-2.5 h-2.5 bg-white rounded-full shadow-sm opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            </div>
                        </div>

                        <!-- Dynamic Interactive Waveform Simulator -->
                        <div class="w-full h-6 flex items-center justify-between gap-0.5 sm:gap-1 px-1 overflow-hidden opacity-90">
                            @php
                                $bars = [10, 16, 22, 14, 26, 18, 22, 10, 18, 24, 14, 20, 26, 16, 10, 20, 14, 24, 18, 10, 20, 14, 22, 12, 18, 26, 14, 20, 12, 16, 24, 14, 18, 26, 16, 10];
                            @endphp
                            @foreach($bars as $idx => $barHeight)
                                <span class="w-1.5 rounded-full transition-all duration-200"
                                      :class="isPlaying ? 'bg-blue-600' : 'bg-slate-300'"
                                      :style="isPlaying ? `height: ${Math.max(6, Math.min(24, Math.sin((currentTime * 4) + {{ $idx }}) * 10 + 14))}px` : 'height: {{ $barHeight }}px'">
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Volume Control -->
                    <div class="hidden md:flex items-center gap-2 text-slate-500 shrink-0">
                        <button @click="toggleMute()" type="button" class="hover:text-blue-600 focus:outline-none transition-colors" :title="isMuted ? 'Unmute' : 'Mute'">
                            <span class="material-symbols-outlined text-[22px]" x-text="isMuted || volume == 0 ? 'volume_off' : (volume > 0.5 ? 'volume_up' : 'volume_down')">volume_up</span>
                        </button>
                        <input type="range" min="0" max="1" step="0.05" :value="isMuted ? 0 : volume" 
                               @input="setVolume($event.target.value)"
                               class="w-20 h-1.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Interactive Synchronized Lyrics Cards (Only Lyrics, Titles & Tagline Removed) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- CARD 1: BAIT 1 (06.0s - 21.0s) -->
                <div @click="seekTo(6.0)"
                     class="p-5 sm:p-6 rounded-2xl transition-all duration-300 cursor-pointer flex flex-col justify-start border relative group"
                     :class="activeCard === 0 
                        ? 'bg-blue-50/70 border-blue-500 shadow-lg ring-2 ring-blue-500/20 -translate-y-1' 
                        : 'bg-white border-slate-200 hover:border-blue-300 hover:shadow-sm'">
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold font-display uppercase tracking-wider transition-colors"
                                  :class="activeCard === 0 ? 'bg-blue-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600 group-hover:bg-blue-50 group-hover:text-blue-600'">
                                BAIT 1
                            </span>
                            <span class="text-[11px] font-medium transition-colors"
                                  :class="activeCard === 0 ? 'text-blue-600 font-bold' : 'text-slate-400'">
                                00:06 – 00:21
                            </span>
                        </div>

                        <!-- Lyrics lines only -->
                        <div class="flex flex-col gap-2 text-xs sm:text-sm leading-relaxed pt-1">
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 0 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 0 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                INAKI bersatu, berpadu cita mulia
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 1 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 0 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                Terukir analis kebijakan
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 2 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 0 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                Menjembatani nurani bangsa
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 3 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 0 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                Indonesia yang sejahtera
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: BAIT 2 (21.0s - 37.0s) -->
                <div @click="seekTo(21.0)"
                     class="p-5 sm:p-6 rounded-2xl transition-all duration-300 cursor-pointer flex flex-col justify-start border relative group"
                     :class="activeCard === 1 
                        ? 'bg-blue-50/70 border-blue-500 shadow-lg ring-2 ring-blue-500/20 -translate-y-1' 
                        : 'bg-white border-slate-200 hover:border-blue-300 hover:shadow-sm'">
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold font-display uppercase tracking-wider transition-colors"
                                  :class="activeCard === 1 ? 'bg-blue-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600 group-hover:bg-blue-50 group-hover:text-blue-600'">
                                BAIT 2
                            </span>
                            <span class="text-[11px] font-medium transition-colors"
                                  :class="activeCard === 1 ? 'text-blue-600 font-bold' : 'text-slate-400'">
                                00:21 – 00:37
                            </span>
                        </div>

                        <!-- Lyrics lines only -->
                        <div class="flex flex-col gap-2 text-xs sm:text-sm leading-relaxed pt-1">
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 4 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 1 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                Mendesain strategi, pembangunan merata
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 5 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 1 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                Dari hulu sampai ke hilir
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 6 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 1 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                Menyaring data, mengolah fakta
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-1"
                               :class="activeLineIndex === 7 ? 'bg-blue-600 text-white font-bold shadow-xs' : (activeCard === 1 ? 'text-slate-900 font-medium' : 'text-slate-600')">
                                Kebijakan berkualitas
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CARD 3: REFFRAIN (37.0s - 71.0s) -->
                <div @click="seekTo(37.0)"
                     class="p-5 sm:p-6 rounded-2xl transition-all duration-300 cursor-pointer flex flex-col justify-start border relative group"
                     :class="activeCard === 2 
                        ? 'bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-900 text-white border-blue-400 shadow-xl ring-2 ring-blue-400/30 -translate-y-1.5' 
                        : 'bg-white border-slate-200 hover:border-blue-300 hover:shadow-sm'">
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center justify-between pb-2"
                             :class="activeCard === 2 ? 'border-b border-white/20' : 'border-b border-slate-100'">
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold font-display uppercase tracking-wider transition-colors"
                                  :class="activeCard === 2 ? 'bg-white/20 text-white border border-white/30' : 'bg-slate-100 text-slate-600 group-hover:bg-blue-50 group-hover:text-blue-600'">
                                REFFRAIN
                            </span>
                            <span class="text-[11px] font-medium transition-colors"
                                  :class="activeCard === 2 ? 'text-amber-300 font-bold' : 'text-slate-400'">
                                00:37 – 01:11
                            </span>
                        </div>

                        <!-- Lyrics lines only -->
                        <div class="flex flex-col gap-1.5 text-xs sm:text-sm leading-relaxed pt-1">
                            <p class="transition-all duration-200 rounded px-2 py-0.5"
                               :class="activeLineIndex === 8 ? 'bg-white text-blue-900 font-extrabold shadow-sm' : (activeCard === 2 ? 'text-white/95 font-medium' : 'text-slate-700')">
                                INAKI punggawa berpikir bagi ibu pertiwi
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-0.5"
                               :class="activeLineIndex === 9 ? 'bg-white text-blue-900 font-extrabold shadow-sm' : (activeCard === 2 ? 'text-white/95 font-medium' : 'text-slate-700')">
                                Analis kebijakan profesional, berani, jujur dan berintegritas
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-0.5"
                               :class="activeLineIndex === 10 ? 'bg-white text-blue-900 font-extrabold shadow-sm' : (activeCard === 2 ? 'text-white/95 font-medium' : 'text-slate-700')">
                                INAKI demi kebijakan tingkatkan peran fungsional
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-0.5"
                               :class="activeLineIndex === 11 ? 'bg-white text-blue-900 font-extrabold shadow-sm' : (activeCard === 2 ? 'text-white/95 font-medium' : 'text-slate-700')">
                                Tak lekang oleh waktu jayalah analis kebijakan
                            </p>
                            <p class="transition-all duration-200 rounded px-2 py-0.5"
                               :class="activeLineIndex === 12 ? 'bg-white text-blue-900 font-extrabold shadow-sm' : (activeCard === 2 ? 'text-white/95 font-medium' : 'text-slate-700')">
                                Bangkitkan martabat bangsa
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CARD 4: PENUTUP (71.0s - 81.0s) -->
                <div @click="seekTo(71.0)"
                     class="p-5 sm:p-6 rounded-2xl transition-all duration-300 cursor-pointer flex flex-col justify-start border relative group"
                     :class="activeCard === 3 
                        ? 'bg-emerald-50/70 border-emerald-500 shadow-lg ring-2 ring-emerald-500/20 -translate-y-1' 
                        : 'bg-white border-slate-200 hover:border-emerald-300 hover:shadow-sm'">
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold font-display uppercase tracking-wider transition-colors"
                                  :class="activeCard === 3 ? 'bg-emerald-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700'">
                                PENUTUP
                            </span>
                            <span class="text-[11px] font-medium transition-colors"
                                  :class="activeCard === 3 ? 'text-emerald-700 font-bold' : 'text-slate-400'">
                                01:11 – 01:21
                            </span>
                        </div>

                        <!-- Lyrics lines only (tagline removed) -->
                        <div class="flex flex-col gap-2 pt-2">
                            <p class="font-display text-base sm:text-lg font-extrabold leading-snug uppercase transition-all duration-200 rounded-xl p-3 text-center"
                               :class="activeCard === 3 ? 'bg-emerald-600 text-white shadow-md' : 'text-emerald-800 bg-emerald-50/70 border border-emerald-200/50'">
                                INAKI UNTUK INDONESIA ITU PASTI!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Note & Info -->
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500 border-t border-slate-100">
                <span class="flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px] text-blue-600">touch_app</span>
                    <span>Klik pada kartu atau bait manapun untuk langsung melompat memutar bagian tersebut.</span>
                </span>
                <span class="text-slate-400 text-[11px]">Durasi Asli: 01:21 • Format Stereo 320kbps</span>
            </div>
        </div>
    </div>
</section>
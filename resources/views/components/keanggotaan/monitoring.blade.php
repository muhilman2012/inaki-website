<section class="w-full px-4 sm:px-6 lg:px-12 py-4 scroll-mt-[180px]" id="monitoring-section"
         x-data="{
             status: '',
             query: '',
             loading: false,
             searched: false,
             result: null,
             submitSearch() {
                 if (!this.query.trim()) return;
                 this.loading = true;
                 setTimeout(() => {
                     this.loading = false;
                     this.searched = true;
                     const isNumber = /^\d+$/.test(this.query.trim().replace(/\s+/g, ''));
                     this.result = {
                         kta: isNumber ? 'INK-2024-' + this.query.trim().slice(-5) : 'INK-2024-08192',
                         name: isNumber ? 'Dr. Hendra Kurniawan, M.A.' : this.query.trim(),
                         status: this.status === 'asn' ? 'Aparatur Sipil Negara (PNS / PPPK)' : 'Non-ASN (Akademisi / Praktisi)',
                         validUntil: '31 Desember 2026'
                     };
                 }, 450);
             },
             downloadKTA() {
                 alert('Mengunduh e-KTA Digital resmi INAKI untuk ' + (this.result?.name || 'Anggota') + '...');
             }
         }">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white border border-[#E2E8F0] rounded-2xl shadow-sm p-6 sm:p-8">
            <!-- Header Section -->
            <div class="flex items-start gap-4 pb-6 border-b border-[#F1F5F9]">
                <div class="w-11 h-11 rounded-xl bg-[#EFF6FF] text-[#2563EB] flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[24px]">badge</span>
                </div>
                <div class="flex flex-col">
                    <h2 class="text-xl font-bold font-display text-[#0F172A]">Monitoring Status & Nomor KTA</h2>
                    <p class="text-sm text-[#64748B] mt-0.5 leading-relaxed">Masukkan data di bawah ini untuk mengecek status pendaftaran, proses perpanjangan, maupun mencari Nomor KTA Anda.</p>
                </div>
            </div>

            <!-- Form -->
            <form class="flex flex-col gap-5 mt-6" action="{{ route('keanggotaan.status') }}" method="GET" novalidate
                  x-data="{ 
                      errorMsg: '',
                      validate(e) {
                          const val = this.$refs.qInput.value.trim();
                          if (!val) {
                              this.errorMsg = 'Kolom Nomor Registrasi, NIP, atau Email wajib diisi.';
                              this.$refs.qInput.focus();
                              e.preventDefault();
                              return false;
                          }
                          this.errorMsg = '';
                          return true;
                      }
                  }"
                  @submit="validate($event)">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Status Kepegawaian -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-[#1E293B] flex items-center gap-1" for="kepegawaian-select">
                            <span>Status Kepegawaian</span>
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select class="w-full h-11 px-3.5 rounded-xl bg-[#F8FAFC] border border-[#CBD5E1] text-[#0F172A] text-sm focus:outline-none focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/10 appearance-none shadow-sm cursor-pointer" id="kepegawaian-select">
                                <option value="">Semua Status (ASN / Non-ASN)</option>
                                <option value="asn">Aparatur Sipil Negara (PNS / PPPK)</option>
                                <option value="non-asn">Non-ASN (Akademisi / Praktisi / Peneliti)</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[#94A3B8] text-[20px]">expand_more</span>
                        </div>
                    </div>

                    <!-- Nomor Registrasi, NIP, atau Email -->
                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                            <label class="text-sm font-semibold text-[#1E293B] flex items-center gap-1" for="search-query">
                                <span>Nomor Registrasi, NIP, atau Email</span>
                                <span class="text-red-500">*</span>
                            </label>
                            <span x-show="errorMsg" x-cloak class="text-xs text-rose-600 font-semibold flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Wajib diisi</span>
                            </span>
                        </div>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px]"
                                  :class="errorMsg ? 'text-rose-500' : 'text-[#94A3B8]'">person_search</span>
                            <input 
                                x-ref="qInput"
                                @input="if(errorMsg && $el.value.trim()) errorMsg = ''"
                                name="q" 
                                class="w-full h-11 pl-11 pr-4 rounded-xl text-sm placeholder-[#94A3B8] focus:outline-none transition-all duration-200 shadow-sm" 
                                :class="errorMsg 
                                    ? 'bg-rose-50/50 border-2 border-rose-500 ring-4 ring-rose-500/20 text-slate-900 focus:border-rose-600' 
                                    : 'bg-[#F8FAFC] border border-[#CBD5E1] text-[#0F172A] focus:border-[#2563EB] focus:ring-2 focus:ring-[#2563EB]/10'"
                                id="search-query" 
                                placeholder="Ketikkan Nomor Registrasi (REG-...), NIP, atau Email..." 
                                type="text"
                            >
                        </div>
                        <p x-show="errorMsg" x-cloak class="text-xs text-rose-600 font-medium mt-0.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">error</span>
                            <span x-text="errorMsg"></span>
                        </p>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-1">
                    <button class="w-full h-11 px-6 rounded-xl bg-[#2563EB] text-white font-semibold text-sm hover:bg-blue-700 active:scale-98 transition-all flex items-center justify-center gap-2 shadow-sm" type="submit" :disabled="loading">
                        <span x-show="!loading" class="material-symbols-outlined text-[18px]">search</span>
                        <svg x-show="loading" x-cloak class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <span x-text="loading ? 'Memeriksa Basis Data...' : 'Cari Data Saya'">Cari Data Saya</span>
                    </button>
                </div>

                <!-- Info Tip -->
                <div class="flex items-start gap-3 p-3.5 rounded-xl bg-[#EFF6FF] border border-[#DBEAFE] text-[#1E3A8A]">
                    <span class="material-symbols-outlined text-[#2563EB] text-[20px] mt-0.5 shrink-0">info</span>
                    <p class="text-xs leading-relaxed"><strong class="font-semibold">Kiat:</strong> Gunakan NIP tanpa spasi atau nama lengkap sesuai dengan yang didaftarkan pada SK pengangkatan atau formulir pendaftaran. Jika data Anda belum terverifikasi setelah 3x24 jam kerja, hubungi hotline kesekretariatan.</p>
                </div>
            </form>

            <!-- Search Result Card -->
            <div x-show="searched && !loading" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="mt-6 p-6 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] transition-all" id="search-result">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#E2E8F0]">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#DCFCE7] text-[#16A34A] flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[22px]">verified</span>
                        </div>
                        <div>
                            <h4 class="text-base font-bold font-display text-[#0F172A]">Data Ditemukan</h4>
                            <p class="text-xs text-[#64748B]">Status Keanggotaan Aktif pada Pangkalan Data INAKI</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#DCFCE7] text-[#15803D] text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-[#16A34A] animate-pulse"></span>
                        Terverifikasi Aktif
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
                    <div class="p-4 rounded-xl bg-white border border-[#E2E8F0]">
                        <span class="text-[11px] text-[#64748B] uppercase font-semibold">Nomor KTA / NRA</span>
                        <p class="text-lg font-bold font-mono text-[#2563EB] mt-1" x-text="result?.kta || 'INK-2024-08192'">INK-2024-08192</p>
                    </div>
                    <div class="p-4 rounded-xl bg-white border border-[#E2E8F0]">
                        <span class="text-[11px] text-[#64748B] uppercase font-semibold">Nama Terdaftar</span>
                        <p class="text-sm font-bold text-[#0F172A] mt-1" x-text="result?.name || 'Dr. Hendra Kurniawan, M.A.'">Dr. Hendra Kurniawan, M.A.</p>
                        <p class="text-[11px] text-[#64748B] mt-0.5" x-text="result?.status || 'Aparatur Sipil Negara'"></p>
                    </div>
                    <div class="p-4 rounded-xl bg-white border border-[#E2E8F0]">
                        <span class="text-[11px] text-[#64748B] uppercase font-semibold">Masa Berlaku KTA</span>
                        <p class="text-sm font-bold text-[#0F172A] mt-1" x-text="result?.validUntil || '31 Desember 2026'">31 Desember 2026</p>
                        <p class="text-[11px] text-emerald-600 font-medium mt-0.5">Sinkronisasi LAN RI Sukses</p>
                    </div>
                </div>

                <div class="mt-4 flex justify-end">
                    <button @click="downloadKTA" class="px-4 py-2.5 rounded-xl bg-[#2563EB] text-white font-semibold text-xs hover:bg-blue-700 active:scale-95 transition-all flex items-center gap-1.5 shadow-sm" type="button">
                        <span class="material-symbols-outlined text-[16px]">download</span>
                        <span>Unduh e-KTA Digital</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

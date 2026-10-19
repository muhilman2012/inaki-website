<section class="w-full px-4 sm:px-6 lg:px-12 py-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pendaftaran Anggota Baru -->
            <a href="{{ route('keanggotaan.daftar') }}" class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#2563EB] to-[#1D4ED8] text-white p-7 sm:p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between border border-[#1E40AF]/20">
                <div class="absolute -right-6 -bottom-6 w-36 h-36 rounded-full bg-white/10 pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-5 group-hover:bg-white group-hover:text-[#2563EB] transition-colors duration-300">
                        <span class="material-symbols-outlined text-[26px]">person_add</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold font-display text-white mb-2">Pendaftaran Anggota Baru</h2>
                    <p class="text-sm text-white/90 leading-relaxed max-w-md">Klik di sini untuk mengisi formulir pendaftaran anggota INAKI dan bergabung dengan ribuan analis kebijakan se-Indonesia.</p>
                </div>
                <div class="mt-8 pt-4 flex items-center gap-2 text-sm font-semibold text-white">
                    <span>Buka Formulir Pendaftaran</span>
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                </div>
            </a>

            <!-- Perpanjangan Keanggotaan / Cek Status KTA -->
            <a href="{{ route('keanggotaan.status') }}" class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#0D9488] to-[#0F766E] text-white p-7 sm:p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between border border-[#115E59]/20">
                <div class="absolute -right-6 -bottom-6 w-36 h-36 rounded-full bg-white/10 pointer-events-none group-hover:scale-125 transition-transform duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-5 group-hover:bg-white group-hover:text-[#0D9488] transition-colors duration-300">
                        <span class="material-symbols-outlined text-[26px]">how_to_reg</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold font-display text-white mb-2">Cek Status &amp; KTA Digital</h2>
                    <p class="text-sm text-white/90 leading-relaxed max-w-md">Periksa status verifikasi pendaftaran anggota atau cek nomor dan keabsahan KTA Digital Anda secara online.</p>
                </div>
                <div class="mt-8 pt-4 flex items-center gap-2 text-sm font-semibold text-white">
                    <span>Periksa Status &amp; KTA</span>
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                </div>
            </a>
        </div>
    </div>
</section>

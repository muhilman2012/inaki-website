<section class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-12 pb-16 scroll-mt-[180px]" data-purpose="location-map" id="peta-lokasi">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Map Card Header -->
        <div class="p-6 border-b border-slate-100 flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-slate-900 font-display">Lokasi Sekretariat INAKI</h2>
                <p class="text-xs text-slate-500 mt-0.5">Pusat Pembinaan Program dan Kebijakan Pengembangan Kompetensi ASN - LAN RI Jakarta</p>
            </div>
            <div class="flex items-center gap-2">
                <a class="inline-flex items-center gap-1 px-3.5 py-2 text-xs font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-xl transition-colors border border-blue-200 shadow-xs" href="https://maps.google.com/?q=Gedung+Graha+Wicaksana+Kampus+PPLPN+LAN+Jakarta" rel="noopener noreferrer" target="_blank">
                    <span>Buka di Google Maps</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Container Visual Peta Mock Sesuai Tata Letak Gambar -->
        <div class="relative w-full h-[450px] map-pattern overflow-hidden select-none">
            <!-- Sungai Ciliwung Mocked Curve (Representasi Geografis Pejompongan LAN RI) -->
            <svg class="absolute inset-0 w-full h-full pointer-events-none opacity-80" xmlns="http://www.w3.org/2000/svg">
                <path d="M 700 -20 Q 640 180 690 280 T 800 450" fill="none" stroke="#93c5fd" stroke-linecap="round" stroke-width="48"></path>
                <text fill="#1e40af" font-size="11" font-weight="600" opacity="0.6" transform="rotate(75, 660, 240)" x="660" y="240">Ciliwung River</text>
                <!-- Jalan Raya Sekitar -->
                <line stroke="#cbd5e1" stroke-width="12" x1="120" x2="160" y1="0" y2="440"></line>
                <line stroke="#cbd5e1" stroke-width="14" x1="0" x2="800" y1="280" y2="280"></line>
                <line stroke="#cbd5e1" stroke-width="10" x1="380" x2="520" y1="0" y2="440"></line>
                <line stroke="#cbd5e1" stroke-width="8" x1="680" x2="980" y1="280" y2="200"></line>
            </svg>

            <!-- Street / Landmark labels -->
            <div class="absolute top-10 left-[260px] text-[11px] font-medium text-slate-500">Jl. Petamburan IV</div>
            <div class="absolute top-28 left-[390px] text-[11px] font-medium text-slate-500">Jl. Petamburan 5</div>
            <div class="absolute top-4 left-[340px] text-[10px] bg-white/80 px-1.5 py-0.5 rounded shadow-xs text-slate-600">Asrama brimob slipi</div>
            <div class="absolute bottom-28 left-[400px] text-[11px] font-medium text-slate-500">Rusun Petamburan</div>
            <div class="absolute bottom-16 right-[300px] text-[11px] font-medium text-slate-500">Jl. Administrasi II</div>
            <div class="absolute bottom-8 right-[240px] text-[10px] bg-white/90 px-1.5 py-0.5 rounded shadow-xs text-slate-600">Watergate Bike & Car Wash</div>
            <div class="absolute top-8 right-[180px] text-[11px] font-medium text-slate-500">Jl. Kebon Pala 9</div>

            <!-- Marker INAKI Graha Wicaksana LAN RI -->
            <div class="absolute top-[230px] left-[55%] -translate-x-1/2 -translate-y-full flex flex-col items-center group cursor-pointer z-20">
                <div class="bg-white text-slate-900 px-3 py-1.5 rounded-lg shadow-md border border-slate-200 text-xs font-bold whitespace-nowrap mb-1 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-ping"></span>
                    <span>Gedung Graha Wicaksana Kampus PPLPN LAN</span>
                </div>
                <!-- Red Pin Icon -->
                <div class="text-red-600 drop-shadow-md">
                    <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C7.58 0 4 3.58 4 8c0 5.25 7 13 8 13s8-7.75 8-13c0-4.42-3.58-8-8-8zm0 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"></path>
                    </svg>
                </div>
            </div>

            <!-- Interactive Info Box Google Maps Overlay -->
            <div class="absolute top-4 left-4 sm:top-6 sm:left-6 z-30 max-w-xs sm:max-w-sm bg-white rounded-xl shadow-xl border border-slate-200/90 p-4 transition-all hover:shadow-2xl">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <h3 class="font-bold text-sm text-slate-900 leading-snug font-display">
                            Gedung Graha Wicaksana Kampus PPLPN LAN Jakarta
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            RR24+9XX, RT.9/RW.9, Petamburan, Kecamatan Tanah Abang, Kota Jakarta Pusat, DKI Jakarta 10260
                        </p>
                    </div>
                    <div class="flex items-center gap-1.5 flex-shrink-0">
                        <a class="p-1.5 rounded-lg hover:bg-slate-100 text-slate-500" href="https://maps.google.com/?q=Gedung+Graha+Wicaksana+Kampus+PPLPN+LAN+Jakarta" target="_blank" rel="noopener noreferrer" title="Buka di tab baru">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                            </svg>
                        </a>
                        <a class="p-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white shadow-xs" href="https://maps.google.com/dir/?api=1&destination=Gedung+Graha+Wicaksana+Kampus+PPLPN+LAN+Jakarta" target="_blank" rel="noopener noreferrer" title="Petunjuk Arah">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-1 text-slate-700">
                        <span class="font-bold">5.0</span>
                        <div class="flex text-amber-400 text-xs">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-slate-400 font-normal">(1)</span>
                    </div>
                    <a class="text-blue-600 font-semibold hover:underline" href="https://maps.google.com/dir/?api=1&destination=Gedung+Graha+Wicaksana+Kampus+PPLPN+LAN+Jakarta" target="_blank" rel="noopener noreferrer">
                        Petunjuk Arah
                    </a>
                </div>
            </div>

            <!-- Google Maps Watermark & Controls Mock -->
            <div class="absolute bottom-2 right-2 bg-white/90 backdrop-blur-xs px-2.5 py-1 rounded text-[10px] text-slate-500 border border-slate-200">
                Data peta ©2026 Google
            </div>
        </div>
    </div>
</section>

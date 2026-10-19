@extends('layouts.admin')

@section('title', 'Manajemen Publikasi')
@section('page-title', 'Manajemen Publikasi & Dokumen')

@section('content')

    <!-- Top Action Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 font-headline">Koleksi Publikasi Resmi INAKI</h2>
            <p class="text-xs sm:text-sm text-slate-600 mt-1">
                Kelola buku prosiding, buku pedoman kebijakan, dan anggaran dasar/rumah tangga yang dapat diakses publik.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <button 
                type="button" 
                onclick="alert('Fitur unggah dinamis akan dihubungkan pada tahap integrasi database berikutnya.')"
                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer"
            >
                <span class="material-symbols-outlined text-[18px]">add</span>
                <span>Tambah Publikasi Baru</span>
            </button>
        </div>
    </div>

    <!-- Publications Data Table Card -->
    <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-xs">
        <div class="p-4 sm:p-5 border-b border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 bg-white">
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <span class="text-xs font-semibold text-slate-500">Total Terdaftar:</span>
                <span class="px-2.5 py-0.5 rounded-md bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">4 Dokumen Aktif</span>
            </div>
            <div class="w-full sm:w-72">
                <div class="relative">
                    <span class="material-symbols-outlined absolute inset-y-0 left-3 flex items-center text-slate-400 text-[18px] pointer-events-none">search</span>
                    <input 
                        type="text" 
                        placeholder="Cari judul publikasi..." 
                        class="w-full pl-9 pr-3 py-1.5 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600"
                    >
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-[11px] uppercase tracking-wider text-slate-500 font-bold">
                        <th class="py-3.5 px-5">Dokumen &amp; Berkas</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Tahun / Halaman</th>
                        <th class="py-3.5 px-4">Status &amp; Ukuran</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-800">
                    
                    <!-- Row 1: Buku Prosiding -->
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 border border-blue-200">
                                    <span class="material-symbols-outlined text-[22px]">book_2</span>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 text-sm">Buku Prosiding: Layanan Dasar Inklusif Berkelanjutan</p>
                                    <p class="text-[11px] text-slate-500 font-mono mt-0.5">buku-prosiding-layanan-dasar-inaki-2026.pdf</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-xs">
                            <span class="px-2 py-1 rounded bg-blue-50 text-blue-700 border border-blue-200 font-medium">Prosiding Ilmiah</span>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">
                            Tahun 2026 &bull; 186 Hlm
                        </td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Terbit (9.7 MB)
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('publikasi.baca', 'buku-prosiding-layanan-dasar-inaki-2026') }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition-colors">Pratinjau</a>
                                <a href="{{ route('publikasi.unduh', 'buku-prosiding-layanan-dasar-inaki-2026') }}" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200 text-xs font-semibold transition-colors">Unduh</a>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Buku Pedoman Bencana -->
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 border border-amber-200">
                                    <span class="material-symbols-outlined text-[22px]">emergency</span>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 text-sm">Buku Pedoman Teknis Kesiapsiagaan Darurat Bencana</p>
                                    <p class="text-[11px] text-slate-500 font-mono mt-0.5">buku-pedoman-darurat-bencana-inaki-2026.pdf</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-xs">
                            <span class="px-2 py-1 rounded bg-amber-50 text-amber-700 border border-amber-200 font-medium">Pedoman Teknis</span>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">
                            Tahun 2026 &bull; 11 Hlm
                        </td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Terbit (11.8 MB)
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('publikasi.baca', 'buku-pedoman-darurat-bencana-inaki-2026') }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition-colors">Pratinjau</a>
                                <a href="{{ route('publikasi.unduh', 'buku-pedoman-darurat-bencana-inaki-2026') }}" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200 text-xs font-semibold transition-colors">Unduh</a>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3: Anggaran Dasar -->
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 border border-emerald-200">
                                    <span class="material-symbols-outlined text-[22px]">policy</span>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 text-sm">Anggaran Dasar (AD) INAKI</p>
                                    <p class="text-[11px] text-slate-500 font-mono mt-0.5">anggaran-dasar-inaki.pdf</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-xs">
                            <span class="px-2 py-1 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 font-medium">Konstitusi Organisasi</span>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">
                            Tahun 2026 &bull; 24 Hlm
                        </td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Terbit (8.9 MB)
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('publikasi.baca', 'anggaran-dasar-inaki') }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition-colors">Pratinjau</a>
                                <a href="{{ route('publikasi.unduh', 'anggaran-dasar-inaki') }}" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200 text-xs font-semibold transition-colors">Unduh</a>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4: Anggaran Rumah Tangga -->
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 border border-purple-200">
                                    <span class="material-symbols-outlined text-[22px]">gavel</span>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900 text-sm">Anggaran Rumah Tangga (ART) INAKI</p>
                                    <p class="text-[11px] text-slate-500 font-mono mt-0.5">anggaran-rumah-tangga-inaki.pdf</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-xs">
                            <span class="px-2 py-1 rounded bg-purple-50 text-purple-700 border border-purple-200 font-medium">Konstitusi Organisasi</span>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">
                            Tahun 2026 &bull; 18 Hlm
                        </td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Terbit (6.0 MB)
                            </span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('publikasi.baca', 'anggaran-rumah-tangga-inaki') }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition-colors">Pratinjau</a>
                                <a href="{{ route('publikasi.unduh', 'anggaran-rumah-tangga-inaki') }}" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200 text-xs font-semibold transition-colors">Unduh</a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Notice Card -->
    <div class="p-4 rounded-xl bg-blue-50 border border-blue-200 text-xs text-blue-900 flex items-start gap-3">
        <span class="material-symbols-outlined text-[20px] text-blue-600 shrink-0">info</span>
        <div>
            <p class="font-bold">Informasi Rute Unduhan Terproteksi</p>
            <p class="text-slate-600 mt-0.5">
                Semua berkas yang ditampilkan pada tabel di atas menggunakan pengendali <code class="px-1 py-0.5 rounded bg-white border border-blue-200 text-blue-700 font-mono">PublicationController</code> yang secara otomatis memvalidasi slug berkas, mencegah eksploitasi traversal path, dan melindungi file sistem internal server.
            </p>
        </div>
    </div>

@endsection

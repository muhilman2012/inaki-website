@extends('layouts.admin')

@section('title', 'Direktori Regulasi')
@section('page-title', 'Direktori Regulasi JFAK & Kebijakan')

@section('content')

    <!-- Top Action Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 font-headline">Katalog Regulasi &amp; Dasar Hukum</h2>
            <p class="text-xs sm:text-sm text-slate-600 mt-1">
                Basis pengetahuan hukum Jabatan Fungsional Analis Kebijakan (JFAK) dan AD/ART resmi INAKI.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <button 
                type="button" 
                onclick="alert('Formulir tambah regulasi dinamis akan dihubungkan pada tahap integrasi database berikutnya.')"
                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm shadow-sm transition-all cursor-pointer"
            >
                <span class="material-symbols-outlined text-[18px]">add</span>
                <span>Tambah Regulasi Baru</span>
            </button>
        </div>
    </div>

    <!-- Regulations Table Card -->
    <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-xs">
        <div class="p-4 sm:p-5 border-b border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 bg-white">
            <div class="flex items-center gap-2">
                <span class="text-xs font-semibold text-slate-500">Total Regulasi:</span>
                <span class="px-2.5 py-0.5 rounded-md bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200">18 Regulasi Terverifikasi</span>
            </div>
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <select class="px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600">
                    <option value="">Semua Kategori Instansi</option>
                    <option value="lan">LAN RI</option>
                    <option value="menpan">KemenPANRB</option>
                    <option value="presiden">Undang-Undang &amp; Perpres</option>
                    <option value="inaki">Internal INAKI (AD/ART)</option>
                </select>
                <div class="relative w-full sm:w-60">
                    <span class="material-symbols-outlined absolute inset-y-0 left-3 flex items-center text-slate-400 text-[18px] pointer-events-none">search</span>
                    <input 
                        type="text" 
                        placeholder="Cari nomor / tentang..." 
                        class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600"
                    >
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-[11px] uppercase tracking-wider text-slate-500 font-bold">
                        <th class="py-3.5 px-5">Nomor &amp; Nomenklatur Regulasi</th>
                        <th class="py-3.5 px-4">Instansi Penerbit</th>
                        <th class="py-3.5 px-4">Tahun</th>
                        <th class="py-3.5 px-4">Status Keberlakuan</th>
                        <th class="py-3.5 px-5 text-right">Tautan Web Publik</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-800">
                    
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <p class="font-bold text-slate-900 text-sm">UU Nomor 20 Tahun 2023</p>
                            <p class="text-xs text-slate-500 mt-0.5">Aparatur Sipil Negara (Fondasi Transformasi ASN Modern)</p>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">Pemerintah RI / DPR</td>
                        <td class="py-4 px-4 font-mono text-xs text-slate-600">2023</td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">Berlaku</span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <a href="{{ route('publikasi') }}#direktori-regulasi" target="_blank" class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center gap-1">
                                <span>Lihat</span>
                                <span class="material-symbols-outlined text-[14px]">arrow_outward</span>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <p class="font-bold text-slate-900 text-sm">PermenPANRB Nomor 1 Tahun 2023</p>
                            <p class="text-xs text-slate-500 mt-0.5">Jabatan Fungsional (Konversi Predikat Kinerja ke Angka Kredit)</p>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">KemenPANRB</td>
                        <td class="py-4 px-4 font-mono text-xs text-slate-600">2023</td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">Berlaku</span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <a href="{{ route('publikasi') }}#direktori-regulasi" target="_blank" class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center gap-1">
                                <span>Lihat</span>
                                <span class="material-symbols-outlined text-[14px]">arrow_outward</span>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <p class="font-bold text-slate-900 text-sm">Peraturan LAN RI Nomor 10 Tahun 2023</p>
                            <p class="text-xs text-slate-500 mt-0.5">Pedoman Teknis Pembinaan Jabatan Fungsional Analis Kebijakan</p>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">LAN RI (Instansi Pembina)</td>
                        <td class="py-4 px-4 font-mono text-xs text-slate-600">2023</td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">Berlaku</span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <a href="{{ route('publikasi') }}#direktori-regulasi" target="_blank" class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center gap-1">
                                <span>Lihat</span>
                                <span class="material-symbols-outlined text-[14px]">arrow_outward</span>
                            </a>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="py-4 px-5">
                            <p class="font-bold text-slate-900 text-sm">Anggaran Dasar &amp; Anggaran Rumah Tangga (AD/ART)</p>
                            <p class="text-xs text-slate-500 mt-0.5">Konstitusi dan Tata Kelola Organisasi Profesi INAKI</p>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-600">DPP INAKI</td>
                        <td class="py-4 px-4 font-mono text-xs text-slate-600">2026</td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold">Resmi INAKI</span>
                        </td>
                        <td class="py-4 px-5 text-right">
                            <a href="{{ route('publikasi') }}#direktori-regulasi" target="_blank" class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center gap-1">
                                <span>Lihat</span>
                                <span class="material-symbols-outlined text-[14px]">arrow_outward</span>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection

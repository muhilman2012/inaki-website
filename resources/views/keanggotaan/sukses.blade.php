@extends('layouts.app', ['title' => 'Pendaftaran Berhasil Dikirim - INAKI'])

@section('content')
<div class="flex flex-col w-full">
    {{-- Unified Breadcrumb --}}
    <x-breadcrumb 
        :items="[
            ['label' => 'Keanggotaan', 'url' => route('keanggotaan')],
            ['label' => 'Pendaftaran Berhasil']
        ]" 
    />

    <div class="w-full bg-slate-50 min-h-screen py-12 sm:py-16">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            
            <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-xl text-center relative overflow-hidden">
                
                <!-- Glowing Accent Top Line -->
                <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-500 via-blue-600 to-indigo-600"></div>

                <!-- Success Icon -->
                <div class="w-20 h-20 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center mx-auto mb-6 ring-8 ring-emerald-50">
                    <span class="material-symbols-outlined text-[44px]">check_circle</span>
                </div>

                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-wider mb-3">
                    <span>Berkas Pendaftaran Diterima</span>
                </div>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline tracking-tight">
                    Pendaftaran Berhasil Dikirim!
                </h1>
                <p class="text-slate-600 text-xs sm:text-sm mt-2 max-w-lg mx-auto leading-relaxed">
                    Terima kasih, data dan berkas persyaratan pendaftaran keanggotaan INAKI Saudara telah berhasil kami terima dalam sistem antrean verifikasi.
                </p>

                <!-- Registration Code Card -->
                <div class="my-6 p-5 rounded-2xl bg-slate-900 text-white text-left relative overflow-hidden shadow-md">
                    <div class="flex items-center justify-between border-b border-slate-800 pb-3 mb-3">
                        <span class="text-xs font-semibold text-slate-400">Nomor Registrasi Pendaftaran Anda:</span>
                        <span class="px-2 py-0.5 rounded bg-blue-500/20 text-blue-400 text-[11px] font-bold font-mono">STATUS: MENUNGGU VERIFIKASI</span>
                    </div>
                    <div class="flex items-center justify-between gap-2">
                        <span class="text-xl sm:text-2xl font-extrabold font-mono text-emerald-400 tracking-wider">
                            {{ $member->registration_code }}
                        </span>
                        <button 
                            type="button" 
                            onclick="navigator.clipboard.writeText('{{ $member->registration_code }}'); alert('Nomor registrasi berhasil disalin!');"
                            class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-medium transition"
                            title="Salin Nomor Registrasi"
                        >
                            <span class="material-symbols-outlined text-[16px]">content_copy</span>
                            <span>Salin</span>
                        </button>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-2">
                        Simpan nomor registrasi ini untuk melacak status verifikasi atau menghubungi narahubung keanggotaan.
                    </p>
                </div>

                <!-- Ringkasan Data -->
                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 text-left text-xs space-y-2 mb-6">
                    <div class="flex justify-between">
                        <span class="text-slate-500">Nama Pendaftar:</span>
                        <span class="font-bold text-slate-900">{{ $member->nama }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">NIP / Tipe:</span>
                        <span class="font-medium text-slate-800 font-mono">{{ $member->nip }} ({{ $member->tipe_profesi }})</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Instansi:</span>
                        <span class="font-medium text-slate-800 text-right truncate max-w-xs">{{ $member->nama_organisasi }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Email Notifikasi:</span>
                        <span class="font-medium text-slate-800">{{ $member->email }}</span>
                    </div>
                </div>

                <!-- Langkah Selanjutnya -->
                <div class="text-left bg-blue-50/60 border border-blue-100 rounded-2xl p-5 text-xs text-blue-900 space-y-2 mb-8">
                    <h4 class="font-bold flex items-center gap-1.5 text-blue-950">
                        <span class="material-symbols-outlined text-[18px] text-blue-600">info</span>
                        <span>Tahapan Selanjutnya:</span>
                    </h4>
                    <ol class="list-decimal list-inside space-y-1.5 text-slate-700 mt-2">
                        <li>Tim Sekretariat &amp; Pusdatin DPP INAKI akan melakukan validasi berkas SK dan bukti pembayaran (estimasi 1&ndash;3 hari kerja).</li>
                        <li>Notifikasi status verifikasi dan penerbitan <strong>KTA Digital</strong> akan dikirimkan ke alamat email: <strong class="text-blue-900">{{ $member->email }}</strong> (cek juga folder SPAM, dari <em>pusdatin.inaki@gmail.com</em>).</li>
                        <li>Nomor WhatsApp <strong class="text-blue-900">{{ $member->hp }}</strong> akan dimasukkan ke dalam Grup Koordinasi Analis Kebijakan INAKI.</li>
                    </ol>
                </div>

                <!-- Navigasi Aksi -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a 
                        href="{{ route('keanggotaan.status', ['q' => $member->registration_code]) }}" 
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-2xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-xs sm:text-sm shadow-lg shadow-blue-600/25 transition"
                    >
                        <span class="material-symbols-outlined text-[18px]">search</span>
                        <span>Cek Status Verifikasi</span>
                    </a>
                    <a 
                        href="{{ route('home') }}" 
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs sm:text-sm transition"
                    >
                        <span>Kembali ke Beranda Utama</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app', ['title' => 'Cek Status Pendaftaran & KTA Digital - INAKI'])

@section('content')
<div class="flex flex-col w-full">
    {{-- Unified Breadcrumb --}}
    <x-breadcrumb 
        :items="[
            ['label' => 'Keanggotaan', 'url' => route('keanggotaan')],
            ['label' => 'Status & KTA Digital']
        ]" 
    />

    <div class="w-full bg-slate-50 min-h-screen py-10 sm:py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider mb-3">
                    <span class="material-symbols-outlined text-[16px]">search_check</span>
                    <span>Portal Verifikasi Mandiri</span>
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-headline tracking-tight">
                    Cek Status Keanggotaan &amp; KTA Digital
                </h1>
                <p class="text-slate-600 text-xs sm:text-sm mt-2 max-w-lg mx-auto leading-relaxed">
                    Masukkan Nomor Registrasi (REG-...), NIP 18 digit, atau alamat email yang Anda daftarkan.
                </p>
            </div>

            <!-- Search Form Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-lg mb-8">
                <form action="{{ route('keanggotaan.status') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <span class="material-symbols-outlined absolute inset-y-0 left-3.5 flex items-center text-slate-400 text-[22px] pointer-events-none">badge</span>
                        <input 
                            type="text" 
                            name="q" 
                            value="{{ $query }}"
                            required 
                            placeholder="Masukkan Nomor Registrasi / NIP / Email..." 
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                        >
                    </div>
                    <button 
                        type="submit" 
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-2xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-sm shadow-md hover:shadow-lg transition shrink-0"
                    >
                        <span class="material-symbols-outlined text-[20px]">search</span>
                        <span>Periksa Status</span>
                    </button>
                </form>
            </div>

            <!-- Result Display -->
            @if($query !== '')
                @if($result)
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xl space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-5">
                            <div>
                                <span class="text-xs text-slate-500 font-mono">Kode Registrasi: {{ $result->registration_code }}</span>
                                <h2 class="text-xl font-extrabold text-slate-900 font-headline mt-1">{{ $result->nama }}</h2>
                                <p class="text-xs text-slate-600 font-mono mt-0.5">NIP: {{ $result->nip }} &bull; {{ $result->tipe_profesi }}</p>
                            </div>
                            <div>
                                @if($result->isVerified())
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-extrabold">
                                        <span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
                                        <span>TERVERIFIKASI RESMI</span>
                                    </span>
                                @elseif($result->isRejected())
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-rose-100 text-rose-800 text-xs font-extrabold">
                                        <span class="material-symbols-outlined text-[16px]">cancel</span>
                                        <span>PERMOHONAN DITOLAK</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-amber-100 text-amber-800 text-xs font-extrabold">
                                        <span class="material-symbols-outlined text-[16px] animate-spin">sync</span>
                                        <span>MENUNGGU VERIFIKASI</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Detail Info Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                                <span class="text-[11px] text-slate-500 block">Jenjang / Jenis JFAK</span>
                                <span class="font-bold text-slate-900">{{ $result->jenis_jfak }}</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                                <span class="text-[11px] text-slate-500 block">Instansi Induk</span>
                                <span class="font-bold text-slate-900 truncate block">{{ $result->nama_organisasi }}</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                                <span class="text-[11px] text-slate-500 block">Unit Kerja Organisasi</span>
                                <span class="font-bold text-slate-900 truncate block">{{ $result->unit_organisasi }}</span>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                                <span class="text-[11px] text-slate-500 block">Nomor KTA Digital</span>
                                <span class="font-bold font-mono {{ $result->nomor_kta ? 'text-blue-700' : 'text-slate-400' }}">
                                    {{ $result->nomor_kta ?? 'Belum Diterbitkan (Menunggu Verifikasi)' }}
                                </span>
                            </div>
                        </div>

                        <!-- Catatan Verifikasi Jika Ada -->
                        @if($result->catatan_verifikasi)
                            <div class="p-4 rounded-2xl {{ $result->isRejected() ? 'bg-rose-50 border border-rose-200 text-rose-800' : 'bg-emerald-50 border border-emerald-200 text-emerald-800' }} text-xs">
                                <p class="font-bold flex items-center gap-1.5 mb-1">
                                    <span class="material-symbols-outlined text-[18px]">info</span>
                                    <span>Catatan dari Tim Verifikator INAKI:</span>
                                </p>
                                <p class="leading-relaxed">{{ $result->catatan_verifikasi }}</p>
                            </div>
                        @endif

                        <div class="pt-2 text-center text-xs text-slate-500">
                            Punya pertanyaan terkait pendaftaran? Hubungi email <a href="mailto:pusdatin.inaki@gmail.com" class="text-blue-600 font-semibold underline">pusdatin.inaki@gmail.com</a>.
                        </div>
                    </div>
                @else
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-md text-center space-y-4">
                        <div class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                            <span class="material-symbols-outlined text-[32px]">search_off</span>
                        </div>
                        <h3 class="text-base font-bold text-slate-800 font-headline">Data Pendaftaran Tidak Ditemukan</h3>
                        <p class="text-xs sm:text-sm text-slate-500 max-w-md mx-auto">
                            Tidak ada data anggota dengan kata kunci <code class="font-mono font-bold text-slate-700">"{{ $query }}"</code>. Pastikan nomor registrasi atau NIP yang Anda masukkan sudah benar.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('keanggotaan.daftar') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700">
                                <span>Belum mendaftar? Buka Formulir Pendaftaran</span>
                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                @endif
            @endif

        </div>
    </div>
</div>
@endsection

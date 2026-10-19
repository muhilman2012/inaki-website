@extends('layouts.admin')

@section('title', 'Verifikasi: ' . $member->nama)
@section('page-title', 'Detail Permohonan Keanggotaan')

@section('content')

    <!-- Breadcrumb & Back -->
    <div class="flex items-center justify-between gap-4 mb-2">
        <a href="{{ route('admin.anggota') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-600 hover:text-blue-600 transition font-medium">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            <span>Kembali ke Daftar Anggota</span>
        </a>
        <div class="flex items-center gap-2">
            <span class="text-xs text-slate-500 font-mono">Kode: <span class="font-bold text-slate-700">{{ $member->registration_code }}</span></span>
        </div>
    </div>

    <!-- Header Status Card -->
    <div class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div class="flex items-start sm:items-center gap-4">
            <div class="w-16 h-20 rounded-2xl bg-slate-100 border border-slate-200 overflow-hidden shrink-0 shadow-xs">
                @if($member->file_foto && file_exists(public_path('storage/' . $member->file_foto)))
                    <img src="{{ asset('storage/' . $member->file_foto) }}" alt="{{ $member->nama }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                        <span class="material-symbols-outlined text-[32px]">person</span>
                    </div>
                @endif
            </div>
            <div>
                <div class="flex items-center gap-2 flex-wrap">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 font-headline">{{ $member->nama }}</h2>
                    @if($member->isVerified())
                        <span class="px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>Terverifikasi Resmi</span>
                        </span>
                    @elseif($member->isRejected())
                        <span class="px-3 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">cancel</span>
                            <span>Ditolak</span>
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-xs font-bold flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            <span>Menunggu Verifikasi</span>
                        </span>
                    @endif
                </div>

                <p class="text-xs sm:text-sm text-slate-600 mt-1 font-medium">
                    {{ $member->jenis_jfak }} &bull; {{ $member->tipe_profesi }} (NIP: <span class="font-mono font-semibold">{{ $member->nip }}</span>)
                </p>
                <p class="text-xs text-slate-400 mt-0.5">
                    Mendaftar pada: {{ $member->created_at ? $member->created_at->translatedFormat('d F Y, H:i') : '-' }} WIB
                </p>
            </div>
        </div>

        <!-- Quick Status Pills -->
        <div class="flex flex-wrap items-center gap-3">
            @if($member->isVerified() && $member->nomor_kta)
                <div class="px-4 py-2.5 rounded-xl bg-blue-50 border border-blue-200 text-left">
                    <span class="text-[10px] text-blue-700 font-bold block uppercase tracking-wider">Nomor KTA Resmi:</span>
                    <span class="text-sm font-extrabold text-blue-900 font-mono tracking-wider">{{ $member->nomor_kta }}</span>
                </div>
            @endif

            @if(!$member->isPending())
                <form action="{{ route('admin.anggota.kembalikan', $member->id) }}" method="POST" onsubmit="return confirm('Kembalikan status pendaftaran ke Menunggu Verifikasi?')">
                    @csrf
                    <button type="submit" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-medium transition border border-slate-200 cursor-pointer">
                        Kembalikan ke Pending
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Main 2-Column Content -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Left Column: Detailed Information (7 Cols) -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Biodata Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs space-y-4">
                <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 border-b border-slate-100 pb-3">
                    <span class="material-symbols-outlined text-blue-600 text-[20px]">badge</span>
                    <span>1. Biodata Pribadi Calon Anggota</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="text-slate-500 block mb-0.5 font-medium">Nama Lengkap (Tanpa Gelar)</span>
                        <span class="font-bold text-slate-900 text-sm">{{ $member->nama }}</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="text-slate-500 block mb-0.5 font-medium">Tempat &amp; Tanggal Lahir</span>
                        <span class="font-bold text-slate-800">
                            {{ $member->tempat_lahir }}, {{ $member->tanggal_lahir ? $member->tanggal_lahir->translatedFormat('d F Y') : '-' }}
                        </span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="text-slate-500 block mb-0.5 font-medium">Jenis Kelamin</span>
                        <span class="font-bold text-slate-800">{{ $member->jenis_kelamin }}</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                        <span class="text-slate-500 block mb-0.5 font-medium">Agama</span>
                        <span class="font-bold text-slate-800">{{ $member->agama }}</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 sm:col-span-2">
                        <span class="text-slate-500 block mb-0.5 font-medium">Pendidikan Terakhir</span>
                        <span class="font-bold text-slate-800">{{ $member->pendidikan_terakhir }}</span>
                    </div>
                </div>
            </div>

            <!-- Kepegawaian & Organisasi Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs space-y-4">
                <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 border-b border-slate-100 pb-3">
                    <span class="material-symbols-outlined text-indigo-600 text-[20px]">domain</span>
                    <span>2. Data Jabatan JFAK &amp; Unit Kerja</span>
                </h3>

                <div class="space-y-3 text-xs">
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start justify-between gap-4">
                        <span class="text-slate-500 shrink-0 font-medium">Tipe Profesi</span>
                        <span class="px-2.5 py-1 rounded bg-blue-50 text-blue-700 font-bold border border-blue-200">
                            {{ $member->tipe_profesi }}
                        </span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start justify-between gap-4">
                        <span class="text-slate-500 shrink-0 font-medium">Jabatan / Jenjang JFAK</span>
                        <span class="font-bold text-slate-900 text-right">
                            {{ $member->jenis_jfak }}
                            @if($member->jenis_jfak_custom)
                                <span class="block text-[11px] text-slate-500 font-normal">({{ $member->jenis_jfak_custom }})</span>
                            @endif
                        </span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start justify-between gap-4">
                        <span class="text-slate-500 shrink-0 font-medium">NIP (Nomor Induk Pegawai)</span>
                        <span class="font-bold font-mono text-emerald-700 text-sm">{{ $member->nip }}</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start justify-between gap-4">
                        <span class="text-slate-500 shrink-0 font-medium">Pangkat &amp; Golongan</span>
                        <span class="font-bold text-slate-800">{{ $member->pangkat_gol }}</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                        <span class="text-slate-500 block font-medium">Nama Organisasi / Instansi Induk</span>
                        <span class="font-bold text-slate-900 text-sm block">{{ $member->nama_organisasi }}</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                        <span class="text-slate-500 block font-medium">Unit Organisasi / Eselon / OPD</span>
                        <span class="font-semibold text-slate-800 block">{{ $member->unit_organisasi }}</span>
                    </div>
                </div>
            </div>

            <!-- Kepakaran & Kontak Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs space-y-4">
                <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 border-b border-slate-100 pb-3">
                    <span class="material-symbols-outlined text-emerald-600 text-[20px]">psychology</span>
                    <span>3. Kepakaran Kebijakan &amp; Kontak</span>
                </h3>

                <div class="space-y-4 text-xs">
                    <div>
                        <span class="text-slate-500 block mb-2 font-medium">Bidang Kepakaran Terpilih:</span>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach((array) $member->kepakaran as $k)
                                <span class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-800 border border-emerald-200 font-semibold text-[11px]">
                                    {{ $k }}
                                </span>
                            @endforeach
                            @if($member->kepakaran_custom)
                                <span class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-800 border border-blue-200 font-semibold text-[11px]">
                                    {{ $member->kepakaran_custom }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
                            <span class="text-slate-500 font-medium">WhatsApp:</span>
                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $member->hp)) }}" target="_blank" class="font-bold text-emerald-700 hover:text-emerald-800 hover:underline flex items-center gap-1 font-mono">
                                <span>{{ $member->hp }}</span>
                                <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                            </a>
                        </div>

                        <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between">
                            <span class="text-slate-500 font-medium">Email:</span>
                            <a href="mailto:{{ $member->email }}" class="font-bold text-blue-700 hover:text-blue-800 hover:underline truncate max-w-[160px]">
                                {{ $member->email }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Verification Actions, File Previews & KTA Card (5 Cols) -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- KTA Digital Interactive Preview Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-5 shadow-xs relative overflow-hidden">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                    <span class="text-[11px] font-bold text-blue-700 uppercase tracking-wider flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[16px] text-blue-600">credit_card</span>
                        <span>Pratinjau KTA Digital INAKI</span>
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-mono border border-blue-200">Standar DPP 2026</span>
                </div>

                <!-- Realistic Digital KTA Card Widget -->
                <div class="rounded-2xl p-4 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 border border-blue-400/40 shadow-md relative text-white">
                    <!-- Top INAKI Header on KTA -->
                    <div class="flex items-center justify-between border-b border-blue-500/30 pb-2 mb-3">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('images/logo-header.png') }}" alt="Logo INAKI" class="h-6 w-auto">
                            <div>
                                <p class="text-[10px] font-extrabold tracking-wider leading-none">INAKI</p>
                                <p class="text-[8px] text-blue-300 uppercase leading-tight">Ikatan Analis Kebijakan Indonesia</p>
                            </div>
                        </div>
                        <span class="text-[8px] font-bold px-1.5 py-0.5 rounded bg-amber-400 text-slate-950">KTA DIGITAL</span>
                    </div>

                    <!-- KTA Body -->
                    <div class="flex items-start gap-3">
                        <div class="w-16 h-20 rounded-lg bg-slate-800 border-2 border-amber-400/80 overflow-hidden shrink-0 shadow">
                            @if($member->file_foto && file_exists(public_path('storage/' . $member->file_foto)))
                                <img src="{{ asset('storage/' . $member->file_foto) }}" alt="{{ $member->nama }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 text-[10px]">
                                    Foto 3x4
                                </div>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1 space-y-1">
                            <p class="font-extrabold text-xs text-white uppercase leading-snug truncate">{{ $member->nama }}</p>
                            <p class="text-[10px] font-mono text-emerald-300">NIP: {{ $member->nip }}</p>
                            <p class="text-[9px] text-blue-200 leading-tight truncate">{{ $member->jenis_jfak }}</p>
                            <p class="text-[8px] text-slate-300 uppercase leading-tight truncate">{{ $member->nama_organisasi }}</p>
                            
                            <div class="pt-1 flex items-center justify-between border-t border-slate-700/80 text-[8px] font-mono">
                                <span class="text-amber-300 font-bold">{{ $member->nomor_kta ?? 'KTA-INAKI-2026-XXXX' }}</span>
                                <span class="text-slate-400">Exp: 31/12/2027</span>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-[11px] text-slate-500 mt-3 text-center">
                    Data nama dan foto di atas akan otomatis digenerate ke format PDF KTA Digital.
                </p>
            </div>

            <!-- Uploaded Files Review Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs space-y-4">
                <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 border-b border-slate-100 pb-3">
                    <span class="material-symbols-outlined text-amber-600 text-[20px]">folder_open</span>
                    <span>4. Berkas Persyaratan Terunggah</span>
                </h3>

                <div class="space-y-3">
                    
                    <!-- File SK -->
                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 border border-blue-200 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[20px]">description</span>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-bold text-slate-900">SK Jabatan JFAK / Profesi</p>
                                <p class="text-[11px] text-slate-500 truncate font-mono">{{ basename($member->file_sk) }}</p>
                            </div>
                        </div>
                        @if($member->file_sk)
                            <a 
                                href="{{ asset('storage/' . $member->file_sk) }}" 
                                target="_blank" 
                                class="px-3 py-1.5 rounded-xl bg-white hover:bg-slate-100 text-blue-700 border border-slate-200 text-xs font-semibold shrink-0 transition shadow-2xs"
                            >
                                Periksa SK
                            </a>
                        @endif
                    </div>

                    <!-- File TF -->
                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[20px]">receipt_long</span>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-bold text-slate-900">Bukti Transfer Rp 150.000</p>
                                <p class="text-[11px] text-emerald-700 font-semibold font-mono">BNI Rek: 8881146255</p>
                            </div>
                        </div>
                        @if($member->file_tf)
                            <a 
                                href="{{ asset('storage/' . $member->file_tf) }}" 
                                target="_blank" 
                                class="px-3 py-1.5 rounded-xl bg-white hover:bg-slate-100 text-emerald-700 border border-slate-200 text-xs font-semibold shrink-0 transition shadow-2xs"
                            >
                                Cek Transfer
                            </a>
                        @endif
                    </div>

                    <!-- File Foto -->
                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 border border-purple-200 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[20px]">account_box</span>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-bold text-slate-900">Pas Foto 3x4 Asli</p>
                                <p class="text-[11px] text-slate-500 truncate font-mono">{{ basename($member->file_foto) }}</p>
                            </div>
                        </div>
                        @if($member->file_foto)
                            <a 
                                href="{{ asset('storage/' . $member->file_foto) }}" 
                                target="_blank" 
                                class="px-3 py-1.5 rounded-xl bg-white hover:bg-slate-100 text-purple-700 border border-slate-200 text-xs font-semibold shrink-0 transition shadow-2xs"
                            >
                                Lihat Foto
                            </a>
                        @endif
                    </div>

                </div>
            </div>

            <!-- Action Panel: Verifikasi / Tolak Permohonan -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs space-y-6">
                <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2 border-b border-slate-100 pb-3">
                    <span class="material-symbols-outlined text-blue-600 text-[20px]">gavel</span>
                    <span>5. Keputusan Verifikasi Administrator</span>
                </h3>

                <!-- FORM SETUJUI / VERIFIKASI -->
                <form action="{{ route('admin.anggota.verifikasi', $member->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Nomor KTA Digital Resmi (Otomatis / Custom)
                        </label>
                        <input 
                            type="text" 
                            name="custom_kta" 
                            value="{{ $member->nomor_kta ?? \App\Models\Member::generateKtaNumber() }}"
                            class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-900 font-mono font-bold focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">
                            Catatan Persetujuan (Opsional)
                        </label>
                        <textarea 
                            name="catatan_verifikasi" 
                            rows="2" 
                            placeholder="Contoh: Berkas persyaratan valid dan KTA Digital aktif."
                            class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >{{ $member->catatan_verifikasi ?? 'Berkas persyaratan lengkap, transfer tervalidasi, dan KTA Digital resmi diterbitkan.' }}</textarea>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-bold text-xs sm:text-sm shadow-sm transition flex items-center justify-center gap-2 cursor-pointer"
                    >
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        <span>{{ $member->isVerified() ? 'Perbarui Data Verifikasi & KTA' : 'Setujui & Terbitkan KTA Digital' }}</span>
                    </button>
                </form>

                <!-- FORM TOLAK DENGAN ALASAN -->
                @if(!$member->isRejected())
                    <div class="pt-4 border-t border-slate-100">
                        <form action="{{ route('admin.anggota.tolak', $member->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menolak permohonan keanggotaan ini?')">
                            @csrf
                            <div class="mb-3">
                                <label class="block text-xs font-bold text-rose-700 mb-1">
                                    Alasan Penolakan Permohonan:
                                </label>
                                <textarea 
                                    name="alasan_penolakan" 
                                    required 
                                    rows="2" 
                                    placeholder="Contoh: Bukti transfer kurang jelas / Jenjang SK tidak sesuai."
                                    class="w-full px-3.5 py-2 bg-rose-50/50 border border-rose-300 rounded-xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:bg-white transition"
                                ></textarea>
                            </div>

                            <button 
                                type="submit" 
                                class="w-full py-2.5 px-4 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-300 font-bold text-xs transition flex items-center justify-center gap-1.5 cursor-pointer"
                            >
                                <span class="material-symbols-outlined text-[16px]">cancel</span>
                                <span>Tolak Permohonan Keanggotaan</span>
                            </button>
                        </form>
                    </div>
                @endif

            </div>

        </div>

    </div>

@endsection

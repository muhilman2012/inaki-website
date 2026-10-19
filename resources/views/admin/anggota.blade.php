@extends('layouts.admin')

@section('title', 'Verifikasi Keanggotaan')
@section('page-title', 'Verifikasi & Database Keanggotaan')

@section('content')

    <!-- Top Action Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 font-headline">Manajemen Verifikasi Anggota INAKI</h2>
            <p class="text-xs sm:text-sm text-slate-600 mt-1">
                Validasi berkas SK jabatan, pas foto 3x4, dan bukti pembayaran transfer Rp 150.000 untuk penerbitan KTA Digital resmi.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a 
                href="{{ route('keanggotaan.daftar') }}" 
                target="_blank"
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm shadow-sm transition-all"
            >
                <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                <span>Buka Formulir Pendaftaran</span>
            </a>
        </div>
    </div>

    <!-- 4 Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total -->
        <a href="{{ route('admin.anggota', ['status' => 'all']) }}" class="p-4 rounded-2xl bg-white border {{ $status === 'all' ? 'border-blue-600 ring-2 ring-blue-600/20 shadow-sm' : 'border-slate-200/90 hover:border-slate-300' }} transition">
            <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Total Pendaftar</p>
            <p class="text-2xl font-extrabold text-slate-900 font-headline mt-1">{{ number_format($counts['total'], 0, ',', '.') }}</p>
            <p class="text-[11px] text-slate-400 mt-0.5">Semua permohonan</p>
        </a>

        <!-- Pending -->
        <a href="{{ route('admin.anggota', ['status' => 'pending']) }}" class="p-4 rounded-2xl bg-white border {{ $status === 'pending' ? 'border-amber-500 ring-2 ring-amber-500/20 shadow-sm' : 'border-slate-200/90 hover:border-slate-300' }} transition relative overflow-hidden">
            <p class="text-xs text-amber-600 font-bold uppercase tracking-wider">Menunggu Cek</p>
            <p class="text-2xl font-extrabold text-amber-600 font-headline mt-1">{{ number_format($counts['pending'], 0, ',', '.') }}</p>
            <p class="text-[11px] text-slate-400 mt-0.5">Perlu verifikasi SK &amp; TF</p>
        </a>

        <!-- Verified -->
        <a href="{{ route('admin.anggota', ['status' => 'verified']) }}" class="p-4 rounded-2xl bg-white border {{ $status === 'verified' ? 'border-emerald-500 ring-2 ring-emerald-500/20 shadow-sm' : 'border-slate-200/90 hover:border-slate-300' }} transition">
            <p class="text-xs text-emerald-600 font-bold uppercase tracking-wider">Terverifikasi</p>
            <p class="text-2xl font-extrabold text-emerald-600 font-headline mt-1">{{ number_format($counts['verified'], 0, ',', '.') }}</p>
            <p class="text-[11px] text-slate-400 mt-0.5">KTA Digital aktif</p>
        </a>

        <!-- Rejected -->
        <a href="{{ route('admin.anggota', ['status' => 'rejected']) }}" class="p-4 rounded-2xl bg-white border {{ $status === 'rejected' ? 'border-rose-500 ring-2 ring-rose-500/20 shadow-sm' : 'border-slate-200/90 hover:border-slate-300' }} transition">
            <p class="text-xs text-rose-600 font-bold uppercase tracking-wider">Ditolak</p>
            <p class="text-2xl font-extrabold text-rose-600 font-headline mt-1">{{ number_format($counts['rejected'], 0, ',', '.') }}</p>
            <p class="text-[11px] text-slate-400 mt-0.5">Berkas belum lengkap</p>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white border border-slate-200/90 rounded-2xl p-4 sm:p-5 shadow-xs space-y-4">
        <form action="{{ route('admin.anggota') }}" method="GET" class="flex flex-col lg:flex-row items-center justify-between gap-4">
            
            <!-- Status Tabs -->
            <div class="flex items-center gap-1.5 p-1 rounded-xl bg-slate-100 border border-slate-200 overflow-x-auto w-full lg:w-auto">
                <a 
                    href="{{ route('admin.anggota', array_merge(request()->query(), ['status' => 'all'])) }}" 
                    class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ $status === 'all' ? 'bg-white text-slate-900 shadow-xs' : 'text-slate-600 hover:text-slate-900' }}"
                >
                    Semua ({{ $counts['total'] }})
                </a>
                <a 
                    href="{{ route('admin.anggota', array_merge(request()->query(), ['status' => 'pending'])) }}" 
                    class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ $status === 'pending' ? 'bg-amber-500 text-slate-950 font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900' }}"
                >
                    Menunggu ({{ $counts['pending'] }})
                </a>
                <a 
                    href="{{ route('admin.anggota', array_merge(request()->query(), ['status' => 'verified'])) }}" 
                    class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ $status === 'verified' ? 'bg-emerald-600 text-white font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900' }}"
                >
                    Terverifikasi ({{ $counts['verified'] }})
                </a>
                <a 
                    href="{{ route('admin.anggota', array_merge(request()->query(), ['status' => 'rejected'])) }}" 
                    class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition {{ $status === 'rejected' ? 'bg-rose-600 text-white font-bold shadow-xs' : 'text-slate-600 hover:text-slate-900' }}"
                >
                    Ditolak ({{ $counts['rejected'] }})
                </a>
            </div>

            <!-- Tipe Profesi & Search Box -->
            <div class="flex items-center gap-3 w-full lg:w-auto">
                <input type="hidden" name="status" value="{{ $status }}">
                
                <select name="tipe" onchange="this.form.submit()" class="px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 shrink-0">
                    <option value="all">Semua Tipe</option>
                    <option value="PNS" {{ $tipe === 'PNS' ? 'selected' : '' }}>PNS</option>
                    <option value="PPPK" {{ $tipe === 'PPPK' ? 'selected' : '' }}>PPPK</option>
                    <option value="NON ASN" {{ $tipe === 'NON ASN' ? 'selected' : '' }}>Non-ASN</option>
                </select>

                <div class="relative flex-1 lg:w-64">
                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-slate-400 text-[18px]">search</span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ $search }}" 
                        placeholder="Cari Nama, NIP, KTA..." 
                        class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600"
                    >
                </div>

                <button type="submit" class="px-3.5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs transition shrink-0 cursor-pointer shadow-xs">
                    Cari
                </button>

                @if($search || $tipe !== 'all')
                    <a href="{{ route('admin.anggota', ['status' => $status]) }}" class="p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition" title="Reset Filter">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Members Table Card -->
    <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-[11px] uppercase tracking-wider text-slate-500 font-bold">
                        <th class="py-3.5 px-5">Calon Anggota</th>
                        <th class="py-3.5 px-4">Profesi &amp; Jabatan</th>
                        <th class="py-3.5 px-4">Instansi &amp; Unit Kerja</th>
                        <th class="py-3.5 px-4">Nomor KTA / Status</th>
                        <th class="py-3.5 px-4">Kelengkapan</th>
                        <th class="py-3.5 px-5 text-right">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($members as $member)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <!-- Calon Anggota -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 overflow-hidden shrink-0 flex items-center justify-center">
                                        @if($member->file_foto && file_exists(public_path('storage/' . $member->file_foto)))
                                            <img src="{{ asset('storage/' . $member->file_foto) }}" alt="{{ $member->nama }}" class="w-full h-full object-cover">
                                        @else
                                            <span class="material-symbols-outlined text-[20px] text-slate-400">person</span>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <a href="{{ route('admin.anggota.detail', $member->id) }}" class="font-bold text-slate-900 hover:text-blue-600 transition text-xs sm:text-sm block truncate">
                                            {{ $member->nama }}
                                        </a>
                                        <p class="text-[11px] text-slate-500 font-mono mt-0.5">
                                            NIP: {{ $member->nip }} &bull; {{ $member->registration_code }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <!-- Profesi & Jabatan -->
                            <td class="py-4 px-4">
                                <p class="font-semibold text-slate-900 text-xs truncate max-w-xs">{{ $member->jenis_jfak }}</p>
                                <div class="flex items-center gap-1.5 mt-1">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200">
                                        {{ $member->tipe_profesi }}
                                    </span>
                                    <span class="text-[11px] text-slate-500">{{ $member->pendidikan_terakhir }}</span>
                                </div>
                            </td>

                            <!-- Instansi -->
                            <td class="py-4 px-4 text-xs">
                                <p class="font-medium text-slate-800 truncate max-w-xs">{{ $member->nama_organisasi }}</p>
                                <p class="text-[11px] text-slate-500 truncate max-w-xs mt-0.5">{{ $member->unit_organisasi }}</p>
                            </td>

                            <!-- Nomor KTA / Status -->
                            <td class="py-4 px-4">
                                @if($member->isVerified())
                                    <div class="space-y-0.5">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-bold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Terverifikasi
                                        </span>
                                        <p class="text-[11px] font-mono font-bold text-blue-600 block">{{ $member->nomor_kta }}</p>
                                    </div>
                                @elseif($member->isRejected())
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-rose-50 text-rose-700 border border-rose-200 text-[11px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                        Ditolak
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200 text-[11px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Menunggu Cek
                                    </span>
                                @endif
                            </td>

                            <!-- Kelengkapan Berkas -->
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-1 text-[11px]">
                                    <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-mono font-semibold" title="SK Jabatan">SK</span>
                                    <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 font-mono font-semibold" title="Bukti Transfer">TF</span>
                                    <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200 font-mono font-semibold" title="Pas Foto">3x4</span>
                                </div>
                            </td>

                            <!-- Tindakan -->
                            <td class="py-4 px-5 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <a 
                                        href="{{ route('admin.anggota.detail', $member->id) }}" 
                                        class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs transition shadow-2xs cursor-pointer"
                                    >
                                        <span>Periksa</span>
                                        <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <span class="material-symbols-outlined text-[36px] block mx-auto mb-2 text-slate-300">group_off</span>
                                <p class="text-sm font-semibold text-slate-600">Tidak ada data anggota ditemukan</p>
                                <p class="text-xs text-slate-400 mt-1">Coba sesuaikan filter status atau kata kunci pencarian Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($members->hasPages())
            <div class="p-4 border-t border-slate-200 bg-slate-50 flex items-center justify-between text-xs text-slate-600">
                {{ $members->links() }}
            </div>
        @endif
    </div>

@endsection

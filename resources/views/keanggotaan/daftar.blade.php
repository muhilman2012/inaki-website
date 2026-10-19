@extends('layouts.app', ['title' => 'Formulir Pendaftaran Anggota Resmi - INAKI'])

@section('content')
<div class="flex flex-col w-full">
    {{-- Unified Breadcrumb (Tanpa info badge sesuai permintaan) --}}
    <x-breadcrumb 
        :items="[
            ['label' => 'Keanggotaan', 'url' => route('keanggotaan')],
            ['label' => 'Formulir Pendaftaran']
        ]" 
    />

    {{-- Gaya Khusus: Alert Pinggiran Merah jika Kolom Belum Diisi / Invalid (Bukan Warna Biru) --}}
    <style>
        /* Pinggiran/Ring MERAH tegas saat kolom required belum diisi atau error */
        input:invalid:focus,
        select:invalid:focus,
        textarea:invalid:focus,
        input.field-error,
        select.field-error,
        textarea.field-error,
        input.field-error:focus,
        select.field-error:focus,
        textarea.field-error:focus {
            border-color: #e11d48 !important; /* rose-600 */
            box-shadow: 0 0 0 3px rgba(225, 29, 72, 0.28) !important;
            background-color: #fff1f2 !important;
            outline: none !important;
        }
    </style>

    <div class="w-full bg-slate-50 min-h-screen py-8 sm:py-12" x-data="{
        tipeProfesi: '{{ old('tipe_profesi', 'PNS') }}',
        jenisJfak: '{{ old('jenis_jfak', 'ANALIS KEBIJAKAN AHLI PERTAMA') }}',
        nip: '{{ old('nip', '') }}',
        pangkatGol: '{{ old('pangkat_gol', '') }}',
        fotoPreview: null,
        skFileName: '',
        tfFileName: '',
        hasCustomKepakaran: {{ in_array('Yang lain', (array) old('kepakaran', [])) ? 'true' : 'false' }},
        isSubmitting: false,
        errors: {},

        init() {
            if (!this.pangkatGol) {
                this.updateProfesiDefaults();
            }
        },

        updateProfesiDefaults() {
            if (this.tipeProfesi === 'NON ASN') {
                if (!this.nip || this.nip === '') this.nip = '-';
                this.pangkatGol = '-';
            } else {
                if (this.nip === '-') this.nip = '';
                if (this.pangkatGol === '-') this.pangkatGol = '';
            }
        },

        previewFoto(event) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 1024 * 1024) {
                    alert('Ukuran pas foto melebihi 1 MB. Mohon pilih foto dengan ukuran lebih kecil.');
                    event.target.value = '';
                    this.fotoPreview = null;
                    return;
                }
                const reader = new FileReader();
                reader.onload = (e) => { this.fotoPreview = e.target.result; };
                reader.readAsDataURL(file);
                this.errors['file_foto'] = false;
            }
        },

        checkFileSize(event, type) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 1024 * 1024) {
                    alert('Ukuran berkas melebihi batas maksimum 1 MB. Mohon kompres berkas terlebih dahulu.');
                    event.target.value = '';
                    if (type === 'sk') this.skFileName = '';
                    if (type === 'tf') this.tfFileName = '';
                    return;
                }
                if (type === 'sk') {
                    this.skFileName = file.name;
                    this.errors['file_sk'] = false;
                }
                if (type === 'tf') {
                    this.tfFileName = file.name;
                    this.errors['file_tf'] = false;
                }
            }
        }
    }">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Card -->
            <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 rounded-3xl p-6 sm:p-10 text-white shadow-xl mb-8 relative overflow-hidden">
                <div class="relative z-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md text-blue-200 text-xs font-semibold uppercase tracking-wider mb-3">
                        <span class="material-symbols-outlined text-[16px]">how_to_reg</span>
                        <span>Registrasi Keanggotaan Nasional</span>
                    </div>
                    <h1 class="text-2xl sm:text-4xl font-extrabold font-headline tracking-tight">
                        Pendaftaran Anggota INAKI
                    </h1>
                    <p class="text-blue-100 text-xs sm:text-sm mt-3 leading-relaxed max-w-2xl">
                        Silakan isi formulir di bawah ini untuk mendaftar sebagai Anggota Ikatan Nasional Analis Kebijakan (INAKI). Pastikan semua data diisi dengan benar untuk keperluan administrasi keanggotaan dan pencetakan Kartu Tanda Anggota (KTA) digital.
                    </p>
                </div>

                <!-- Subtle Logo Watermark -->
                <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none select-none">
                    <span class="material-symbols-outlined text-[240px]">badge</span>
                </div>
            </div>

            <!-- Persyaratan & Instruksi Pembayaran Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-8 space-y-6">
                <h2 class="text-lg font-bold text-slate-900 font-headline flex items-center gap-2">
                    <span class="material-symbols-outlined text-blue-600">verified</span>
                    <span>Instruksi &amp; Rincian Biaya Keanggotaan</span>
                </h2>

                <!-- 3 Langkah Persyaratan -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs sm:text-sm">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex flex-col justify-between">
                        <div>
                            <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 font-bold flex items-center justify-center mb-2">1</div>
                            <p class="font-bold text-slate-800">Unggah SK JFAK</p>
                            <p class="text-slate-600 text-xs mt-1">SK JFAK terbaru jenjang terakhir (ASN), atau SK Jabatan/Profesi saat ini (Non ASN). Maks 1 MB (PDF/JPG/PNG).</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex flex-col justify-between">
                        <div>
                            <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 font-bold flex items-center justify-center mb-2">2</div>
                            <p class="font-bold text-slate-800">Pas Foto 3x4 Berwarna</p>
                            <p class="text-slate-600 text-xs mt-1">Latar belakang polos/berwarna, pandangan lurus. Dicetak otomatis pada KTA Digital. Maks 1 MB (JPG/PNG).</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex flex-col justify-between">
                        <div>
                            <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 font-bold flex items-center justify-center mb-2">3</div>
                            <p class="font-bold text-slate-800">Transfer Biaya Rp 150.000</p>
                            <p class="text-slate-600 text-xs mt-1">1 kali transaksi. Uang Pangkal Rp 50.000 + Iuran Tahunan Rp 100.000 = Rp 150.000. Tuliskan nama Anda pada berita transfer.</p>
                        </div>
                    </div>
                </div>

                <!-- Rekening Bank BNI Highlight Box -->
                <div class="p-5 rounded-2xl bg-gradient-to-r from-emerald-50 via-teal-50 to-blue-50 border border-emerald-200/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-md">
                            <span class="material-symbols-outlined text-[24px]">account_balance</span>
                        </div>
                        <div>
                            <span class="text-[11px] font-bold text-emerald-800 uppercase tracking-wider">Rekening Resmi Pembayaran Pendaftaran INAKI</span>
                            <div class="flex items-center gap-2 mt-0.5">
                                <span class="text-lg sm:text-xl font-extrabold text-slate-900 font-mono tracking-wider">8881146255</span>
                                <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[10px] font-bold">Bank BNI</span>
                            </div>
                            <p class="text-xs text-slate-600 font-medium">a.n. <strong class="text-slate-800">Ikatan Nasional Analis Kebijakan (perkumpulan)</strong></p>
                        </div>
                    </div>
                    <div class="shrink-0 text-left sm:text-right">
                        <span class="text-[11px] text-slate-500 block">Total Pembayaran</span>
                        <span class="text-xl font-extrabold text-emerald-700 font-headline">Rp 150.000</span>
                        <span class="text-[10px] text-slate-500 block">(1 kali transaksi)</span>
                    </div>
                </div>
            </div>

            <!-- Flash Validation Errors (Server Feedback) -->
            @if($errors->any())
                <div class="mb-8 p-5 rounded-3xl bg-rose-50 border border-rose-200 text-rose-800 shadow-sm">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-[24px] text-rose-600 shrink-0">error</span>
                        <div>
                            <h3 class="text-sm font-bold text-rose-900">Terdapat beberapa kesalahan pengisian formulir:</h3>
                            <ul class="list-disc list-inside text-xs mt-2 space-y-1 text-rose-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Formulir Pendaftaran Penuh -->
            <form 
                action="{{ route('keanggotaan.daftar.submit') }}" 
                method="POST" 
                enctype="multipart/form-data" 
                @invalid.capture="errors[$event.target.name] = true"
                @submit="isSubmitting = true"
                class="space-y-8"
            >
                @csrf

                <!-- BAGIAN 1: BIODATA PRIBADI -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-600 text-[22px]">person</span>
                            <span>Bagian 1: Data Pribadi Calon Anggota</span>
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Identitas resmi yang akan tercantum pada Kartu Tanda Anggota (KTA) Digital INAKI.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- NAMA LENGKAP -->
                        <div class="sm:col-span-2">
                            <label for="nama" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nama Lengkap Tanpa Gelar <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="nama" 
                                id="nama" 
                                required 
                                value="{{ old('nama') }}"
                                placeholder="Contoh: Ahmad Fauzi Ridwan" 
                                style="text-transform: uppercase;"
                                @input="$event.target.value = $event.target.value.toUpperCase(); errors['nama'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 font-semibold placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['nama'] || @json($errors->has('nama')) }"
                            >
                            <p x-show="errors['nama'] || @json($errors->has('nama'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Nama lengkap wajib diisi.</span>
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1">Tuliskan nama lengkap tanpa gelar (akan dicetak langsung pada KTA Digital).</p>
                        </div>

                        <!-- TEMPAT LAHIR -->
                        <div>
                            <label for="tempat_lahir" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Tempat Lahir <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="tempat_lahir" 
                                id="tempat_lahir" 
                                required 
                                value="{{ old('tempat_lahir') }}"
                                placeholder="Contoh: Jakarta" 
                                style="text-transform: uppercase;"
                                @input="$event.target.value = $event.target.value.toUpperCase(); errors['tempat_lahir'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['tempat_lahir'] || @json($errors->has('tempat_lahir')) }"
                            >
                            <p x-show="errors['tempat_lahir'] || @json($errors->has('tempat_lahir'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Tempat lahir wajib diisi.</span>
                            </p>
                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div>
                            <label for="tanggal_lahir" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Tanggal Lahir <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="date" 
                                name="tanggal_lahir" 
                                id="tanggal_lahir" 
                                required 
                                value="{{ old('tanggal_lahir') }}"
                                @change="errors['tanggal_lahir'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['tanggal_lahir'] || @json($errors->has('tanggal_lahir')) }"
                            >
                            <p x-show="errors['tanggal_lahir'] || @json($errors->has('tanggal_lahir'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Tanggal lahir wajib dipilih.</span>
                            </p>
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div>
                            <label for="jenis_kelamin" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Jenis Kelamin <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                name="jenis_kelamin" 
                                id="jenis_kelamin" 
                                required
                                @change="errors['jenis_kelamin'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['jenis_kelamin'] || @json($errors->has('jenis_kelamin')) }"
                            >
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="LAKI-LAKI" {{ old('jenis_kelamin') === 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                                <option value="PEREMPUAN" {{ old('jenis_kelamin') === 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                            </select>
                            <p x-show="errors['jenis_kelamin'] || @json($errors->has('jenis_kelamin'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Jenis kelamin wajib dipilih.</span>
                            </p>
                        </div>

                        <!-- AGAMA -->
                        <div>
                            <label for="agama" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Agama <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                name="agama" 
                                id="agama" 
                                required
                                @change="errors['agama'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['agama'] || @json($errors->has('agama')) }"
                            >
                                <option value="">-- Pilih Agama --</option>
                                <option value="ISLAM" {{ old('agama') === 'ISLAM' ? 'selected' : '' }}>ISLAM</option>
                                <option value="KRISTEN PROTESTAN" {{ old('agama') === 'KRISTEN PROTESTAN' ? 'selected' : '' }}>KRISTEN PROTESTAN</option>
                                <option value="KATOLIK" {{ old('agama') === 'KATOLIK' ? 'selected' : '' }}>KATOLIK</option>
                                <option value="HINDU" {{ old('agama') === 'HINDU' ? 'selected' : '' }}>HINDU</option>
                                <option value="BUDDHA" {{ old('agama') === 'BUDDHA' ? 'selected' : '' }}>BUDDHA</option>
                                <option value="KHONGHUCU" {{ old('agama') === 'KHONGHUCU' ? 'selected' : '' }}>KHONGHUCU</option>
                                <option value="LAINNYA" {{ old('agama') === 'LAINNYA' ? 'selected' : '' }}>LAINNYA</option>
                            </select>
                            <p x-show="errors['agama'] || @json($errors->has('agama'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Agama wajib dipilih.</span>
                            </p>
                        </div>

                        <!-- PENDIDIKAN TERAKHIR -->
                        <div class="sm:col-span-2">
                            <label for="pendidikan_terakhir" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Pendidikan Terakhir <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                name="pendidikan_terakhir" 
                                id="pendidikan_terakhir" 
                                required
                                @change="errors['pendidikan_terakhir'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['pendidikan_terakhir'] || @json($errors->has('pendidikan_terakhir')) }"
                            >
                                <option value="">-- Pilih Pendidikan Terakhir --</option>
                                <option value="DIPLOMA III (D3)" {{ old('pendidikan_terakhir') === 'DIPLOMA III (D3)' ? 'selected' : '' }}>DIPLOMA III (D3)</option>
                                <option value="DIPLOMA IV (D4)" {{ old('pendidikan_terakhir') === 'DIPLOMA IV (D4)' ? 'selected' : '' }}>DIPLOMA IV (D4)</option>
                                <option value="STRATA 1 (S1)" {{ old('pendidikan_terakhir') === 'STRATA 1 (S1)' ? 'selected' : '' }}>STRATA 1 (S1)</option>
                                <option value="MAGISTER / STRATA 2 (S2)" {{ old('pendidikan_terakhir') === 'MAGISTER / STRATA 2 (S2)' ? 'selected' : '' }}>MAGISTER / STRATA 2 (S2)</option>
                                <option value="DOKTOR / STRATA 3 (S3)" {{ old('pendidikan_terakhir') === 'DOKTOR / STRATA 3 (S3)' ? 'selected' : '' }}>DOKTOR / STRATA 3 (S3)</option>
                            </select>
                            <p x-show="errors['pendidikan_terakhir'] || @json($errors->has('pendidikan_terakhir'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Pendidikan terakhir wajib dipilih.</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 2: PROFESI, JFAK & KEPEGAWAIAN -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-600 text-[22px]">work</span>
                            <span>Bagian 2: Tipe Profesi &amp; Jabatan JFAK</span>
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Klasifikasi jenjang analis kebijakan dan data kepegawaian bagi ASN maupun Non-ASN.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- TIPE PROFESI -->
                        <div>
                            <label for="tipe_profesi" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Tipe Profesi Saudara <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                name="tipe_profesi" 
                                id="tipe_profesi" 
                                x-model="tipeProfesi"
                                @change="updateProfesiDefaults()"
                                required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition font-semibold"
                            >
                                <option value="PNS">PNS (Pegawai Negeri Sipil)</option>
                                <option value="PPPK">PPPK (Pegawai Pemerintah dg Perjanjian Kerja)</option>
                                <option value="CPNS">CPNS (Calon Pegawai Negeri Sipil)</option>
                                <option value="NON ASN">NON ASN (Praktisi / Akademisi / Profesional)</option>
                            </select>
                        </div>

                        <!-- JENIS JFAK -->
                        <div>
                            <label for="jenis_jfak" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Jenis JFAK Saat Ini <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                name="jenis_jfak" 
                                id="jenis_jfak" 
                                x-model="jenisJfak"
                                required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition font-medium"
                            >
                                <option value="ANALIS KEBIJAKAN AHLI PERTAMA">ANALIS KEBIJAKAN AHLI PERTAMA</option>
                                <option value="ANALIS KEBIJAKAN AHLI MUDA">ANALIS KEBIJAKAN AHLI MUDA</option>
                                <option value="ANALIS KEBIJAKAN AHLI MADYA">ANALIS KEBIJAKAN AHLI MADYA</option>
                                <option value="ANALIS KEBIJAKAN AHLI UTAMA">ANALIS KEBIJAKAN AHLI UTAMA</option>
                                <option value="PRAKTISI">PRAKTISI</option>
                                <option value="AKADEMISI KEBIJAKAN PUBLIK">AKADEMISI KEBIJAKAN PUBLIK</option>
                                <option value="LAINNYA">LAINNYA (Tuliskan Sendiri)</option>
                            </select>
                        </div>

                        <!-- INPUT JFAK LAINNYA JIKA DIPILIH -->
                        <div class="sm:col-span-2" x-show="jenisJfak === 'LAINNYA'" style="display: none;">
                            <label for="jenis_jfak_custom" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Tuliskan Jenis Profesi / Jabatan Lainnya <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="jenis_jfak_custom" 
                                id="jenis_jfak_custom" 
                                value="{{ old('jenis_jfak_custom') }}"
                                placeholder="Contoh: Peneliti Kebijakan Publik" 
                                style="text-transform: uppercase;"
                                @input="$event.target.value = $event.target.value.toUpperCase(); errors['jenis_jfak_custom'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['jenis_jfak_custom'] || @json($errors->has('jenis_jfak_custom')) }"
                            >
                        </div>

                        <!-- NIP -->
                        <div>
                            <label for="nip" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nomor Induk Pegawai (NIP) <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="nip" 
                                id="nip" 
                                x-model="nip"
                                required 
                                placeholder="18 Digit (Tanpa Spasi) atau tanda -" 
                                @input="errors['nip'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 font-mono placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['nip'] || @json($errors->has('nip')) }"
                            >
                            <p x-show="errors['nip'] || @json($errors->has('nip'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Nomor NIP wajib diisi (isikan tanda strip - jika Non-ASN).</span>
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1">
                                Khusus ASN (CPNS, PNS, PPPK = 18 digit). <strong>Bagi Non ASN isikan tanda strip (-)</strong>.
                            </p>
                        </div>

                        <!-- PANGKAT / GOLONGAN (DROPDOWN STANDAR NASIONAL) -->
                        <div>
                            <label for="pangkat_gol" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Pangkat &amp; Golongan <span class="text-rose-500">*</span>
                            </label>
                            <select 
                                name="pangkat_gol" 
                                id="pangkat_gol" 
                                x-model="pangkatGol"
                                required 
                                @change="errors['pangkat_gol'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['pangkat_gol'] || @json($errors->has('pangkat_gol')) }"
                            >
                                <option value="">-- Pilih Pangkat &amp; Golongan --</option>
                                
                                <optgroup label="Khusus Non ASN">
                                    <option value="-">- (Non ASN / Tidak Memiliki Golongan)</option>
                                </optgroup>

                                <optgroup label="Pangkat &amp; Golongan Ruang PNS">
                                    <option value="Juru Muda / I/a">Juru Muda / I/a</option>
                                    <option value="Juru Muda Tingkat I / I/b">Juru Muda Tingkat I / I/b</option>
                                    <option value="Juru / I/c">Juru / I/c</option>
                                    <option value="Juru Tingkat I / I/d">Juru Tingkat I / I/d</option>
                                    <option value="Pengatur Muda / II/a">Pengatur Muda / II/a</option>
                                    <option value="Pengatur Muda Tingkat I / II/b">Pengatur Muda Tingkat I / II/b</option>
                                    <option value="Pengatur / II/c">Pengatur / II/c</option>
                                    <option value="Pengatur Tingkat I / II/d">Pengatur Tingkat I / II/d</option>
                                    <option value="Penata Muda / III/a">Penata Muda / III/a</option>
                                    <option value="Penata Muda Tingkat I / III/b">Penata Muda Tingkat I / III/b</option>
                                    <option value="Penata / III/c">Penata / III/c</option>
                                    <option value="Penata Tingkat I / III/d">Penata Tingkat I / III/d</option>
                                    <option value="Pembina / IV/a">Pembina / IV/a</option>
                                    <option value="Pembina Tingkat I / IV/b">Pembina Tingkat I / IV/b</option>
                                    <option value="Pembina Utama Muda / IV/c">Pembina Utama Muda / IV/c</option>
                                    <option value="Pembina Utama Madya / IV/d">Pembina Utama Madya / IV/d</option>
                                    <option value="Pembina Utama / IV/e">Pembina Utama / IV/e</option>
                                </optgroup>

                                <optgroup label="Golongan PPPK">
                                    <option value="PPPK, IX (AHLI PERTAMA)">PPPK, IX (AHLI PERTAMA)</option>
                                    <option value="PPPK, X (AHLI PERTAMA)">PPPK, X (AHLI PERTAMA)</option>
                                    <option value="PPPK, XI (AHLI MUDA)">PPPK, XI (AHLI MUDA)</option>
                                    <option value="PPPK, XII (AHLI MADYA)">PPPK, XII (AHLI MADYA)</option>
                                    <option value="PPPK, XIII (AHLI MADYA)">PPPK, XIII (AHLI MADYA)</option>
                                    <option value="PPPK, XIV (AHLI UTAMA)">PPPK, XIV (AHLI UTAMA)</option>
                                    <option value="PPPK, XV (AHLI UTAMA)">PPPK, XV (AHLI UTAMA)</option>
                                    <option value="PPPK, XVI (AHLI UTAMA)">PPPK, XVI (AHLI UTAMA)</option>
                                    <option value="PPPK, XVII (AHLI UTAMA)">PPPK, XVII (AHLI UTAMA)</option>
                                </optgroup>
                            </select>
                            <p x-show="errors['pangkat_gol'] || @json($errors->has('pangkat_gol'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Pangkat &amp; Golongan wajib dipilih.</span>
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1">
                                Pilih sesuai SK pangkat terakhir. Bagi Non-ASN otomatis terisi strip (-).
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 3: ORGANISASI & UNIT KERJA -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-600 text-[22px]">corporate_fare</span>
                            <span>Bagian 3: Nama &amp; Unit Organisasi</span>
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Pertanyaan ini akan dimasukkan ke dalam KTA Digital. Tulis lengkap, jangan disingkat!</p>
                    </div>

                    <div class="space-y-5">
                        <!-- NAMA ORGANISASI -->
                        <div>
                            <label for="nama_organisasi" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nama Organisasi / Instansi Induk <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="nama_organisasi" 
                                id="nama_organisasi" 
                                required 
                                value="{{ old('nama_organisasi') }}"
                                placeholder="Contoh: Kementerian Kesehatan / Lembaga Administrasi Negara / Pemerintah Provinsi Jawa Barat" 
                                style="text-transform: uppercase;"
                                @input="$event.target.value = $event.target.value.toUpperCase(); errors['nama_organisasi'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 font-semibold placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['nama_organisasi'] || @json($errors->has('nama_organisasi')) }"
                            >
                            <p x-show="errors['nama_organisasi'] || @json($errors->has('nama_organisasi'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Nama instansi organisasi wajib diisi lengkap.</span>
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1">
                                Tuliskan nama organisasi lengkap tidak disingkat. Contoh: <em>Kementerian Agama</em>, <em>Lembaga Administrasi Negara</em>, <em>Pemerintah Kabupaten Bogor</em>.
                            </p>
                        </div>

                        <!-- UNIT ORGANISASI -->
                        <div>
                            <label for="unit_organisasi" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Unit Organisasi / Eselon / OPD <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="unit_organisasi" 
                                id="unit_organisasi" 
                                required 
                                value="{{ old('unit_organisasi') }}"
                                placeholder="Contoh: Direktorat Jenderal Strategi Pertahanan / Dinas Pendidikan" 
                                style="text-transform: uppercase;"
                                @input="$event.target.value = $event.target.value.toUpperCase(); errors['unit_organisasi'] = false"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 font-semibold placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                :class="{ 'field-error': errors['unit_organisasi'] || @json($errors->has('unit_organisasi')) }"
                            >
                            <p x-show="errors['unit_organisasi'] || @json($errors->has('unit_organisasi'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Unit organisasi / eselon / OPD wajib diisi.</span>
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1">
                                Unit Eselon I di K/L atau Unit Eselon II / OPD / SKPD di Pemda. Tidak perlu mengulang nama instansi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 4: BIDANG KEPAKARAN -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-600 text-[22px]">psychology</span>
                            <span>Bagian 4: Bidang Kepakaran &amp; Minat Kebijakan</span>
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Pilih minimal 1 (satu) bidang kepakaran Saudara. Saudara dapat memilih lebih dari satu opsi.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                        @php
                            $listKepakaran = [
                                'KESEHATAN',
                                'PENDIDIKAN',
                                'EKONOMI DAN KEUANGAN',
                                'LINGKUNGAN DAN KEHUTANAN',
                                'PERTANIAN DAN KETAHANAN PANGAN',
                                'PERTAHANAN DAN KEAMANAN',
                                'HUKUM DAN HAM',
                                'SOSIAL DAN KEPENDUDUKAN',
                                'INFRASTRUKTUR DAN TRANSPORTASI',
                                'TEKNOLOGI DAN INOVASI',
                                'LUAR NEGERI DAN DIPLOMASI',
                                'ADMINISTRASI DAN REFORMASI BIROKRASI',
                                'OTONOMI DAERAH DAN DESA',
                            ];
                            $oldKepakaran = (array) old('kepakaran', []);
                        @endphp

                        @foreach($listKepakaran as $kep)
                            <label class="flex items-start gap-3 p-3.5 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-blue-50/50 hover:border-blue-300 transition cursor-pointer select-none">
                                <input 
                                    type="checkbox" 
                                    name="kepakaran[]" 
                                    value="{{ $kep }}"
                                    {{ in_array($kep, $oldKepakaran) ? 'checked' : '' }}
                                    class="mt-0.5 w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500 cursor-pointer"
                                >
                                <span class="text-xs font-semibold text-slate-800 leading-snug">{{ $kep }}</span>
                            </label>
                        @endforeach

                        <!-- Checkbox Yang Lain -->
                        <label class="flex items-start gap-3 p-3.5 rounded-2xl border border-slate-200 bg-slate-50 hover:bg-blue-50/50 hover:border-blue-300 transition cursor-pointer select-none">
                            <input 
                                type="checkbox" 
                                name="kepakaran[]" 
                                value="Yang lain"
                                x-model="hasCustomKepakaran"
                                {{ in_array('Yang lain', $oldKepakaran) ? 'checked' : '' }}
                                class="mt-0.5 w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500 cursor-pointer"
                            >
                            <span class="text-xs font-semibold text-slate-800 leading-snug">Yang Lain (Tuliskan)</span>
                        </label>
                    </div>

                    <!-- Input Kepakaran Custom -->
                    <div x-show="hasCustomKepakaran" style="display: none;" class="pt-2">
                        <label for="kepakaran_custom" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Tuliskan Bidang Kepakaran Lainnya:
                        </label>
                        <input 
                            type="text" 
                            name="kepakaran_custom" 
                            id="kepakaran_custom" 
                            value="{{ old('kepakaran_custom') }}"
                            placeholder="Contoh: Tata Kelola Pemerintahan" 
                            style="text-transform: uppercase;"
                            @input="$event.target.value = $event.target.value.toUpperCase()"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                        >
                    </div>
                </div>

                <!-- BAGIAN 5: KONTAK RESMI CALON ANGGOTA -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-600 text-[22px]">contact_phone</span>
                            <span>Bagian 5: Saluran Komunikasi &amp; Notifikasi</span>
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Pastikan nomor WhatsApp dan email aktif untuk penerimaan link grup dan verifikasi keanggotaan.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- NOMOR WHATSAPP -->
                        <div>
                            <label for="hp" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nomor HP / WhatsApp Aktif <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute inset-y-0 left-3.5 flex items-center text-slate-400 text-[20px] pointer-events-none">phone</span>
                                <input 
                                    type="tel" 
                                    name="hp" 
                                    id="hp" 
                                    required 
                                    value="{{ old('hp') }}"
                                    placeholder="08xxxxxxxxxx" 
                                    @input="errors['hp'] = false"
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 font-medium placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                    :class="{ 'field-error': errors['hp'] || @json($errors->has('hp')) }"
                                >
                            </div>
                            <p x-show="errors['hp'] || @json($errors->has('hp'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Nomor WhatsApp aktif wajib diisi.</span>
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1">Sebagai verifikasi nomor untuk dimasukkan ke dalam Grup WhatsApp resmi INAKI.</p>
                        </div>

                        <!-- ALAMAT EMAIL -->
                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Alamat Email Aktif <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute inset-y-0 left-3.5 flex items-center text-slate-400 text-[20px] pointer-events-none">mail</span>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    required 
                                    value="{{ old('email') }}"
                                    placeholder="nama@instansi.go.id" 
                                    @input="errors['email'] = false"
                                    class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-900 font-medium placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                                    :class="{ 'field-error': errors['email'] || @json($errors->has('email')) }"
                                >
                            </div>
                            <p x-show="errors['email'] || @json($errors->has('email'))" class="text-[11px] text-rose-600 font-semibold mt-1.5 flex items-center gap-1" style="display: none;">
                                <span class="material-symbols-outlined text-[14px]">error</span>
                                <span>Alamat email aktif wajib diisi.</span>
                            </p>
                            <p class="text-[11px] text-slate-500 mt-1">Semua notifikasi dikirim ke email ini. Email resmi keanggotaan: <strong class="text-slate-800">pusdatin.inaki@gmail.com</strong>.</p>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 6: UNGGAH BERKAS PERSYARATAN -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-slate-900 font-headline flex items-center gap-2">
                            <span class="material-symbols-outlined text-blue-600 text-[22px]">upload_file</span>
                            <span>Bagian 6: Unggah Berkas Persyaratan (Maks. 1 MB per file)</span>
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Unggah berkas sesuai format yang telah ditentukan.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <!-- UPLOAD SK JABATAN -->
                        <div 
                            class="p-5 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between space-y-4 transition"
                            :class="{ 'field-error': errors['file_sk'] || @json($errors->has('file_sk')) }"
                        >
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-symbols-outlined text-blue-600 text-[22px]">description</span>
                                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Berkas SK JFAK / Profesi <span class="text-rose-500">*</span></h4>
                                </div>
                                <p class="text-[11px] text-slate-600 leading-relaxed">
                                    SK Jabatan JFAK terbaru jenjang terakhir bagi ASN, atau SK Profesi terakhir bagi Non-ASN.
                                </p>
                                <span class="inline-block mt-2 px-2 py-0.5 rounded text-[10px] font-bold bg-slate-200 text-slate-700">PDF / JPG / PNG &bull; Maks 1 MB</span>
                            </div>

                            <div>
                                <input 
                                    type="file" 
                                    name="file_sk" 
                                    id="file_sk" 
                                    required 
                                    accept=".pdf,.jpg,.jpeg,.png"
                                    @change="checkFileSize($event, 'sk')"
                                    class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer"
                                >
                                <p x-show="errors['file_sk'] || @json($errors->has('file_sk'))" class="text-[11px] text-rose-600 font-semibold mt-1 flex items-center gap-1" style="display: none;">
                                    <span class="material-symbols-outlined text-[14px]">error</span>
                                    <span>Berkas SK wajib diunggah.</span>
                                </p>
                                <p x-show="skFileName" x-text="'File terpilih: ' + skFileName" class="text-[11px] text-emerald-600 font-semibold mt-1.5 truncate"></p>
                            </div>
                        </div>

                        <!-- UPLOAD BUKTI TRANSFER -->
                        <div 
                            class="p-5 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between space-y-4 transition"
                            :class="{ 'field-error': errors['file_tf'] || @json($errors->has('file_tf')) }"
                        >
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-symbols-outlined text-emerald-600 text-[22px]">receipt_long</span>
                                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Bukti Transfer Rp 150rb <span class="text-rose-500">*</span></h4>
                                </div>
                                <p class="text-[11px] text-slate-600 leading-relaxed">
                                    Bukti transfer Rp 150.000 ke BNI 8881146255 (1 kali transaksi). Tuliskan nama Anda di keterangan transfer.
                                </p>
                                <span class="inline-block mt-2 px-2 py-0.5 rounded text-[10px] font-bold bg-slate-200 text-slate-700">PDF / JPG / PNG &bull; Maks 1 MB</span>
                            </div>

                            <div>
                                <input 
                                    type="file" 
                                    name="file_tf" 
                                    id="file_tf" 
                                    required 
                                    accept=".pdf,.jpg,.jpeg,.png"
                                    @change="checkFileSize($event, 'tf')"
                                    class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 cursor-pointer"
                                >
                                <p x-show="errors['file_tf'] || @json($errors->has('file_tf'))" class="text-[11px] text-rose-600 font-semibold mt-1 flex items-center gap-1" style="display: none;">
                                    <span class="material-symbols-outlined text-[14px]">error</span>
                                    <span>Bukti transfer wajib diunggah.</span>
                                </p>
                                <p x-show="tfFileName" x-text="'File terpilih: ' + tfFileName" class="text-[11px] text-emerald-600 font-semibold mt-1.5 truncate"></p>
                            </div>
                        </div>

                        <!-- UPLOAD PAS FOTO 3X4 -->
                        <div 
                            class="p-5 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between space-y-4 transition"
                            :class="{ 'field-error': errors['file_foto'] || @json($errors->has('file_foto')) }"
                        >
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-symbols-outlined text-purple-600 text-[22px]">account_box</span>
                                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Pas Foto 3x4 Berwarna <span class="text-rose-500">*</span></h4>
                                </div>
                                <p class="text-[11px] text-slate-600 leading-relaxed">
                                    Pandangan lurus ke depan, latar polos/berwarna. Foto ini langsung dicetak di KTA Digital tanpa proses edit.
                                </p>
                                <span class="inline-block mt-2 px-2 py-0.5 rounded text-[10px] font-bold bg-slate-200 text-slate-700">JPG / JPEG / PNG &bull; Maks 1 MB</span>
                            </div>

                            <div>
                                <!-- Pratinjau Foto Langsung -->
                                <div class="mb-3 flex items-center gap-3" x-show="fotoPreview">
                                    <img :src="fotoPreview" alt="Pratinjau Pas Foto" class="w-14 h-18 object-cover rounded-lg border-2 border-purple-400 shadow-sm">
                                    <span class="text-[11px] text-purple-700 font-semibold">Pratinjau KTA</span>
                                </div>

                                <input 
                                    type="file" 
                                    name="file_foto" 
                                    id="file_foto" 
                                    required 
                                    accept="image/jpeg,image/png,image/jpg"
                                    @change="previewFoto($event)"
                                    class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-700 cursor-pointer"
                                >
                                <p x-show="errors['file_foto'] || @json($errors->has('file_foto'))" class="text-[11px] text-rose-600 font-semibold mt-1 flex items-center gap-1" style="display: none;">
                                    <span class="material-symbols-outlined text-[14px]">error</span>
                                    <span>Pas foto 3x4 wajib diunggah.</span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- PERNYATAAN INTEGRITAS & TOMBOL KIRIM -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                    <label class="flex items-start gap-3 cursor-pointer select-none">
                        <input 
                            type="checkbox" 
                            required 
                            class="mt-1 w-5 h-5 rounded text-blue-600 border-slate-300 focus:ring-blue-500 cursor-pointer"
                        >
                        <span class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                            Saya menyatakan dengan sungguh-sungguh bahwa data yang saya isikan adalah benar, sah, dan dapat dipertanggungjawabkan sesuai ketentuan hukum. Saya memahami bahwa kesalahan input data menjadi tanggung jawab saya sendiri dan bersedia mematuhi Anggaran Dasar serta Anggaran Rumah Tangga (AD/ART) INAKI.
                        </span>
                    </label>

                    <div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-t border-slate-100">
                        <a href="{{ route('keanggotaan') }}" class="text-xs sm:text-sm font-semibold text-slate-500 hover:text-slate-800 transition">
                            &larr; Batalkan &amp; Kembali ke Halaman Keanggotaan
                        </a>

                        <button 
                            type="submit" 
                            :disabled="isSubmitting"
                            class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl bg-blue-600 hover:bg-blue-500 text-white font-extrabold text-sm shadow-xl shadow-blue-600/30 transition transform active:scale-95 disabled:opacity-75 disabled:cursor-not-allowed"
                        >
                            <span x-show="!isSubmitting" class="material-symbols-outlined text-[20px]">send</span>
                            <svg x-show="isSubmitting" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span x-text="isSubmitting ? 'Mengirim Formulir...' : 'Kirim Pendaftaran Keanggotaan'">Kirim Pendaftaran Keanggotaan</span>
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>
@endsection

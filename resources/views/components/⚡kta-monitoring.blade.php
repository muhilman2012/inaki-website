<?php

use Livewire\Component;
use App\Models\Member;

new class extends Component
{
    public string $employmentStatus = 'asn';
    public string $keyword = '';
    public ?array $searchResult = null;
    public bool $searched = false;

    public function search(): void
    {
        $clean = trim($this->keyword);

        if (empty($clean)) {
            $this->addError('keyword', 'Kolom Nama Lengkap atau NIP wajib diisi.');
            $this->searched = false;
            $this->searchResult = null;
            return;
        }

        if (strlen($clean) < 3) {
            $this->addError('keyword', 'Masukkan minimal 3 karakter untuk pencarian data.');
            $this->searched = false;
            $this->searchResult = null;
            return;
        }

        $this->resetErrorBag();
        $this->searched = true;

        // Pencarian data di basis data Anggota INAKI
        $member = Member::query()
            ->where(function ($query) use ($clean) {
                $query->where('nip', $clean)
                      ->orWhere('nomor_kta', $clean)
                      ->orWhere('registration_code', $clean)
                      ->orWhere('email', $clean)
                      ->orWhere('nama', 'LIKE', "%{$clean}%");
            })
            ->first();

        if ($member) {
            $this->searchResult = [
                'kta_number' => $member->nomor_kta ?? $member->registration_code,
                'name' => $member->nama,
                'role' => ($member->jenis_jfak ?? 'Analis Kebijakan') . ($member->nama_organisasi ? ' — ' . $member->nama_organisasi : ''),
                'status' => $member->status,
                'status_label' => $member->status === 'verified' ? 'Data Terverifikasi (KTA Aktif)' : ($member->status === 'pending' ? 'Dalam Antrean Verifikasi' : 'Perlu Perbaikan'),
                'valid_until' => $member->verified_at ? $member->verified_at->addYears(3)->translatedFormat('d M Y') : 'Menunggu Approval',
                'is_verified' => $member->status === 'verified',
            ];
        } else {
            $this->searchResult = null;
        }
    }
};
?>

<div class="rounded-2xl bg-surface-container-lowest p-6 shadow-sm border border-slate-200/70"
     x-data="{
         clientError: '',
         handleInput(el) {
             if (this.clientError && el.value.trim().length > 0) {
                 this.clientError = '';
             }
         },
         validateSubmit(event) {
             const input = this.$refs.keywordInput;
             if (!input.value || !input.value.trim()) {
                 this.clientError = 'Kolom Nama Lengkap atau NIP wajib diisi.';
                 input.focus();
                 event.preventDefault();
                 event.stopImmediatePropagation();
                 return false;
             }
             if (input.value.trim().length < 3) {
                 this.clientError = 'Masukkan minimal 3 karakter untuk pencarian data.';
                 input.focus();
                 event.preventDefault();
                 event.stopImmediatePropagation();
                 return false;
             }
             this.clientError = '';
             return true;
         }
     }">
    <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-8 rounded-lg bg-surface-container-low text-primary flex items-center justify-center">
            <span class="material-symbols-outlined text-[20px]">badge</span>
        </div>
        <div>
            <h4 class="font-headline text-base font-bold text-on-surface">Monitoring KTA Digital</h4>
            <p class="text-xs text-on-surface-variant">Cek status pendaftaran, keaktifan, &amp; pencarian nomor anggota.</p>
        </div>
    </div>

    <!-- Form Pencarian (novalidate untuk menonaktifkan tooltip browser native) -->
    <form wire:submit="search" novalidate @submit="validateSubmit($event)" class="flex flex-col gap-3">
        <div class="flex flex-col gap-1">
            <label for="kta_employment_status" class="text-xs text-on-surface font-semibold">Status Kepegawaian</label>
            <div class="relative">
                <select id="kta_employment_status" wire:model="employmentStatus" class="w-full h-11 px-3 bg-surface-container-low text-on-surface rounded-xl text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-primary/20 border border-slate-200/60">
                    <option value="asn">Aparatur Sipil Negara (PNS / PPPK)</option>
                    <option value="non_asn">Non-ASN (Akademisi / Peneliti / NGO)</option>
                    <option value="praktisi">Praktisi Kebijakan Publik / Swasta</option>
                </select>
                <span class="material-symbols-outlined absolute right-3 top-3 text-slate-600 pointer-events-none text-[20px]" aria-hidden="true">expand_more</span>
            </div>
        </div>

        <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between">
                <label for="kta_keyword" class="text-xs text-on-surface font-semibold">Nama Lengkap atau NIP</label>
                <span class="text-[11px] text-rose-700 font-bold">* Wajib diisi</span>
            </div>
            <div class="relative">
                <input 
                    id="kta_keyword"
                    x-ref="keywordInput"
                    wire:model="keyword" 
                    @input="handleInput($el)"
                    type="text"
                    placeholder="Contoh: 198804122014021001 atau Nama" 
                    :class="(clientError || @json($errors->has('keyword'))) 
                        ? 'border-2 border-rose-500 ring-4 ring-rose-500/20 bg-rose-50/50 text-slate-900 focus:border-rose-600 focus:ring-rose-500/30' 
                        : 'border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 bg-surface-container-low text-on-surface'"
                    class="w-full h-11 pl-3.5 pr-10 rounded-xl text-sm placeholder:text-slate-500 focus:outline-none transition-all duration-200"
                >
                <span class="material-symbols-outlined absolute right-3 top-3 transition-colors duration-200 text-[20px]"
                      :class="(clientError || @json($errors->has('keyword'))) ? 'text-rose-700' : 'text-slate-600'"
                      x-text="(clientError || @json($errors->has('keyword'))) ? 'error' : 'search'"
                      aria-hidden="true">search</span>
            </div>

            <!-- Pesan Alert Error Eye-Catching (Garis List Merah & Teks Merah Tegas) -->
            <div x-show="clientError" x-cloak class="flex items-center gap-1.5 mt-1 px-1 text-rose-600 text-xs font-semibold animate-pulse">
                <span class="material-symbols-outlined text-[16px] text-rose-600">error</span>
                <span x-text="clientError"></span>
            </div>
            @error('keyword')
                <div x-show="!clientError" class="flex items-center gap-1.5 mt-1 px-1 text-rose-600 text-xs font-semibold">
                    <span class="material-symbols-outlined text-[16px] text-rose-600">error</span>
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        <button type="submit" class="mt-1 w-full h-11 rounded-xl bg-primary text-on-primary font-headline text-sm font-semibold hover:bg-primary-container transition-all flex items-center justify-center gap-2 shadow-sm active:scale-98">
            <span class="material-symbols-outlined text-[18px]" wire:loading.remove>search_check</span>
            <span wire:loading class="material-symbols-outlined text-[18px] animate-spin">refresh</span>
            <span>Cari Data Keanggotaan</span>
        </button>
    </form>

    <!-- Hasil Pencarian -->
    @if($searched && $searchResult)
        <div class="mt-4 p-4 rounded-xl bg-surface-container-low border border-slate-200 flex flex-col gap-2 transition-all">
            <div class="flex items-center justify-between">
                <span class="text-[10px] uppercase font-bold text-emerald-700 flex items-center gap-1.5 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> {{ $searchResult['status_label'] }}
                </span>
                <span class="font-mono text-xs font-semibold text-slate-600">{{ $searchResult['kta_number'] }}</span>
            </div>
            <div class="flex flex-col mt-0.5">
                <span class="font-headline text-sm font-bold text-on-surface">{{ $searchResult['name'] }}</span>
                <span class="text-xs text-on-surface-variant">{{ $searchResult['role'] }}</span>
            </div>
            <div class="flex items-center justify-between text-xs pt-2 border-t border-slate-200/60 mt-1">
                <span class="text-on-surface-variant">Masa Aktif: <strong class="text-on-surface">{{ $searchResult['valid_until'] }}</strong></span>
                <a class="text-primary font-semibold hover:underline flex items-center gap-1" href="{{ route('keanggotaan.status', ['q' => $searchResult['kta_number']]) }}">
                    <span>Cek Lengkap</span>
                    <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                </a>
            </div>
        </div>
    @elseif($searched && !$searchResult)
        <div class="mt-4 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs flex items-center gap-2">
            <span class="material-symbols-outlined text-rose-500 text-[18px] shrink-0">info</span>
            <span>Data keanggotaan tidak ditemukan. Periksa kembali NIP atau Nama yang Anda masukkan.</span>
        </div>
    @endif
</div>
@extends('layouts.app')

@section('content')
    <div class="flex flex-col w-full">
        {{-- 1. Hero & Berita Utama --}}
        @include('components.home.hero-berita')

        {{-- 3. Bento Grid: Tentang Kami & Mars INAKI --}}
        @include('components.home.tentang-bento')

        {{-- 4. Program & Agenda Unggulan (Cards) --}}
        @include('components.home.program-kegiatan')

        {{-- 5. Layanan Mandiri KTA (Livewire) & FAQ (Alpine) --}}
        @include('components.home.layanan-faq')

        {{-- 6. Publikasi & Repository --}}
        @include('components.home.publikasi')

        {{-- 7. Call To Action (Banner Gabung) --}}
        @include('components.home.cta')
    </div>
@endsection
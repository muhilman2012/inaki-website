@extends('layouts.app', ['title' => 'Publikasi & Pengembangan Kompetensi - INAKI'])

@section('content')
    <div class="flex flex-col w-full" x-data="{ category: 'semua' }">
        {{-- Unified Breadcrumb --}}
        <x-breadcrumb 
            :items="[['label' => 'Publikasi & Pengembangan Kompetensi']]" 
        />

        {{-- Page Header & Filter Tabs --}}
        @include('components.publikasi.header-filter')

        {{-- Main Publication List Container --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 pb-16 w-full">
            {{-- 1. Buku Prosiding --}}
            @include('components.publikasi.buku-prosiding')

            {{-- 2. Buku Pedoman Pasca Bencana --}}
            @include('components.publikasi.buku-pedoman')

            {{-- 3. Repository Banner --}}
            @include('components.publikasi.repository-banner')

            {{-- 4. Direktori Regulasi --}}
            @include('components.publikasi.direktori-regulasi')
        </div>
    </div>
@endsection

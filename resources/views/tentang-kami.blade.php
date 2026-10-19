@extends('layouts.app', ['title' => 'Tentang Kami - INAKI (Ikatan Nasional Analis Kebijakan)'])

@section('content')
    <div class="flex flex-col w-full">
        {{-- Sticky Combined Navigation Bar (Breadcrumb + Navigasi Bab - Zero Gap Guaranteed) --}}
        <div class="sticky top-[118px] z-40 w-full shadow-xs bg-white">
            <x-breadcrumb 
                :items="[['label' => 'Tentang Kami']]" 
                badge="Wadah Berhimpun Resmi Analis Kebijakan Indonesia" 
                :sticky="false"
            />

            @include('components.tentang.rail-nav')
        </div>

        {{-- Editorial Hero Header --}}
        @include('components.tentang.hero')

        {{-- Section 1: Sejarah & Landasan Hukum --}}
        @include('components.tentang.sejarah')

        {{-- Section 2: Visi & Misi INAKI --}}
        @include('components.tentang.visi-misi')

        {{-- Section 3: Struktur Organisasi (Interactive Accordion) --}}
        @include('components.tentang.struktur')

        {{-- Section 4: Makna & Filosofi Logo INAKI --}}
        @include('components.tentang.filosofi-logo')

        {{-- Section 5: Mars INAKI (Interactive Player) --}}
        @include('components.tentang.mars')

        {{-- Section 6: Statistik & Demografi Keanggotaan --}}
        @include('components.tentang.statistik')

        {{-- Section 7: Call to Action --}}
        @include('components.tentang.cta')
    </div>
@endsection

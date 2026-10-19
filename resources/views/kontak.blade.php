@extends('layouts.app', ['title' => 'Kontak Kami - Ikatan Nasional Analis Kebijakan (INAKI)'])

@section('content')
    <div class="flex flex-col w-full">
        {{-- Unified Breadcrumb --}}
        <x-breadcrumb 
            :items="[['label' => 'Kontak Kami']]" 
            badge="Pusat Layanan & Kesekretariatan Resmi" 
        />

        {{-- Hero Header --}}
        @include('components.kontak.hero')

        {{-- Contact Channels: Sekretariat, Telepon/WhatsApp, Email, Media Sosial & Jam Operasional --}}
        @include('components.kontak.contact-cards')

        {{-- Interactive Map Section --}}
        @include('components.kontak.map-section')
    </div>
@endsection

@extends('layouts.app', ['title' => 'Layanan Keanggotaan & KTA Digital - INAKI'])

@section('content')
    <div class="flex flex-col w-full">
        {{-- Unified Breadcrumb --}}
        <x-breadcrumb 
            :items="[['label' => 'Keanggotaan']]" 
        />

        {{-- Hero Header --}}
        @include('components.keanggotaan.hero')

        {{-- Action Cards: Pendaftaran & Perpanjangan --}}
        @include('components.keanggotaan.action-cards')

        {{-- Monitoring Status & Nomor KTA --}}
        @include('components.keanggotaan.monitoring')

        {{-- Standardisasi Administrasi & Alur Verifikasi --}}
        @include('components.keanggotaan.administrasi')

        {{-- FAQ (Frequently Asked Questions) --}}
        @include('components.keanggotaan.faq')

        {{-- Helpdesk Terpadu Anggota --}}
        @include('components.keanggotaan.helpdesk')
    </div>
@endsection

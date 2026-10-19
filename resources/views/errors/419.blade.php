@extends('errors.layout')

@section('title', 'Sesi Telah Kedaluwarsa')
@section('code', '419')
@section('icon', 'history_toggle_off')
@section('icon-bg', 'bg-amber-50 text-amber-600 ring-8 ring-amber-50/50')
@section('badge-class', 'bg-amber-50 text-amber-700 border border-amber-200')

@section('message')
    Sesi halaman telah kedaluwarsa karena tidak ada aktivitas dalam waktu tertentu atau token keamanan telah diperbarui. Silakan muat ulang halaman.
@endsection

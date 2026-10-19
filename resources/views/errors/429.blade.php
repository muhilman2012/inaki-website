@extends('errors.layout')

@section('title', 'Terlalu Banyak Permintaan')
@section('code', '429')
@section('icon', 'speed')
@section('icon-bg', 'bg-amber-50 text-amber-600 ring-8 ring-amber-50/50')
@section('badge-class', 'bg-amber-50 text-amber-700 border border-amber-200')

@section('message')
    Sistem mendeteksi terlalu banyak permintaan dari perangkat Anda dalam waktu singkat. Mohon tunggu beberapa saat sebelum mencoba kembali.
@endsection

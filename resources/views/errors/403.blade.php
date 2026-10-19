@extends('errors.layout')

@section('title', 'Akses Ditolak')
@section('code', '403')
@section('icon', 'lock')
@section('icon-bg', 'bg-rose-50 text-rose-600 ring-8 ring-rose-50/50')
@section('badge-class', 'bg-rose-50 text-rose-700 border border-rose-200')

@section('message')
    Anda tidak memiliki hak otorisasi untuk mengakses halaman atau berkas ini. Pastikan Anda telah masuk dengan akun yang sesuai.
@endsection

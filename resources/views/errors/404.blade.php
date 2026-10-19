@extends('errors.layout')

@section('title', 'Halaman Tidak Ditemukan')
@section('code', '404')
@section('icon', 'travel_explore')
@section('icon-bg', 'bg-blue-50 text-blue-600 ring-8 ring-blue-50/50')
@section('badge-class', 'bg-blue-50 text-blue-700 border border-blue-200')

@section('message')
    Maaf, halaman atau dokumen yang Anda cari tidak dapat ditemukan. Alamat URL mungkin salah ketik atau telah dipindahkan.
@endsection

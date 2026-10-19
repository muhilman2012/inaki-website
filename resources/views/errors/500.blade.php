@extends('errors.layout')

@section('title', 'Terjadi Kesalahan Server')
@section('code', '500')
@section('icon', 'dns')
@section('icon-bg', 'bg-rose-50 text-rose-600 ring-8 ring-rose-50/50')
@section('badge-class', 'bg-rose-50 text-rose-700 border border-rose-200')

@section('message')
    Terjadi kendala teknis internal pada server saat memproses permintaan Anda. Tim teknis INAKI sedang meninjau kendala ini.
@endsection

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO Meta Tags -->
    <title>{{ $title ?? 'INAKI - Ikatan Nasional Analis Kebijakan' }}</title>
    <meta name="description" content="Wadah berhimpun resmi Analis Kebijakan se-Indonesia untuk akselerasi kualitas regulasi, advokasi tata kelola pemerintahan, dan penguatan ekosistem bukti analitis.">
    <meta name="keywords" content="INAKI, Analis Kebijakan, JFAK, LAN RI, Kebijakan Publik, Policy Brief, KemenPANRB">
    <meta name="author" content="INAKI">

    <!-- Theme Color (Warna Header Browser di HP / Chrome / Safari) -->
    <meta name="theme-color" content="#004ac6">
    <meta name="msapplication-TileColor" content="#004ac6">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- 1. Favicon Standar Browser -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('images/icons/favicon-48x48.png') }}">

    <!-- 2. Apple Touch Icon (iOS / iPhone / iPad) -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/apple-touch-icon.png') }}">

    <!-- 3. Android Chrome / PWA Manifest -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/icons/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/icons/android-chrome-512x512.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <!-- 4. Open Graph / Share Link Preview (WhatsApp, Telegram, Facebook) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'INAKI - Ikatan Nasional Analis Kebijakan' }}">
    <meta property="og:description" content="Wadah berhimpun resmi Analis Kebijakan se-Indonesia mitra strategis LAN RI.">
    <meta property="og:image" content="{{ asset('images/logo-header.png') }}">

    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-background font-body text-on-surface antialiased">
    
    {{-- Header & Navbar --}}
    @include('partials.header')

    {{-- Main Content Slot --}}
    <main class="w-full bg-background">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @livewireScripts
</body>
</html>
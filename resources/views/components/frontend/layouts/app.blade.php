<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic Page Title --}}
    <title>{{ $title ?? config('app.name', 'PT SAJ - Website Resmi') }}</title>

    {{-- Meta Description for SEO (Optional, Set via @section('meta_description')) --}}
    @hasSection('meta_description')
        <meta name="description" content="@yield('meta_description')">
    @endif

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">

    {{-- Font (Optional, remove if unused) --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    {{-- Tailwind & JS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- SEO Enhancement --}}
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#f97316"> {{-- Orange 500 Tailwind --}}

    {{-- CSRF Token (for JS fetch or forms) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-white text-gray-900 antialiased font-sans leading-relaxed tracking-wide">

    {{-- Navbar --}}
    <x-frontend.layouts.navbar />

    {{-- Main Content --}}
    <main class="min-h-screen pt-20">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @if (View::exists('components.frontend.layouts.footer'))
        <x-frontend.layouts.footer />
    @endif

</body>
</html>

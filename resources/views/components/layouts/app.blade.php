{{-- resources/views/components/frontend/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- ... bagian head lainnya ... --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-100" x-data="{ sidebarOpen: false }">
    {{-- Navbar Komponen --}}
    <x-layouts.navbar /> {{-- PERUBAHAN DI SINI --}}

    {{-- Main Content Slot --}}
    {{-- <main>
        {{ $slot }}
    </main> --}}

    {{-- Footer Komponen (jika ada, atau langsung di sini) --}}
    {{-- <footer class="bg-gray-800 text-white py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">{{ config('app.name', 'PT SAJ') }}</h3>
                <p class="text-gray-400">Solusi teknologi inovatif untuk mendorong pertumbuhan bisnis Anda.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Link Cepat</h3>
                <ul>
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition duration-200">Beranda</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-white transition duration-200">Produk</a></li>
                    <li><a href="{{ route('job-vacancies.index') }}" class="text-gray-400 hover:text-white transition duration-200">Karir</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-200">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-200">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
                <p class="text-gray-400">Jl. Contoh No. 123, Kota Bekasi, Jawa Barat</p>
                <p class="text-gray-400">Email: info@ptsaj.com</p>
                <p class="text-gray-400">Telp: (021) 1234567</p>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} {{ config('app.name', 'PT SAJ') }}. All rights reserved.</p>
        </div>
    </footer> --}}
</body>
</html>

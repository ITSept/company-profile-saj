<footer class="bg-gray-900 text-white py-10 mt-16">
    <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Kolom 1: Brand --}}
        <div>
            <img src="{{ asset('storage/logo/default-logo.png') }}" alt="PT SAJ Logo" class="h-10 mb-4">
            <p class="text-sm text-gray-300">
                PT SAJ adalah perusahaan pangan yang berkomitmen pada kualitas, keamanan, dan keberlanjutan.
            </p>
        </div>

        {{-- Kolom 2: Navigasi --}}
        <div>
            <h4 class="font-semibold mb-3 text-white">Navigasi</h4>
            <ul class="space-y-2 text-gray-300 text-sm">
                <li><a href="{{ route('products.index') }}" class="hover:text-green-400 transition">Produk</a></li>
                <li><a href="{{ route('job-vacancies.index') }}" class="hover:text-green-400 transition">Karir</a></li>
                {{-- <li><a href="{{ route('contact') }}" class="hover:text-green-400 transition">Kontak</a></li> --}}
                {{-- <li><a href="{{ route('about') }}" class="hover:text-green-400 transition">Tentang Kami</a></li> --}}
            </ul>
        </div>

        {{-- Kolom 3: Kontak --}}
        <div>
            <h4 class="font-semibold mb-3 text-white">Hubungi Kami</h4>
            <ul class="text-gray-300 text-sm space-y-2">
                <li>Email: <a href="mailto:info@pt-saj.com" class="hover:text-green-400">info@pt-saj.com</a></li>
                <li>WhatsApp: <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-green-400">+62 812-3456-7890</a></li>
                <li>Alamat: Jl. Industri No. 88, Cikarang, Bekasi</li>
            </ul>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="mt-10 border-t border-gray-700 pt-6 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} PT Sumber Agro Jaya. All rights reserved.
    </div>
</footer>

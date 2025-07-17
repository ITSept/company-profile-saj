<x-layouts.app> {{-- Pastikan ini sesuai dengan cara Anda mendaftarkan layout --}}

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-r from-indigo-600 to-purple-700 text-white py-24 md:py-32 overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path fill="currentColor" d="M0,0 L100,0 L100,100 L0,100 L0,0 Z M50,0 C77.6,0 100,22.4 100,50 C100,77.6 77.6,100 50,100 C22.4,100 0,77.6 0,50 C0,22.4 22.4,0 50,0 Z"></path>
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 animate-fade-in-up">
                Solusi Inovatif untuk Masa Depan Bisnis Anda
            </h1>
            <p class="text-lg md:text-xl mb-10 opacity-90 animate-fade-in-up delay-200">
                PT SAJ menyediakan produk berkualitas dan peluang karir menarik.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up delay-400">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-lg text-indigo-700 bg-white hover:bg-gray-100 transition duration-300">
                    Jelajahi Produk
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="{{ route('job-vacancies.index') }}" class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-base font-medium rounded-full text-white hover:bg-white hover:text-indigo-700 transition duration-300">
                    Cari Karir
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Products Section --}}
    <section class="py-16 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-gray-900 text-center mb-12">Produk Pilihan Kami</h2>
            @if ($latestProducts->isEmpty())
                <p class="text-center text-gray-600 text-lg">Belum ada produk terbaru yang ditampilkan.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($latestProducts as $product)
                        <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden border border-gray-200 transform hover:scale-102 transition duration-300 group">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover object-center group-hover:opacity-80 transition duration-300">
                            @else
                                <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-500 rounded-t-xl">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition duration-300">{{ $product->name }}</h3>
                                <p class="text-gray-600 mb-4 text-base leading-relaxed">{{ Str::limit($product->description, 120) }}</p>
                                <p class="text-2xl font-extrabold text-indigo-700 mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md">
                                    Detail Produk
                                    <svg class="ml-2 -mr-1 w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" class="inline-block bg-gray-800 text-white px-8 py-4 rounded-full hover:bg-gray-700 transition duration-300 shadow-lg font-semibold text-lg">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>

    {{-- Latest Job Vacancies Section --}}
    <section class="py-16 md:py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-extrabold text-gray-900 text-center mb-12">Peluang Karir Menarik</h2>
            @if ($latestJobVacancies->isEmpty())
                <p class="text-center text-gray-600 text-lg">Belum ada lowongan karir terbaru yang tersedia.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($latestJobVacancies as $jobVacancy)
                        <div class="bg-white rounded-xl shadow-lg p-7 border border-gray-200 transform hover:scale-102 transition duration-300">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $jobVacancy->title }}</h3>
                            <p class="text-gray-600 text-sm mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $jobVacancy->location ?? 'Tidak Ditetapkan' }}
                            </p>
                            <p class="text-gray-600 text-sm mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8V6m0 4v2m0 4v2"></path></svg>
                                {{ $jobVacancy->salary_range ?? 'Negosiable' }}
                            </p>
                            <p class="text-gray-700 mb-5 text-base leading-relaxed">{{ Str::limit($jobVacancy->description, 150) }}</p>
                            <a href="{{ route('job-vacancies.show', $jobVacancy->id) }}" class="inline-block text-indigo-600 hover:text-indigo-800 font-semibold transition duration-300 text-lg flex items-center">
                                Baca Selengkapnya
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="text-center mt-12">
                <a href="{{ route('job-vacancies.index') }}" class="inline-block bg-gray-800 text-white px-8 py-4 rounded-full hover:bg-gray-700 transition duration-300 shadow-lg font-semibold text-lg">
                    Lihat Semua Lowongan
                </a>
            </div>
        </div>
    </section>

    {{-- Tambahkan bagian lain seperti "Tentang Kami Singkat", "Testimoni", "Call to Action" --}}

</x-layouts.app>

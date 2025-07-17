<x-frontend.layouts.app :title="'Beranda PT SAJ'">

    {{-- 🔶 Hero Section --}}
    <x-frontend.hero />

    {{-- 🧾 Tentang Kami --}}
    <x-frontend.layouts.section class="bg-white py-16">
        <div class="max-w-5xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang PT SAJ</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                PT SAJ adalah produsen diapers terpercaya dengan pengalaman lebih dari 20 tahun dalam menyediakan produk popok berkualitas tinggi untuk bayi dan dewasa. Kami mengutamakan higienitas, kenyamanan, dan teknologi mutakhir dalam setiap lini produksi kami.
            </p>
        </div>
    </x-frontend.layouts.section>

    {{-- 🔷 Produk Unggulan --}}
    <x-frontend.layouts.section>
        <h2 class="text-2xl font-semibold mb-6 text-center">Produk Unggulan Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <x-frontend.product-card
                    :image="$product->image ? asset('storage/' . $product->image) : null"
                    :name="$product->name"
                    :description="Str::limit($product->description, 100)"
                    :link="route('products.show', $product)"
                />
            @endforeach
        </div>
    </x-frontend.layouts.section>

    {{-- ⭐ Keunggulan Kami --}}
    <x-frontend.layouts.section class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold text-gray-800 mb-8">Mengapa Memilih Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 text-left">
                <div class="flex items-start space-x-4">
                    <x-heroicon-o-check-badge class="w-6 h-6 text-green-500" />
                    <div>
                        <h3 class="font-bold text-gray-700">Sertifikasi ISO</h3>
                        <p class="text-gray-600 text-sm">Proses produksi sesuai standar internasional untuk kualitas maksimal.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <x-heroicon-o-sparkles class="w-6 h-6 text-yellow-500" />
                    <div>
                        <h3 class="font-bold text-gray-700">Kebersihan Terjaga</h3>
                        <p class="text-gray-600 text-sm">Ruang produksi steril dengan kontrol kualitas ketat.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <x-heroicon-o-cube class="w-6 h-6 text-blue-500" />
                    <div>
                        <h3 class="font-bold text-gray-700">Produksi Skala Besar</h3>
                        <p class="text-gray-600 text-sm">Kapasitas hingga 1 juta unit/hari untuk memenuhi permintaan global.</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <x-heroicon-o-hand-thumb-up class="w-6 h-6 text-indigo-500" />
                    <div>
                        <h3 class="font-bold text-gray-700">Layanan OEM</h3>
                        <p class="text-gray-600 text-sm">Mitra tepercaya untuk bisnis Anda dengan sistem fleksibel.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.layouts.section>


    {{-- 🏭 Galeri Pabrik --}}
    <x-frontend.layouts.section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Galeri Pabrik Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($factoryImages as $image)
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ asset('storage/factory/' . $image) }}" alt="Foto Pabrik" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                @endforeach
            </div>
        </div>
    </x-frontend.layouts.section>

    {{-- 💬 Testimoni / Klien --}}
    <x-frontend.layouts.section class="bg-gray-100 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-semibold mb-10 text-gray-800">Apa Kata Klien Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($testimonials as $testimonial)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <p class="text-gray-600 italic">"{{ $testimonial->quote }}"</p>
                        <div class="mt-4 text-sm font-semibold text-gray-700">
                            — {{ $testimonial->name }}, {{ $testimonial->company }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-frontend.layouts.section>

    {{-- 🟢 Lowongan Karir --}}
    <x-frontend.layouts.section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">
                Kesempatan Berkarir di PT SAJ
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Lowongan Loop --}}
                @forelse ($jobVacancies as $job)
                    <x-frontend.job-vacancy-card
                        :title="$job->title"
                        :location="$job->location"
                        :type="$job->type"
                        :summary="$job->summary"
                        :link="route('job-vacancies.show', $job)"
                    />
                @empty
                    <p class="col-span-full text-center text-gray-500">Saat ini belum ada lowongan tersedia.</p>
                @endforelse
            </div>
        </div>
    </x-frontend.layouts.section>

</x-frontend.layouts.app>

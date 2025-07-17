<x-frontend.layouts.app :title="'Beranda PT SAJ'">

    {{-- 🔶 Hero Section --}}
    <x-frontend.hero />

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

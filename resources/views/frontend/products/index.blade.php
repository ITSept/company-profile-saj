<x-frontend.layouts.app :title="'Daftar Produk PT SAJ'">
    <x-frontend.layouts.section>
        <h1 class="text-3xl font-bold mb-8 text-center">Daftar Produk</h1>
        @if($products->isEmpty())
            <p class="text-center text-gray-500">Belum ada produk tersedia.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center mb-4 rounded-md">
                                <span class="text-gray-400">Tidak ada gambar</span>
                            </div>
                        @endif
                        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-4">{{ Str::limit($product->description, 100) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:underline font-semibold">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        @endif
    </x-frontend.layouts.section>
</x-frontend.layouts.app>

<x-frontend.layouts.app :title="$product->name">
    <x-frontend.layouts.section>
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-6">{{ $product->name }}</h1>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-md mb-6">
            @endif
            <p class="text-gray-800 text-lg">{{ $product->description }}</p>
            <p class="mt-4 font-semibold">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <a href="{{ route('products.index') }}" class="inline-block mt-6 text-indigo-600 hover:underline">Kembali ke Daftar Produk</a>
        </div>
    </x-frontend.layouts.section>
</x-frontend.layouts.app>

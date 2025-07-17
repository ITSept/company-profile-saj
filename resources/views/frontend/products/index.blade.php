<x-layouts.app> {{-- Pastikan ini sesuai dengan cara Anda mendaftarkan layout --}}
    <div class="container mx-auto px-4 py-12 md:py-16">
        <h1 class="text-5xl font-extrabold text-gray-900 text-center mb-12">Produk Kami</h1>

        @if ($products->isEmpty())
            <p class="text-center text-gray-600 text-lg">Belum ada produk yang tersedia saat ini.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 transform hover:scale-102 transition duration-300 group">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover object-center group-hover:opacity-80 transition duration-300">
                        @else
                            <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-500 rounded-t-xl">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition duration-300">{{ $product->name }}</h2>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 100) }}</p>
                            <p class="text-2xl font-bold text-indigo-700 mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md">
                                Detail Produk
                                <svg class="ml-2 -mr-1 w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Paginasi --}}
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>

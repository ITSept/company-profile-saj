<x-layouts.app> {{-- Pastikan ini sesuai dengan cara Anda mendaftarkan layout --}}
    <div class="container mx-auto px-4 py-12 md:py-16">
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:flex">
            <div class="md:flex-shrink-0 md:w-1/2">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-80 object-cover object-center md:h-full">
                @else
                    <div class="w-full h-80 bg-gray-200 flex items-center justify-center text-gray-500 md:h-full">
                        <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
            </div>
            <div class="p-8 md:w-1/2 flex flex-col justify-center">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $product->name }}</h1>
                <p class="text-gray-700 text-lg mb-6 leading-relaxed">{{ $product->description }}</p>
                <p class="text-3xl font-extrabold text-indigo-700 mb-8">Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="mt-auto"> {{-- Push button to bottom --}}
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="mr-2 -ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Daftar Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

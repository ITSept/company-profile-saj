<div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 overflow-hidden">
    <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-800">{{ $name }}</h3>
        <p class="text-sm text-gray-600 mt-2">{{ $description }}</p>
        <a href="{{ $link }}"
           class="text-orange-600 font-medium inline-block mt-4 hover:underline">
            Lihat Detail →
        </a>
    </div>
</div>

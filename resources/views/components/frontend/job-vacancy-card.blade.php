<div class="border rounded-lg p-6 bg-gray-50 hover:shadow-md transition">
    <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $title }}</h3>
    <div class="text-sm text-gray-600 mb-3">{{ $location }} &middot; {{ $type }}</div>
    <p class="text-sm text-gray-700 line-clamp-3">{{ $summary }}</p>
    <a href="{{ $link }}" class="mt-4 inline-block text-orange-600 font-medium hover:underline">
        Lihat Detail →
    </a>
</div>

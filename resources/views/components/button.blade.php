@props([
    'type' => 'button',
    'variant' => 'primary', // opsi: primary, secondary, danger
    'size' => 'md',         // opsi: sm, md, lg
])

@php
    $base = 'inline-flex items-center justify-center font-semibold rounded transition duration-200 focus:outline-none';
    $sizes = [
        'sm' => 'text-sm px-3 py-1.5',
        'md' => 'text-base px-4 py-2',
        'lg' => 'text-lg px-5 py-3',
    ];
    $variants = [
        'primary' => 'bg-green-600 text-white hover:bg-green-700',
        'secondary' => 'bg-gray-100 text-gray-800 hover:bg-gray-200',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
    ];
@endphp

<button type="{{ $type }}" {{ $attributes->merge([
    'class' => "{$base} {$sizes[$size]} {$variants[$variant]}"
]) }}>
    {{ $slot }}
</button>

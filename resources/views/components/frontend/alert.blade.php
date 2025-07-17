@props(['type' => 'info', 'message'])

@php
    $bg = match($type) {
        'success' => 'bg-green-100 text-green-700',
        'error' => 'bg-red-100 text-red-700',
        'warning' => 'bg-yellow-100 text-yellow-800',
        default => 'bg-blue-100 text-blue-700'
    };
@endphp

<div class="px-4 py-3 rounded mb-4 {{ $bg }}">
    {{ $message }}
</div>

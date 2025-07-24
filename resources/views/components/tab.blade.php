@props([
    'active' => false,
    'href' => '#',
])

@php
    $classes = $active
        ? 'bg-white dark:bg-gray-600 block px-4 py-3 text-gray-900 dark:text-gray-100 font-medium'
        : 'bg-gray-100 dark:bg-gray-700 block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-600';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

@props([
    'type' => 'primary',
    'size' => 'md',
    'buttonType' => 'submit',
    'tag' => 'button',
])

@php
    $baseClasses = 'font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors flex items-center justify-center cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed';
    
    $sizeClasses = match ($size) {
        'sm' => 'py-1.5 px-3 text-sm',
        'md' => 'py-2 px-4',
        'lg' => 'py-3 px-6 text-lg',
    };
    
    $typeClasses = match ($type) {
        'primary' => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 text-white',
        'secondary' => 'bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-gray-500 text-gray-900 dark:text-gray-100',
        'danger' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500 text-white',
    };
    
    $styleClasses = \Illuminate\Support\Arr::toCssClasses([
        $baseClasses,
        $sizeClasses,
        $typeClasses,
    ]);
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $styleClasses]) }}>
    {{ $slot }}
    </{{ $tag }}>

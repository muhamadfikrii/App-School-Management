@props(['active' => false])

@php
$classes = $active
    ? 'text-blue-600 after:w-full'
    : 'text-gray-700 hover:text-blue-600 after:w-0 hover:after:w-full';
@endphp

<a {{ $attributes->merge([
        'class' => "
            relative inline-flex items-center pb-1
            after:content-[''] after:absolute after:left-0 after:-bottom-0.5
            after:h-[2px] after:bg-blue-500 after:transition-all after:duration-300
            $classes
        "
    ]) }}>
    {{ $slot }}
</a>

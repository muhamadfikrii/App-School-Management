<!-- resources/views/components/nav-link.blade.php -->
@props(['href'])

@php
    $isActive = request()->routeIs(
        $href == '/' ? 'home' : 
        (str_starts_with($href, 'http') ? false : 
        str_replace('/', '', $href))
    );
@endphp

<a {{ $attributes->merge(['href' => $href]) }}
   class="relative font-semibold transition-all duration-200
          {{ $isActive 
              ? 'text-blue-600 bg-blue-50/80 shadow-sm border border-blue-200/50' 
              : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50/80 hover:border hover:border-gray-200/50' }}">
    {{ $slot }}
</a>
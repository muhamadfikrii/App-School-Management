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
   class="relative group font-[Poppins] 
          {{ $isActive 
              ? 'text-blue-600 bg-blue-50/80 shadow-sm after:w-full' 
              : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50/80  after:w-0 group-hover:after:w-full' }}
          transition-colors duration-200"
   >
    {{ $slot }}

    <!-- Garis bawah -->
    <span class="absolute left-0 -bottom-1 h-[2px] bg-blue-600 transition-width duration-300 ease-out 
                 {{ $isActive ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
</a>
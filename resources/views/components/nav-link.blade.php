<a {{ $attributes }}
   class="relative px-3 py-2 text-sm font-semibold transition-all duration-300
          {{ request()->fullUrlIs(url($href))
              ? 'text-blue-400 after:w-full'
              : 'text-white hover:text-blue-400 after:w-0 hover:after:w-full' }}
          after:content-[''] after:absolute after:bottom-0 after:h-[2px] after:bg-blue-400 after:transition-all after:duration-300 after:left-1/2 after:-translate-x-1/2">
    {{ $slot }}
</a>

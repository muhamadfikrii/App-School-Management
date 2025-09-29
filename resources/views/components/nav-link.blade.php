<a {{ $attributes  }} class="{{ request()->fullUrlis(url($href)) 
            ? 'bg-zinc-900 text-white shadow-md' 
            : 'text-zinc-300 hover:bg-zinc-700 hover:text-white' }} text-white px-3 py-2        hover:bg-zinc-700 rounded-md">
    {{ $slot }}
</a>
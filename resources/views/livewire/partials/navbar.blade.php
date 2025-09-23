<div id="navbar" 
    class="fixed top-0 left-0 min-w-screen bg-white z-50 transition-all duration-300"
    x-data="{ open: false, scrolled: false }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50
        })
    " 
    :class="scrolled ? 'shadow-lg bg-white backdrop-blur-md' : ''">

    <!-- Wrapper -->
    
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-16">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img class="w-12 h-12" src="{{ asset('img/logo.png') }}" alt="Logo SMKN 4 Kuningan">
            <span class="text-lg sm:text-xl font-bold text-gray-800 tracking-wide">SMKN 4 Kuningan</span>
        </a>

        <!-- Menu desktop -->
        <ul class="hidden md:flex gap-10 items-center text-gray-700 text-sm font-bold font-sans">
            <li>
                <a href="{{ route('home') }}" 
                   class="relative group hover:text-blue-600 {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">
                    Home
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all group-hover:w-full {{ request()->routeIs('home') ? 'w-full' : '' }}"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('About') }}" 
                   class="relative group hover:text-blue-600 {{ request()->routeIs('About') ? 'text-blue-600' : '' }}">
                    Tentang SMKN4
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all group-hover:w-full {{ request()->routeIs('About') ? 'w-full' : '' }}"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('Contact') }}" 
                   class="relative group hover:text-blue-600 {{ request()->routeIs('Contact') ? 'text-blue-600' : '' }}">
                    Kontak Kami
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all group-hover:w-full {{ request()->routeIs('Contact') ? 'w-full' : '' }}"></span>
                </a>
            </li>
            <li class="ml-4">
                <a href="/admin" 
                   class="px-5 py-2 rounded-lg shadow bg-gradient-to-r from-blue-600 to-white text-blue-800 font-semibold
                          transition-all duration-900 ease-in-out hover:from-white hover:to-blue-600 hover:text-white">
                    Login
                </a>
            </li>
        </ul>

    <button class="md:hidden cursor-pointer text-gray-600 focus:outline-none text-2xl" 
            @click="open = !open">
        <span x-show="!open">☰</span>
        <span x-show="open">✕</span>
    </button>
</div>

    <div class="md:hidden absolute top-full left-0 w-full bg-white shadow-md z-40 origin-top"
     x-show="open"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform -translate-y-5"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform -translate-y-5">
     
     <ul class="flex flex-col px-6 py-4 gap-3">
        <li>
            <a href="{{ route('home') }}" 
               class="block hover:bg-gray-100 px-4 py-2 rounded w-full {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
               Home
            </a>
        </li>
        <li>
            <a href="{{ route('About') }}" 
               class="block hover:bg-gray-100 px-4 py-2 rounded w-full {{ request()->routeIs('About') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
               Tentang SMKN4
            </a>
        </li>
        <li>
            <a href="{{ route('Contact') }}" 
               class="block hover:bg-gray-100 px-4 py-2 rounded w-full {{ request()->routeIs('Contact') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
               Kontak Kami
            </a>
        </li>
        <li>
            <a href="/admin" 
               class="block bg-blue-600 hover:bg-blue-700 transition text-white px-4 py-2 rounded text-center shadow w-full">
               Login
            </a>
        </li>
     </ul>
</div>

</div>

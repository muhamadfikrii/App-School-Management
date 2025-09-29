<div id="navbar"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
    x-data="{ open: false, scrolled: false }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50
        })
    "
    :class="scrolled ? 'shadow-lg bg-zinc-900 backdrop-blur-md' : 'bg-zinc-900'">

    <!-- Navbar Wrapper -->
    <nav>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 space-x-4">

                <!-- Logo -->
                <a href="{{ route('home') }}"
                   class="text-xl font-bold text-white whitespace-nowrap transition-colors duration-300">
                    SMKN4KNG
                </a>

                <div class="flex-1 h-px bg-zinc-700 hidden md:block"></div>

                <div class="hidden md:flex items-center space-x-6 bg-zinc-800 px-4 py-2 rounded-lg">
                    <x-nav-link href="{{ route('home') }}">Home</x-nav-link>
                    <x-nav-link href="{{ route('about') }}">Tentang SMK4</x-nav-link>
                    <x-nav-link href="{{ route('contact') }}">Contact</x-nav-link>
                </div>

                <div class="flex-1 h-px bg-zinc-700 hidden md:block"></div>

                <a href="/admin"
                   class="hidden md:flex px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition whitespace-nowrap">
                    Login
                </a>

                <!-- Mobile Hamburger -->
                <button @click="open = !open"
                        class="md:hidden text-white focus:outline-none transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <!-- Mobile Menu -->
    <div class="md:hidden absolute top-full left-0 w-full bg-zinc-900 shadow-md z-40 origin-top"
        x-cloak
        x-show="open"
        x-transition.opacity.scale.origin.top.duration.200ms>
        
        <ul class="flex flex-col px-6 py-4 gap-3">
            <li>
                <a href="{{ route('home') }}"
                class="block px-4 py-2 rounded w-full 
                        {{ request()->routeIs('home') ? 'bg-zinc-800 text-white font-semibold' : 'text-gray-300 hover:bg-zinc-800 hover:text-white' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                class="block px-4 py-2 rounded w-full 
                        {{ request()->routeIs('about') ? 'bg-zinc-800 text-white font-semibold' : 'text-gray-300 hover:bg-zinc-800 hover:text-white' }}">
                    Tentang SMKN4
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}"
                class="block px-4 py-2 rounded w-full 
                        {{ request()->routeIs('contact') ? 'bg-zinc-800 text-white font-semibold' : 'text-gray-300 hover:bg-zinc-800 hover:text-white' }}">
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

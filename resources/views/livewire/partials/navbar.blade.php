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
                   <div x-data="{ open: false }" class="relative">
                        <button @mouseenter="open = true" @mouseleave="open = false"
                                class="flex items-center px-4 py-2 text-gray-200 hover:text-blue-500 font-semibold transition">
                            Info Sekolah
                            <svg class="w-4 h-4 ml-1 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div x-show="open" @mouseenter="open = true" @mouseleave="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2"
                            class="absolute left-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 z-50">
                            
                            <a href="#" class="flex items-center gap-2 rounded-tl-2xl rounded-tr-2xl px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                                Program Keahlian
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                                Organisasi
                            </a>
                            <a href="{{ route('achievement') }}" class="flex rounded-bl-2xl rounded-br-2xl items-center gap-2 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                                Prestasi
                            </a>
                        </div>
                    </div>
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
            <li x-data="{ infoOpen: false }" class="w-full">
            <button @click="infoOpen = !infoOpen"
                    class="w-full flex justify-between items-center px-4 py-2 rounded text-gray-300 hover:bg-zinc-800 hover:text-white focus:outline-none">
                Info Sekolah
                <svg :class="infoOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <ul x-show="infoOpen" x-transition class="pl-4 mt-2 flex flex-col gap-2">
                <li>
                    <a href="#" class="block px-4 py-2 rounded text-gray-300 hover:bg-zinc-800 hover:text-white">
                        Program Keahlian
                    </a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 rounded text-gray-300 hover:bg-zinc-800 hover:text-white">
                        Organisasi
                    </a>
                </li>
                <li>
                    <a href="{{ route('achievement') }}" class="block px-4 py-2 rounded text-gray-300 hover:bg-zinc-800 hover:text-white">
                        Prestasi
                    </a>
                </li>
            </ul>
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

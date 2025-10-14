<div id="navbar"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
    x-data="{ open: false, scrolled: false }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50
        })
    "
    :class="scrolled ? 'shadow-lg bg-transparent backdrop-blur-md' : ''">

    <!-- Navbar Wrapper -->
    <nav>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 space-x-4">

                <!-- Logo -->
                <img src="{{ asset('img/logo.png') }}" alt="logo SMK" class="object-cover h-10 w-10">
                <a href="{{ route('home') }}"
                   class="text-xl font-bold text-zinc-600 whitespace-nowrap transition-colors duration-300">
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

                <div class="bg-black rounded-bl-2xl">
                    <button class="md:hidden flex flex-col justify-between w-6 h-6 focus:outline-none bg-blue-400 p-1"
                        @click="
                            if(!open){
                                anim = true;
                                setTimeout(() => { open = true }, 150);
                            } else {
                                open = false;
                                setTimeout(() => { anim = false }, 150);
                            }">
                        <span 
                            :class="{
                                'rotate-[90deg] translate-y-1.5 origin-center': open
                            }" 
                            class="block h-0.5 w-full bg-white transition-all duration-300">
                        </span>
                        <span 
                            :class="{'opacity-0': open, 'opacity-100': !open}" 
                            class="block h-0.5 w-full bg-white transition-all duration-300">
                        </span>
                        <span 
                            :class="{
                                '-translate-y-1.5': anim && !open,
                                '-rotate-[30deg] -translate-y-1.5 origin-center': open
                            }" 
                            class="block h-0.5 w-full bg-white transition-all duration-300">
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="md:hidden absolute top-full left-0 w-full bg-gradient-to-br from-white via-blue-50 to-zinc-50 shadow-md z-40 h-screen"
        x-cloak
        x-show="open"
        x-transition.opacity.duration.300ms>
        <div class="absolute -top-32 -left-32 w-80 md:w-96 h-80 md:h-96 bg-blue-300 rounded-full opacity-20 blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-32 -right-32 w-80 md:w-96 h-80 md:h-96 bg-blue-400 rounded-full opacity-20 blur-2xl animate-pulse-slow"></div>

        <!-- Menu Links -->
        <ul class="flex flex-col px-6 py-8 gap-10 relative z-10">
            <li>
                <a href="{{ route('home') }}"
                class="block px-4 py-2 rounded w-full font-semibold text-gray-700 hover:bg-zinc-800 hover:text-white transition {{ request()->routeIs('home') ? 'bg-zinc-800 text-white font-semibold' : '' }}">
                    Home
                </a>
            </li>
            <li x-data="{ infoOpen: false }" class="w-full">
                <button @click="infoOpen = !infoOpen"
                        class="w-full flex justify-between items-center px-4 py-2 rounded hover:bg-blue-700 transition text-gray-700 font-semibold">
                    Info Sekolah
                    <svg :class="infoOpen ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <ul x-show="infoOpen"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="flex flex-col pl-4 mt-2 gap-2 bg-white rounded-lg shadow-md overflow-hidden">
                    
                    <li>
                        <a href="#" 
                        class="block px-4 py-2 cursor-pointer rounded hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                            Program Keahlian
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                        class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                            Organisasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('achievement') }}" 
                        class="block px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                            Prestasi
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('about') }}"
                class="block px-4 py-2 rounded w-full font-semibold text-gray-700 hover:bg-zinc-800 hover:text-white transition {{ request()->routeIs('about') ? 'bg-zinc-800 text-white font-semibold' : '' }}">
                    Tentang SMKN4
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}"
                class="block px-4 py-2 rounded w-full font-semibold text-gray-700 hover:bg-zinc-800 hover:text-white transition {{ request()->routeIs('contact') ? 'bg-zinc-800 text-white font-semibold' : '' }}">
                    Kontak Kami
                </a>
            </li>
            <li>
                <a href="/admin"
                class="block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-center shadow w-full transition">
                    Login
                </a>
            </li>
        </ul>
         <svg xmlns="http://www.w3.org/2000/svg"
             class=" bottom-4 left-4 w-30 h-30 opacity-10"
             fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
        </svg>
    </div>
</div>

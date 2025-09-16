<div id="navbar" 
    class="fixed top-0 left-0 w-full bg-white z-50 transition-all duration-300"
    x-data="{ open: false, scrolled: false }"
    x-init="
    window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50
        })
    " :class="scrolled ? 'shadow-lg bg-white backdrop-blur-md' : ''">

    <div class="container mx-auto px-6 py-4 bg-white flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img class="w-12 h-12" src="{{ asset('img/logo.png') }}" alt="Logo SMKN 4 Kuningan">
            <span class="text-xl font-bold text-gray-800 tracking-wide">SMKN 4 Kuningan</span>
        </a>

        <!-- Menu desktop -->
        <ul class="hidden md:flex gap-10 items-center text-gray-700 text-lg font-bold font-sans">
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


        <!-- Mobile Hamburger -->
        <button class="md:hidden cursor-pointer text-gray-600 focus:outline-none" @click="open = !open">
            ☰
        </button>
    </div>

    <!-- Dropdown mobile -->
    <div class="md:hidden bg-white shadow-md transform transition-all duration-300 origin-top"
        x-show="open"
        x-transition.scale.y
        x-transition.duration.500ms
    >
        <ul class="flex flex-col px-6 py-4 gap-2">
            <li><a href="" class="block hover:bg-gray-100 px-4 py-2 rounded">Home</a></li>
            <li><a href="" class="block hover:bg-gray-100 px-4 py-2 rounded">Tentang</a></li>
            <li><a href="" class="block hover:bg-gray-100 px-4 py-2 rounded">Kontak Kami</a></li>
            <li><a href="" class="block hover:bg-blue-700 bg-blue-500 transition-all duration-900 ease-in-out text-white px-4 py-2 rounded text-center shadow">Login</a></li>
        </ul>
    </div>
</div>

<div id="navbar"
     class="fixed top-0 left-0 w-full z-50 transition-all duration-500"
     x-data="{ open: false, scrolled: false }"
     @click.outside="open = false"
     x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50
        })
    "
     :class="scrolled 
        ? 'bg-white/80 backdrop-blur-lg shadow-md border-b border-gray-200'
        : 'bg-white/50 backdrop-blur-md border-b border-transparent'">

    <nav class="max-w-7xl mx-auto px-6 lg:px-8 z-50">
        <div class="flex justify-between items-center h-16">

            <!-- 🏫 Logo -->
            <a href="{{ route('home') }}" 
               class="flex items-center space-x-2 text-gray-900 font-bold text-lg tracking-wide group">
                <span class="bg-gradient-to-r from-blue-500 to-cyan-400 bg-clip-text text-transparent group-hover:opacity-90 transition">SMKN4</span>
                <span class="hidden sm:inline text-gray-600 group-hover:text-gray-900">KUNINGAN</span>
            </a>

            <!-- 🌐 Desktop Menu -->
            <div class="hidden md:flex items-center space-x-10">
                <a href="{{ route('home') }}" 
                   class="relative text-gray-600 hover:text-gray-900 transition font-medium 
                       after:absolute after:bottom-[-4px] after:left-0 after:h-[2px] after:bg-blue-500 
                       after:transition-all after:duration-300 hover:after:w-full
                       {{ request()->routeIs('home') ? 'text-gray-900 after:w-full' : 'after:w-0' }}">
                    Home
                </a>

                <a href="{{ route('about') }}" 
                   class="relative text-gray-600 hover:text-gray-900 transition font-medium 
                       after:absolute after:bottom-[-4px] after:left-0 after:h-[2px] after:bg-blue-500 
                       after:transition-all after:duration-300 hover:after:w-full
                       {{ request()->routeIs('about') ? 'text-gray-900 after:w-full' : 'after:w-0' }}">
                    Tentang SMKN4
                </a>

                <a href="{{ route('contact') }}" 
                   class="relative text-gray-600 hover:text-gray-900 transition font-medium 
                       after:absolute after:bottom-[-4px] after:left-0 after:h-[2px] after:bg-blue-500 
                       after:transition-all after:duration-300 hover:after:w-full
                       {{ request()->routeIs('contact') ? 'text-gray-900 after:w-full' : 'after:w-0' }}">
                    Kontak
                </a>
            </div>

            <!-- 🔑 Login Button -->
            <a href="/admin"
               class="hidden md:inline-flex items-center px-5 py-2 rounded-lg text-sm font-semibold text-white 
                   bg-gradient-to-r from-blue-600 to-cyan-500 hover:shadow-lg hover:scale-105 transition-all duration-300">
                Login
            </a>

            <!-- 🍔 Mobile Hamburger (tidak diubah) -->
            <div @click="open = !open"
                 class="z-50 relative w-10 h-10 bg-black rounded-full cursor-pointer flex items-center justify-center md:hidden">
                <div class="icon-left relative w-[10px] h-[2px] transition-all duration-500 ease-in-out"
                     :class="open ? 'translate-x-[8px] rotate-45 bg-blue-400' : ''"></div>
                <div class="icon-right relative w-[10px] h-[2px] transition-all duration-500 ease-in-out"
                     :class="open ? '-translate-x-[8px] -rotate-45 bg-blue-400' : ''"></div>
            </div>
        </div>
    </nav>

    <!-- 📱 Mobile Menu -->
    <div class="md:hidden absolute left-0 w-full bg-white/90 backdrop-blur-md shadow-lg border-t border-gray-200 z-40 origin-top"
         style="top: 100%;"
         x-cloak
         x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-12"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-12">

        <ul class="flex flex-col px-6 py-6 gap-4 text-center text-lg font-medium">
            <li>
                <a href="{{ route('home') }}"
                   class="block px-4 py-2 rounded w-full {{ request()->routeIs('home') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                   class="block px-4 py-2 rounded w-full {{ request()->routeIs('about') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    Tentang SMKN4
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}"
                   class="block px-4 py-2 rounded w-full {{ request()->routeIs('contact') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                    Kontak Kami
                </a>
            </li>
            <li>
                <a href="/admin"
                   class="block bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-cyan-500 hover:to-blue-600 transition text-white px-4 py-2 rounded-lg text-center shadow-md w-full">
                    Login
                </a>
            </li>
        </ul>
    </div>
</div>

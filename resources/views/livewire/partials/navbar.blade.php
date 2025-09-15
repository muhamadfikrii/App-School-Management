<div id="navbar" class="fixed top-0 left-0 w-full bg-white z-50 transition-all duration-300">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img class="w-12 h-12" src="{{ asset('img/logo.png') }}" alt="Logo SMKN 4 Kuningan">
            <span class="text-xl font-bold text-gray-800 tracking-wide">SMKN 4 Kuningan</span>
        </a>

        <!-- Menu desktop -->
        <ul class="hidden md:flex gap-10 items-center text-gray-700 text-xl font-medium">
            <li>
                <a href="{{ route('home') }}" class="relative group hover:text-blue-600">
                    Home
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
            </li>
             <li>
                <a href="{{ route('About') }}" class="relative group hover:text-blue-600">
                    About
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
            </li>

            <li>
                <a href="" class="relative group hover:text-blue-600">
                    Kontak Kami
                    <span class="absolute left-0 -bottom-1 w-0 h-[2px] bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
            </li>
            <li class="ml-4">
                <a href="/admin" class="px-5 py-2 rounded-lg shadow bg-gradient-to-r from-blue-600 to-white text-blue-800 font-semibold
                transition-all duration-900 ease-in-out hover:from-white hover:to-blue-600 hover:text-white">
                    Login
                </a>
            </li> 
        </ul>

        <!-- Mobile Hamburger -->
        <button class="md:hidden text-gray-600 focus:outline-none" id="menu-toggle">
            ☰
        </button>
    </div>

    <!-- Dropdown mobile -->
    <div class="md:hidden hidden bg-white shadow-md transform transition-all duration-300 origin-top" id="mobile-menu">
        <ul class="flex flex-col px-6 py-4 gap-2">
            <li><a href="" class="block hover:bg-gray-100 px-4 py-2 rounded">Home</a></li>
            <li><a href="" class="block hover:bg-gray-100 px-4 py-2 rounded">Blog</a></li>
            <li><a href="#" class="block hover:bg-gray-100 px-4 py-2 rounded">Profil</a></li>
            <li><a href="#" class="block hover:bg-gray-100 px-4 py-2 rounded">Jurusan</a></li>
            <li><a href="" class="block hover:bg-gray-100 px-4 py-2 rounded">Prestasi</a></li>
            <li><a href="#" class="block hover:bg-gray-100 px-4 py-2 rounded">Galeri</a></li>
            <li><a href="" class="block hover:bg-gray-100 px-4 py-2 rounded">Kontak Kami</a></li>
            <li><a href="" class="block bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded text-center shadow">Login</a></li>
        </ul>
    </div>

</div>

<script>
    // Toggle mobile menu dengan animasi slide
    document.getElementById('menu-toggle').addEventListener('click', () => {
        const mm = document.getElementById('mobile-menu');
        mm.classList.toggle('hidden');
        mm.classList.toggle('scale-y-0');
    });

    // Navbar shadow ketika scroll
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('shadow-lg', 'bg-white/95', 'backdrop-blur-md');
        } else {
            navbar.classList.remove('shadow-lg', 'bg-white/95', 'backdrop-blur-md');
        }
    });
</script>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <title>{{ ucfirst(Route::currentRouteName()) }} | SMKN4 KNG</title>

    {{-- Tailwind Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="overflow-x-hidden">
 
    {{-- Navbar --}}
    @include('livewire.partials.navbar')

    {{-- Konten utama --}}
    <main>
        {{ $slot }}
    </main>

<footer id="kontak" class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-12 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
        
        <!-- Info Sekolah -->
        <div class="space-y-4 text-center md:text-left">
            <h2 class="text-2xl sm:text-3xl font-bold">SMKN 4 Kuningan</h2>
            <p class="text-gray-100 text-sm sm:text-base">Jl. Contoh No. 123, Kuningan, Jawa Barat</p>
                <span class="text-gray-100 text-sm sm:text-base">Email:
                    <a href="mailto:info@smkn4kuningan.sch.id" class="underline hover:text-blue-200">info@smkn4kuningan.sch.id</a> 
                </span>
                <span class="text-gray-100 text-sm sm:text-base block mt-3">Telp:
                    <a href="wa.me/+62123456" class="underline hover:text-blue-200">(0232) 123456</a>
                </span>
            <p class="text-xs sm:text-sm text-gray-200 mt-4">© 2025 SMKN 4 Kuningan. All rights reserved.</p>
        </div>

        <!-- Quick Links -->
        <div class="text-center md:text-left space-y-2 mt-6 md:mt-0">
            <h3 class="text-2xl font-semibold mb-2">Quick Links</h3>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('home') }}" class="hover:text-gray-200 text-lg hover:underline transition-colors">Home</a>
                </li>
                <li>
                    <a href="{{ route('jurusan') }}" class="hover:text-gray-200 text-lg hover:underline transition-colors">Program Keahlian</a>
                </li>
                <li>
                    <a href="{{ route('organisasi') }}" class="hover:text-gray-200 text-lg hover:underline transition-colors">Organisasi</a>
                </li>
                <li>
                    <a href="{{ route('achievement') }}" class="hover:text-gray-200 text-lg hover:underline transition-colors">Prestasi</a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="hover:text-gray-200 text-lg hover:underline transition-colors">Tentang SMKN4</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="hover:text-gray-200 text-lg hover:underline transition-colors">Kontak Kami</a>
                </li>
            </ul>
        </div>

        <!-- Sosial Media -->
        <div class="flex flex-col items-center md:items-end space-y-4 mt-6 md:mt-0">
            <h3 class="font-[Poppins] text-2xl font-semibold">Sosial Media</h3>
            <div class="flex flex-wrap justify-center md:justify-end gap-3">
                <!-- Instagram -->
                <a href="https://www.instagram.com/smkn_04kng/" target="_blank" class="p-3 rounded-full bg-white text-pink-500 shadow-lg transform transition duration-500 hover:scale-110 hover:rotate-12">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm8.75 2a.75.75 0 1 1 0 1.5.75.75 0 0 1 0-1.5zM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 1.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7z"/>
                    </svg>
                </a>
                <!-- WhatsApp -->
                <a href="https://wa.me/628123456789" target="_blank" class="p-3 rounded-full bg-white text-green-500 shadow-lg transform transition duration-500 hover:scale-110 hover:rotate-12">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.52 3.48a11.91 11.91 0 0 0-16.83 16.83l-1.2 4.38 4.5-1.18a11.91 11.91 0 0 0 13.53-19.87zm-8.52 15.03a9.75 9.75 0 0 1-5.07-1.42l-.36-.21-3.03.79.81-3.03-.23-.37a9.75 9.75 0 1 1 8.88 4.24zM16.5 14.6c-.23-.11-1.34-.66-1.54-.74s-.36-.11-.51.11-.58.74-.71.89-.26.16-.49.06a6.56 6.56 0 0 1-1.93-1.18 7.13 7.13 0 0 1-1.32-1.63c-.14-.23 0-.35.1-.46s.23-.26.35-.39.16-.23.25-.38.08-.23 0-.38-.51-1.21-.7-1.65c-.18-.43-.36-.37-.51-.38s-.27 0-.41 0a1.54 1.54 0 0 0-.56.27 2.38 2.38 0 0 0-.87.92c-.3.46-1.18 1.15-1.18 2.8s1.21 3.24 1.38 3.46 2.4 3.66 5.82 5.05c.81.35 1.44.56 1.93.72.81.28 1.54.24 2.12.15s1.34-.55 1.53-1.08.19-1 .13-1.08-.24-.17-.51-.28z"/>
                    </svg>
                </a>
                <!-- Email -->
                <a href="mailto:info@smkn4kuningan.sch.id" class="p-3 rounded-full bg-white text-red-500 shadow-lg transform transition duration-500 hover:scale-110 hover:rotate-12">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2 4a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4zm2 0v.01L12 13 20 4.01V4H4zm0 2.18V20h16V6.18l-8 7.82-8-7.82z"/>
                    </svg>
                </a>
                <!-- LinkedIn -->
                <a href="#" target="_blank" class="p-3 rounded-full bg-white text-blue-700 shadow-lg transform transition duration-500 hover:scale-110 hover:rotate-12">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.762 2.239 5 5 5h14c2.762 0 5-2.238 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.268c-.966 0-1.75-.784-1.75-1.75s.784-1.75 1.75-1.75 1.75.784 1.75 1.75-.784 1.75-1.75 1.75zm13.5 11.268h-3v-5.604c0-1.337-.027-3.062-1.867-3.062-1.867 0-2.153 1.459-2.153 2.968v5.698h-3v-10h2.879v1.367h.041c.401-.757 1.379-1.555 2.838-1.555 3.035 0 3.597 1.998 3.597 4.59v5.598z"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</footer>



<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init({
        duration: 1500, 
        easing: 'ease-in-out', 
        once: true, 
    });
</script>

        {{-- Gsap --}}
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>

    @livewireScripts
</body>
</html>

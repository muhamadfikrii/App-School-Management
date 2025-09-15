<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>{{ $title ?? 'SMKN 4 Kuningan' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-poppins">

    {{-- Navbar --}}
    @include('livewire.partials.navbar')

    {{-- Konten utama --}}
    <main class="w-full mt-20">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer id="kontak" class="bg-gradient-to-r from-blue-800 to-blue-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
            
            <!-- Kontak Info -->
            <div class="text-center md:text-left">
                <h3 class="text-2xl font-bold mb-4">SMKN 4 Kuningan</h3>
                <p class="text-gray-200 mb-1">Jl. Contoh No. 123, Kuningan, Jawa Barat</p>
                <p class="text-gray-200 mb-4">Email: info@smkn4kuningan.sch.id | Telp: (0232) 123456</p>
                <p class="text-sm text-gray-300">© 2025 SMKN 4 Kuningan. All rights reserved.</p>
            </div>

            <!-- Social Media -->
            <div class="flex justify-center md:justify-end items-center space-x-4 mt-4 md:mt-0">
                <a href="#" class="p-3 rounded-full bg-blue-600 hover:bg-white hover:text-blue-700 transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.99 3.66 9.13 8.44 9.88v-6.99h-2.54v-2.89h2.54v-2.21c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.89h-2.34v6.99C18.34 21.13 22 16.99 22 12z"/>
                    </svg>
                </a>
                <a href="#" class="p-3 rounded-full bg-blue-600 hover:bg-white hover:text-blue-700 transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.41 3.59 8 8 8 1.49 0 2.86-.44 4-1.19l3.68 3.68 1.41-1.41-3.68-3.68c.75-1.14 1.19-2.51 1.19-4 0-4.41-3.59-8-8-8zm0 14c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6z"/>
                    </svg>
                </a>
                <a href="#" class="p-3 rounded-full bg-blue-600 hover:bg-white hover:text-blue-700 transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.615 3.184c-.38-.143-1.57-.152-4.615-.152-3.045 0-4.235.009-4.615.152-1.24.467-2.08 1.96-2.08 4.05v5.435c0 2.09.84 3.583 2.08 4.05.38.143 1.57.152 4.615.152 3.045 0 4.235-.009 4.615-.152 1.24-.467 2.08-1.96 2.08-4.05V7.234c0-2.09-.84-3.583-2.08-4.05zm-8.615 7.816v-4l3.75 2-3.75 2z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    @livewireScripts
</body>
</html>

<div class="overflow-x-hidden" loading="lazy">
   <section class="relative min-h-screen w-full flex items-center overflow-hidden bg-gradient-to-br from-blue-50 via-white to-blue-100">

        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-8 left-8 w-40 h-40 md:w-64 md:h-64 bg-orange-300/30 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-16 right-16 w-[18rem] h-[18rem] md:w-[30rem] md:h-[30rem] bg-blue-400/20 rounded-full blur-3xl"></div>
            <div class="absolute top-1/4 right-1/3 w-48 h-48 md:w-80 md:h-80 bg-gradient-to-tr from-blue-300/20 to-cyan-200/10 rounded-full blur-2xl rotate-[25deg]"></div>
        </div>

        <!-- Konten utama -->
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 items-center gap-12 px-6 sm:px-10 lg:px-24 py-24 w-full">

            <!-- Kolom Kiri -->
            <div data-aos="fade-right" class="space-y-6 text-center lg:text-left">
            <!-- Heading utama -->
            <h1 class="relative text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-serif font-bold leading-tight text-zinc-900">
                Selamat Datang di 
                <span class="relative inline-block text-blue-800">
                SMKN 4 KUNINGAN

                <!-- SVG cincin miring -->
                <svg 
                    class="absolute inset-0 -z-10 w-[180%] h-[180%] left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-80"
                    viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <defs>
                    <linearGradient id="ringGrad" x1="0" x2="1">
                        <stop offset="0%" stop-color="#60a5fa"/>
                        <stop offset="50%" stop-color="#7c3aed"/>
                        <stop offset="100%" stop-color="#f59e0b"/>
                    </linearGradient>
                    <style>
                        .spin-slow {
                        transform-origin: 100px 100px;
                        animation: spin 14s linear infinite;
                        }
                        @keyframes spin {
                        from { transform: rotate(0deg); }
                        to { transform: rotate(360deg); }
                        }
                    </style>
                    </defs>

                    <!-- Cincin miring -->
                    <g class="spin-slow">
                    <ellipse cx="100" cy="100" rx="75" ry="30" fill="none"
                        stroke="url(#ringGrad)" stroke-width="18"
                        stroke-linecap="round" transform="rotate(-25 100 100)" />
                    </g>

                    <!-- Planet -->
                    <circle cx="100" cy="100" r="44" fill="#2563eb" />
                    <ellipse cx="82" cy="82" rx="10" ry="6" fill="rgba(255,255,255,0.2)" />
                </svg>
                </span>
            </h1>

            <!-- Subheading -->
            <div class="inline-block px-4 py-1 rounded-full bg-blue-100 text-blue-800 font-medium text-sm shadow-sm">
                Sekolah Vokasi Terdepan
            </div>

            <!-- Heading kedua -->
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-zinc-900 leading-tight">
                Masa Depan <span class="text-blue-700">Terbaik</span>  
                Dimulai dengan <span class="text-orange-500">Pendidikan</span>
            </h2>

            <!-- Paragraf -->
            <p class="text-base sm:text-lg md:text-xl text-zinc-600 font-[Poppins] leading-relaxed max-w-2xl mx-auto lg:mx-0">
                SMKN 4 Kuningan membentuk generasi kreatif & siap industri lewat kurikulum modern serta fasilitas mutakhir.
            </p>

            <!-- Tombol -->
            <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4 pt-4">
                <a href="#jurusan"
                class="px-8 py-3 rounded-xl font-semibold text-white bg-blue-700 shadow-lg transition transform hover:-translate-y-1 hover:bg-transparent hover:text-blue-600 border border-blue-700">
                Jelajahi Jurusan
                </a>
            </div>
            </div>

            <!-- Kolom Kanan: Gambar -->
            <div data-aos="fade-left" class="relative flex justify-center lg:justify-end">
            <div class="relative w-full max-w-[420px] sm:max-w-[500px] md:max-w-[600px] lg:max-w-[500px]">
                <img 
                src="https://images.pexels.com/photos/6684533/pexels-photo-6684533.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                alt="Ilustrasi Sekolah / Siswa" 
                class="rounded-[2rem] shadow-2xl w-full h-auto object-cover"
                />
                
                <!-- Kartu Info -->
                <div class="absolute -bottom-8 left-4 sm:-bottom-10 sm:-left-8 bg-white/70 backdrop-blur-md rounded-2xl p-4 shadow-lg border border-white/30 w-[200px] sm:w-[220px]">
                <h3 class="font-semibold text-blue-800 text-sm sm:text-base">Fasilitas Lengkap</h3>
                <p class="text-xs sm:text-sm text-zinc-600 leading-snug">Lab teknologi, ruang kreatif, dan workshop modern.</p>
                </div>
            </div>
            </div>
        </div>
    </section>


    <section id="contact" 
        class="relative z-10 mx-6 lg:mx-20 -mt-10 rounded-full overflow-hidden bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500 text-white shadow-2xl">

        <!-- Background Glassy Overlay -->
        <div class="absolute inset-0 bg-white/10 backdrop-blur-md"></div>

        <div class="relative flex flex-col md:flex-row items-center justify-between px-8 py-6 gap-6">
            <!-- Left Content -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo SMKN 4 Kuningan" class="w-14 h-14 rounded-xl shadow-md bg-white/30 p-2 backdrop-blur-md">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold leading-tight">
                        Hubungi Kami Untuk Info Lebih Lanjut
                    </h2>
                    <p class="text-sm text-blue-100">Kami siap membantu Anda mengenal SMKN 4 Kuningan lebih dekat.</p>
                </div>
            </div>

            <!-- Right Content: Button -->
            <a href="{{ route('contact') }}"
            class="group flex items-center gap-2 bg-white text-blue-700 px-6 py-3 rounded-full font-semibold 
                    shadow-lg transition-all duration-300 hover:bg-blue-100 hover:shadow-xl hover:-translate-y-1">
                <span>Lihat Kontak</span>
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" 
                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6-6m6 6l-6 6" />
                </svg>
            </a>
        </div>
    </section>


    <!-- Livewire Components -->
    <livewire:partials.history/>
    <livewire:partials.statistics/>
     <!-- Achievements Section -->
    <section id="jurusan" class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle_at_20%_20%,rgba(59,130,246,0.15),transparent_60%)]"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-16 tracking-tight" data-aos="fade-up">
            Program Keahlian Unggulan
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            
            <!-- PPLG -->
            <a href="{{ url('/jurusan/pplg') }}"
                class="group relative bg-white rounded-2xl shadow-md border border-transparent 
                        p-8 block transform-gpu
                        duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                        hover:-translate-y-3 hover:shadow-2xl hover:border-blue-400 hover:bg-gradient-to-br hover:from-white hover:to-blue-50">

                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('img/jurusan-pplg.jpg') }}" alt="PPLG"
                            class="w-32 h-32 object-contain rounded-xl
                                    transition-transform duration-700 ease-[cubic-bezier(0.4,0,0.2,1)] 
                                    group-hover:scale-105">
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-2 
                            transition-colors duration-500 ease-in-out group-hover:text-blue-700">
                        Pengembangan Perangkat Lunak & Gim
                    </h3>

                    <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                        Fokus pada pemrograman, desain antarmuka, pengembangan aplikasi, dan teknologi digital.
                    </p>

                    <span class="inline-block mt-3 text-blue-600 font-medium 
                                transition-all duration-500 ease-in-out 
                                group-hover:translate-x-2">
                        Lihat Detail →
                    </span>

                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 
                            transition-opacity duration-700 ease-in-out 
                            bg-gradient-to-br from-blue-100/30 to-transparent pointer-events-none"></div>
            </a>


            <!-- MPLB -->
            <a href="{{ url('/jurusan/mplb') }}" 
                class="group relative bg-white rounded-2xl shadow-md border border-transparent 
                        p-8 block transform-gpu
                        duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                        hover:-translate-y-3 hover:shadow-2xl hover:border-blue-400 hover:bg-gradient-to-br hover:from-white hover:to-blue-50">
                <div class="flex justify-center mb-6">
                <img src="{{ asset('img/jurusan-mplb.png') }}" alt="MPLB"
                    class="w-32 h-32 object-contain rounded-xl transition-transform duration-500 group-hover:scale-110">
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors duration-300">
                Manajemen Perkantoran & Layanan Bisnis
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                Mempelajari pengelolaan administrasi modern, layanan pelanggan, dan komunikasi bisnis.
                </p>
                <span class="inline-block mt-3 text-blue-600 font-medium group-hover:translate-x-1 transition-transform duration-300">
                Lihat Detail →
                </span>

                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 
                            transition-opacity duration-700 ease-in-out 
                            bg-gradient-to-br from-blue-100/30 to-transparent pointer-events-none"></div>
            </a>

            <!-- AKL -->
            <a href="{{ url('/jurusan/akl') }}" 
                class="group relative bg-white rounded-2xl shadow-md border border-transparent 
                        p-8 block transform-gpu
                        duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                        hover:-translate-y-3 hover:shadow-2xl hover:border-blue-400 hover:bg-gradient-to-br hover:from-white hover:to-blue-50">
                <div class="flex justify-center mb-6">
                <img src="{{ asset('img/jurusan-akl.png') }}" alt="AKL"
                    class="w-32 h-32 object-contain rounded-xl transition-transform duration-500 group-hover:scale-110">
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors duration-300">
                Akuntansi & Keuangan Lembaga
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                Pembelajaran pembukuan, analisis laporan keuangan, dan manajemen lembaga keuangan.
                </p>
                <span class="inline-block mt-3 text-blue-600 font-medium group-hover:translate-x-1 transition-transform duration-300">
                Lihat Detail →
                </span>
            </a>

            <!-- TBSM -->
            <a href="{{ url('/jurusan/tbsm') }}" 
               class="group relative bg-white rounded-2xl shadow-md border border-transparent 
                        p-8 block transform-gpu
                        duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                        hover:-translate-y-3 hover:shadow-2xl hover:border-blue-400 hover:bg-gradient-to-br hover:from-white hover:to-blue-50">
                <div class="flex justify-center mb-6">
                <img src="{{ asset('img/jurusan-tbsm.png') }}" alt="TBSM"
                    class="w-32 h-32 object-contain rounded-xl transition-transform duration-500 group-hover:scale-110">
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors duration-300">
                Teknik & Bisnis Sepeda Motor
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                Menguasai perawatan, servis, dan inovasi pada kendaraan roda dua berbasis teknologi terkini.
                </p>
                <span class="inline-block mt-3 text-blue-600 font-medium group-hover:translate-x-1 transition-transform duration-300">
                Lihat Detail →
                </span>
            </a>

            <!-- TKR -->
            <a href="{{ url('/jurusan/tkro') }}" 
                class="group relative bg-white rounded-2xl shadow-md border border-transparent 
                        p-8 block transform-gpu
                        duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                        hover:-translate-y-3 hover:shadow-2xl hover:border-blue-400 hover:bg-gradient-to-br hover:from-white hover:to-blue-50">
                <div class="flex justify-center mb-6">
                <img src="{{ asset('img/jurusan-tkr.png') }}" alt="TKR"
                    class="w-32 h-32 object-contain rounded-xl transition-transform duration-500 group-hover:scale-110">
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors duration-300">
                Teknik Kendaraan Ringan Otomotif
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                Melatih keahlian otomotif untuk perawatan, sistem kelistrikan, dan diagnostik kendaraan modern.
                </p>
                <span class="inline-block mt-3 text-blue-600 font-medium group-hover:translate-x-1 transition-transform duration-300">
                Lihat Detail →
                </span>
            </a>

            <!-- TKL -->
            <a href="{{ url('/jurusan/tkl') }}" 
                class="group relative bg-white rounded-2xl shadow-md border border-transparent 
                        p-8 block transform-gpu
                        duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                        hover:-translate-y-3 hover:shadow-2xl hover:border-blue-400 hover:bg-gradient-to-br hover:from-white hover:to-blue-50">
                <div class="flex justify-center mb-6">
                <img src="{{ asset('img/jurusan-listrik.png') }}" alt="Listrik"
                    class="w-32 h-32 object-contain rounded-xl transition-transform duration-500 group-hover:scale-110">
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors duration-300">
                Teknik Ketenagalistrikan
                </h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4">
                Menguasai sistem instalasi, pemeliharaan, dan kontrol listrik industri maupun rumah tangga.
                </p>
                <span class="inline-block mt-3 text-blue-600 font-medium group-hover:translate-x-1 transition-transform duration-300">
                Lihat Detail →
                </span>
            </a>

            </div>
        </div>
    </section>

    <livewire:partials.cta/>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-blue-700 mb-8">Prestasi Siswa</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($achievements as $achievement)
                    <a href="{{ route('achievement.detail', $achievement->id) }}" class="bg-white border border-gray-200 rounded-2xl p-6 shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                        
                        @if ($achievement->photo)
                            <img src="{{ asset('storage/' . $achievement->photo) }}" 
                                alt="{{ $achievement->title }}" 
                                class="rounded-xl mb-4 w-full h-48 object-cover shadow-sm">
                        @else
                            <div class="rounded-xl mb-4 w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                <span class="text-4xl font-bold">🎖️</span>
                            </div>
                        @endif

                        <h3 class="text-xl font-semibold text-blue-700 mb-2 truncate">{{ $achievement->title }}</h3>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-4">{{ $achievement->description }}</p>

                        <div class="flex items-center justify-between text-gray-400 text-xs">
                            <span>{{ $achievement->student->full_name ?? 'Tim' }}</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-[10px] font-semibold">{{ $achievement->level }}</span>
                            <span>{{ \Carbon\Carbon::parse($achievement->date)->format('d M Y') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <livewire:partials.galeri/>

    <!-- Marquee -->
    <div class="relative bg-gradient-to-r from-blue-800 to-blue-700 text-white py-3 overflow-hidden">
        <div class="whitespace-nowrap animate-marquee hover:[animation-play-state:paused]">
            🌟 SMKN 4 Kuningan – Membangun Generasi Unggul, Berkarakter, dan Siap Menghadapi Tantangan Global 🌟
            | 💻 Raih Prestasi dan Kembangkan Potensi Bersama Kami! 💡
        </div>
    </div>
</div>

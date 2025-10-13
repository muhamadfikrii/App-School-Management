<div class="min-w-screen overflow-x-hidden" loading="lazy">
    <section class="relative w-full h-screen flex items-center justify-center md:mx-auto lg:mx-auto
                bg-gradient-to-br from-white via-blue-50 to-zinc-50 overflow-hidden">

        <div class="absolute -top-32 -left-32 w-80 md:w-96 h-80 md:h-96 bg-blue-300 rounded-full opacity-20 blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-32 -right-32 w-80 md:w-96 h-80 md:h-96 bg-blue-400 rounded-full opacity-20 blur-2xl animate-pulse-slow"></div>

        <div class="relative px-6 md:px-8 lg:px-12 max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

            <!-- Teks -->
            <div data-aos="fade-right" class="space-y-4 text-center lg:text-left z-10">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-zinc-800">
                    Selamat Datang di
                </h1>
                <h2 class="text-3xl sm:text-4xl md:text-5xl uppercase font-extrabold font-[Poppins] text-blue-800 tracking-wide">
                    SMKN 4 Kuningan
                </h2>
                <p id="subtext" class="mt-2 text-base md:text-lg font-[Poppins] text-zinc-600 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    Menjadi sekolah vokasi unggulan dengan fasilitas modern dan kurikulum berbasis industri.
                </p>

                <div class="mt-6 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="#jurusan"
                       class="px-6 py-3 rounded-lg font-semibold text-white bg-blue-700 
                              shadow-md transition duration-300 hover:bg-blue-600 hover:shadow-lg">
                        Jelajahi Sekolah
                    </a>
                    <a href="{{ route('contact') }}"
                       class="px-6 py-3 rounded-lg font-semibold text-blue-700 border-2 border-blue-700 bg-white 
                              shadow-md transition duration-300 hover:bg-blue-700 hover:text-white hover:shadow-lg">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <!-- Gambar Hero -->
            <div class="flex justify-center mt-8 lg:mt-0 z-10" data-aos="fade-left">
                <img src="{{ asset('img/selamat-datang.jpg') }}" alt="Selamat Datang"
                     class="rounded-2xl shadow-xl w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg h-auto object-contain">
            </div>

        </div>
    </section>

    <!-- Livewire Components -->
    <livewire:partials.history/>
    <livewire:partials.statistics/>
    <livewire:partials.program/>
    <livewire:partials.achievement/>
    <livewire:partials.cta/>
    <livewire:partials.galeri/>

    <!-- Marquee -->
    <div class="relative bg-gradient-to-r from-blue-800 to-blue-700 text-white py-3 overflow-hidden">
        <div class="whitespace-nowrap animate-marquee hover:[animation-play-state:paused]">
            🌟 SMKN 4 Kuningan – Membangun Generasi Unggul, Berkarakter, dan Siap Menghadapi Tantangan Global 🌟
            | 💻 Raih Prestasi dan Kembangkan Potensi Bersama Kami! 💡
        </div>
    </div>
</div>

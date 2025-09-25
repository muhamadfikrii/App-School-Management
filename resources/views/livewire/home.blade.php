<div class="min-w-screen overflow-x-hidden">
    <section class="relative min-h-[60vh] mt-16 w-full flex items-center md:min-h-screen bg-white bg-cover bg-center"
         style="background-image: url('{{ asset('img/Background.jpg') }}');">
    
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black opacity-10"></div>

            <!-- Kontainer utama -->
            <div class="relative px-4 max-w-[1280px] mx-auto sm:px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-12 items-center">

                <!-- Teks -->
                <div data-aos="fade-right" data-aos-duration="2000" class="space-y-3 sm:space-y-4 text-center md:text-left">
                    <h1 class="text-xl sm:text-2xl md:text-5xl font-bold text-white">
                        Selamat Datang di
                    </h1>

                    <h2 class="text-2xl sm:text-3xl md:text-5xl uppercase font-extrabold font-[Poppins] text-blue-700 tracking-wide drop-shadow-lg">
                        SMKN 4 Kuningan
                    </h2>

                    <p id="subtext" class="mt-1 sm:mt-2 text-sm sm:text-base md:text-lg text-gray-100 max-w-full md:max-w-xl leading-relaxed">
                        
                    </p>

                    <<div class="mt-3 sm:mt-4 flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                        <!-- Jelajahi Sekolah -->
                        <a href="#jurusan"
                        class="relative overflow-hidden px-6 py-3 rounded-xl font-semibold text-white bg-blue-700 shadow-lg transform transition duration-300 hover:scale-105 hover:bg-white hover:text-blue-700">
                            <span class="absolute inset-0 opacity-10 blur-xl animate-pulse"></span>
                            <span class="relative z-10">Jelajahi Sekolah</span>
                        </a>

                        <!-- Hubungi Kami -->
                        <a href="{{ route('Contact') }}"
                        class="relative overflow-hidden px-6 py-3 rounded-xl font-semibold text-blue-600 border-2 border-white bg-white shadow-lg transform transition duration-300 hover:scale-105 hover:text-white hover:bg-blue-700">
                            <span class="absolute inset-0 opacity-10 blur-xl animate-pulse"></span>
                            <span class="relative z-10">Hubungi Kami</span>
                        </a>
                    </div>



                </div>

                <!-- Gambar -->
                <div class="flex justify-center mt-6 md:mt-0" data-aos="fade-left" data-aos-duration="3000">
                    <img src="{{ asset('img/selamat-datang.jpg') }}" alt="Selamat Datang"
                        class="rounded-2xl shadow-xl w-3/4 sm:w-2/3 max-w-full sm:max-w-lg md:max-w-2xl">
                </div>

            </div>
    </section>

    <div class="flex flex-col md:flex-row justify-center items-start gap-6 mx-auto my-16 px-4 sm:px-6 lg:px-12" data-aos="fade-up" data-aos-duration="2000">
        
        <!-- Logo -->
        <img src="{{ asset('img/logo.png') }}" alt="Logo SMKN 4 Kuningan" data-aos="flip-left"
             data-aos-duration="2000"
             class="w-32 sm:w-40 md:w-48 h-auto rounded-lg shadow-md flex-shrink-0 transition-transform duration-500 hover:scale-105">

        <!-- Info Box dengan border -->
        <div class="relative border border-gray-200 p-6 rounded-xl flex-1 shadow-sm hover:shadow-md transition duration-300 bg-white"
             data-aos="fade-up-left" data-aos-duration="2000">

            <!-- Ping dots -->
            <span class="absolute -top-3 left-0">
                <span class="absolute inline-flex h-4 w-4 animate-ping rounded-full bg-sky-400 opacity-75"></span>
                <span class="relative inline-flex h-4 w-4 rounded-full bg-sky-500"></span>
            </span>
            <span class="absolute -top-3 right-0">
                <span class="absolute inline-flex h-4 w-4 animate-ping rounded-full bg-sky-500 opacity-75"></span>
                <span class="relative inline-flex h-4 w-4 rounded-full bg-sky-500"></span>
            </span>

            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">SMKN 4 KUNINGAN</h1>

            <div class="flex gap-2 mt-2">
                <div class="w-8 h-3 bg-blue-700"
                     style="clip-path: polygon(20% 0, 100% 0, 80% 100%, 0 100%);"></div>
                <div class="w-24 h-3 bg-blue-600"
                     style="clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%);"></div>
            </div>

            <p class="mt-6 text-base sm:text-lg text-gray-700 leading-relaxed">
                SMKN 4 Kuningan berdiri pada tahun 2005 sebagai sekolah kejuruan unggulan di Kabupaten Kuningan.
                Memiliki 6 kompetensi keahlian dan lebih dari 1.500 siswa aktif, kami berkomitmen mencetak lulusan berkarakter, siap menghadapi dunia kerja, dan lanjut pendidikan tinggi.
            </p>
        </div>
    </div>

    <!-- Statistik / Counter Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 text-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="2500">0</h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Siswa Aktif</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="75">0</h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Guru & Staff</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="50">0</h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Prestasi Nasional</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="6">0</h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Program Keahlian</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Keahlian Section -->
   <section id="jurusan" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12" data-aos="fade-up">Program Keahlian</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Setiap Card -->
                <div class="border rounded-lg p-6 bg-white shadow hover:shadow-lg transition transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('img/jurusan-pplg.jpg') }}" alt="PPLG" class="w-24 mx-auto h-24 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Pemrograman Perangkat Lunak & Gim</h3>
                    <p class="text-gray-600 text-sm md:text-base">Pemrograman, basis data, desain UI/UX, dan pengembangan aplikasi modern.</p>
                </div>
                <!-- Tambahkan delay berbeda untuk card lain agar animasinya staggered -->
                <div class="border rounded-lg p-6 bg-white shadow hover:shadow-lg transition transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/jurusan-mplb.png') }}" alt="MPLB" class="w-24 mx-auto h-24 object-cover bg-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Manajemen Perkantoran Layanan Bisnis</h3>
                    <p class="text-gray-600 text-sm md:text-base">Keterampilan administrasi perkantoran, layanan bisnis, dan digitalisasi administrasi.</p>
                </div> 
                <div class="border rounded-lg p-6 bg-white shadow hover:shadow-lg transition transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/jurusan-akl.png') }}" alt="MPLB" class="w-24 mx-auto h-24 object-cover bg-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Manajemen Perkantoran Layanan Bisnis</h3>
                    <p class="text-gray-600 text-sm md:text-base">Keterampilan administrasi perkantoran, layanan bisnis, dan digitalisasi administrasi.</p>
                </div> 
                <div class="border rounded-lg p-6 bg-white shadow hover:shadow-lg transition transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/jurusan-tbsm.png') }}" alt="MPLB" class="w-24 mx-auto h-24 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Manajemen Perkantoran Layanan Bisnis</h3>
                    <p class="text-gray-600 text-sm md:text-base">Keterampilan administrasi perkantoran, layanan bisnis, dan digitalisasi administrasi.</p>
                </div> 
                <div class="border rounded-lg p-6 bg-white shadow hover:shadow-lg transition transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/jurusan-tkr.png') }}" alt="MPLB" class="w-24 mx-auto h-24 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Manajemen Perkantoran Layanan Bisnis</h3>
                    <p class="text-gray-600 text-sm md:text-base">Keterampilan administrasi perkantoran, layanan bisnis, dan digitalisasi administrasi.</p>
                </div> 
                <div class="border rounded-lg p-6 bg-white shadow hover:shadow-lg transition transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/jurusan-listrik.png') }}" alt="MPLB" class="w-24 mx-auto h-24 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-blue-700 mb-2">Manajemen Perkantoran Layanan Bisnis</h3>
                    <p class="text-gray-600 text-sm md:text-base">Keterampilan administrasi perkantoran, layanan bisnis, dan digitalisasi administrasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section id="prestasi" class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-800" data-aos="fade-up">Prestasi Siswa</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 p-6" data-aos="flip-left" data-aos-duration="2000">
                    <div class="w-full h-64 overflow-hidden rounded-lg mb-4">
                        <img src="https://picsum.photos/600/400?student" alt="Prestasi 1" class="w-full h-full object-cover transform transition duration-500 hover:scale-110">
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Juara 1 LKS IT Software</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet...</p>
                </div><div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 p-6" data-aos="flip-left" data-aos-duration="2000">
                    <div class="w-full h-64 overflow-hidden rounded-lg mb-4">
                        <img src="https://picsum.photos/600/400?student2" alt="Prestasi 1" class="w-full h-full object-cover transform transition duration-500 hover:scale-110">
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Juara 1 LKS IT Software</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet...</p>
                </div><div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 p-6" data-aos="flip-left" data-aos-duration="2000">
                    <div class="w-full h-64 overflow-hidden rounded-lg mb-4">
                        <img src="https://picsum.photos/600/400?student3" alt="Prestasi 1" class="w-full h-full object-cover transform transition duration-500 hover:scale-110">
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Juara 1 LKS IT Software</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet...</p>
                </div>
            </div>
        </div>
    </section>

    <section id="daftar" class="py-20 bg-gradient-to-r from-blue-700 to-blue-500 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 text-center" data-aos="zoom-in" data-aos-duration="2000">
            <h2 class="text-3xl md:text-5xl font-extrabold mb-6 drop-shadow-lg">
                Bergabunglah dengan SMKN 4 Kuningan!
            </h2>
            <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto drop-shadow-md">
                Kembangkan keterampilan dan kompetensi Anda, raih prestasi, dan jadilah generasi unggul yang siap menghadapi tantangan masa depan. 
                Daftar sekarang dan mulai perjalanan Anda menuju kesuksesan!
            </p>
            <a href=""
            class="inline-block px-6 py-3 text-lg sm:text-xl font-semibold rounded-xl bg-white text-blue-700 shadow-md hover:bg-blue-700 hover:text-white transition transform hover:-translate-y-1 active:translate-y-0">
                Daftar Sekarang
            </a>
        </div>
    </section>


    <section id="galeri" class="py-16 bg-gray-50" data-aos="fade-up" data-aos-duration="1500">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12" data-aos="fade-up" data-aos-duration="1500">
                Galeri Kegiatan
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 my-5">
                <div class="overflow-hidden rounded-lg shadow-sm " data-aos="fade-up" data-aos-delay="100">
                   <img src="https://picsum.photos/600/400?school1" alt="Kegiatan 1"
                     class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-110">
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm transform transition duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://picsum.photos/600/400?school2" alt="Kegiatan 2"
                        class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-110">
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm transform transition duration-500 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://picsum.photos/600/400?school3" alt="Kegiatan 3"
                        class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-110">
                </div>
            </div>
        </div>
    </section>



    <!-- Marquee Footer -->
    <div class="bg-gradient-to-r from-blue-800 to-blue-700 text-white py-3 overflow-hidden">
        <marquee behavior="scroll" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
            🌟 SMKN 4 Kuningan – Membangun Generasi Unggul, Berkarakter, dan Siap Menghadapi Tantangan Global 🌟
            | 💻 Raih Prestasi dan Kembangkan Potensi Bersama Kami! 💡
        </marquee>
    </div>

</div>

<!-- Scripts -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Counter
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        let target = +counter.getAttribute('data-target');
        let count = 0;
        let step = Math.ceil(target / 200);
        const update = () => {
            count += step;
            if (count > target) count = target;
            counter.textContent = count;
            if (count < target) requestAnimationFrame(update);
        };
        update();
    });

    // Animated subtext - GSAP "typewriter" style
    const textEl = document.querySelector("#subtext");
    if (textEl) {
        const text = "Kembangkan kemampuanmu, raih prestasi, dan jadilah generasi unggul siap menghadapi tantangan masa depan.";
        textEl.textContent = "";

        // Buat span per karakter
        text.split("").forEach(char => {
            const span = document.createElement("span");
            span.textContent = char;
            textEl.appendChild(span);
        });

        // Animasi dengan GSAP
        gsap.from("#subtext span", {
            opacity: 0,
            y: 5,
            stagger: 0.08,    // delay tiap huruf -> lebih lambat = lebih santai
            duration: 0.4,    // durasi muncul tiap huruf
            ease: "power2.out"
        });
    }
});
</script>
</div>

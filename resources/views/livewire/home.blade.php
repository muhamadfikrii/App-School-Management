<div>
    <section class="min-h-screen flex items-center mx-auto bg-white bg-cover bg-center bg-fixed"
        style="background-image: url('{{ asset('img/Background.jpg') }}'); opacity: 50;">
        <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

            <div data-aos="fade-right" data-aos-duration="2000" class="space-y-6">
                <h1 class="text-2xl md:text-6xl font-poppins font-bold text-white mb-2">
                    Selamat Datang di
                </h1>

                <h2 class="text-4xl md:text-5xl font-[Poppins] font-extrabold text-blue-700 tracking-wide drop-shadow-lg mt-0">
                    SMKN 4 Kuningan
                </h2>

                <p id="subtext" class="mt-4 text-base md:text-lg text-gray-100 max-w-xl leading-relaxed">
                </p>

                <div class="mt-6 flex flex-wrap gap-4">
                    <a href="#jurusan"
                        class="px-6 py-3 bg-blue-700 text-white rounded-xl shadow-md hover:bg-white hover:text-blue-700 border border-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
                        Jelajahi Sekolah
                    </a>
                    <a href="{{ route('Contact') }}"
                        class="px-6 py-3 border border-blue-700 text-white rounded-xl hover:bg-blue-700 hover:text-white shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <div class="flex justify-center" data-aos="fade-left" data-aos-duration="3000">
                <img src="{{ asset('img/selamat-datang.jpg') }}" alt="Selamat Datang"
                    class="rounded-2xl shadow-xl w-full max-w-2xl">
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 grid md:grid-cols-4 gap-8 text-center">
            <div class="p-6 bg-gray-50 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-4xl font-bold text-blue-700 counter" data-target="2500">0</h3>
                <p class="mt-2 text-gray-600">Siswa Aktif</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-4xl font-bold text-blue-700 counter" data-target="75">0</h3>
                <p class="mt-2 text-gray-600">Guru & Staff</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-4xl font-bold text-blue-700 counter" data-target="50">0</h3>
                <p class="mt-2 text-gray-600">Prestasi Nasional</p>
            </div>
            <div class="p-6 bg-gray-50 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-4xl font-bold text-blue-700 counter" data-target="6">0</h3>
                <p class="mt-2 text-gray-600">Program Keahlian</p>
            </div>
        </div>
    </section>

    {{-- Jurusan Section --}}
    <section id="jurusan" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 text-center" data-aos="fade-up" data-aos-duration="3000">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">Program Keahlian</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <x-jurusan-card img="jurusan-pplg.jpg" title="Pemrograman Perangkat Lunak & Gim"
                    desc="Pemrograman, basis data, desain UI/UX, dan pengembangan aplikasi modern." />
                <x-jurusan-card img="jurusan-mplb.png" title="Manajemen Perkantoran Layanan Bisnis"
                    desc="Keterampilan administrasi perkantoran, layanan bisnis, dan digitalisasi administrasi." />
                <x-jurusan-card img="jurusan-tbsm.png" title="Teknik Bisnis Sepeda Motor"
                    desc="Perawatan, perbaikan, dan kewirausahaan bidang otomotif sepeda motor." />
                <x-jurusan-card img="jurusan-tkr.png" title="Teknik Kendaraan Ringan Otomotif"
                    desc="Perawatan dan perbaikan kendaraan roda empat." />
                <x-jurusan-card img="jurusan-akl.png" title="Akuntansi dan Keuangan Lembaga"
                    desc="Pengelolaan keuangan dan analisis laporan keuangan." />
                <x-jurusan-card img="jurusan-listrik.png" title="Teknik Ketenaga Listrikan"
                    desc="Instalasi dan perawatan sistem kelistrikan industri dan rumah tangga." />
            </div>
        </div>
    </section>

    <div class="flex justify-center gap-4 mx-auto my-16">
        <img src="{{ asset('img/logo.png') }}" alt="Logo SMKN 4 Kuningan" data-aos="flip-left"
            data-aos-duration="3000" class="w-50 h-50 object-contain rounded-lg flex items-start shadow-md">

        <div class="relative max-w-5xl bg-gray-50 p-6 rounded-lg" data-aos="fade-up-left" data-aos-duration="3000">
            <span class="absolute -top-3 left-0">
                <span class="absolute inline-flex h-4 w-4 animate-ping rounded-full bg-sky-400 opacity-75"></span>
                <span class="relative inline-flex h-4 w-4 rounded-full bg-sky-500"></span>
            </span>

            <span class="absolute -top-3 right-0">
                <span class="absolute inline-flex h-4 w-4 animate-ping rounded-full bg-pink-400 opacity-75"></span>
                <span class="relative inline-flex h-4 w-4 rounded-full bg-sky-500"></span>
            </span>

            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">SMKN 4 KUNINGAN</h1>

            <div class="flex gap-2 mt-2">
                <div class="w-8 h-3 bg-blue-700"
                    style="clip-path: polygon(20% 0, 100% 0, 80% 100%, 0 100%);"></div>
                <div class="w-24 h-3 bg-blue-600"
                    style="clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%);"></div>
            </div>

            <p class="mt-6 text-lg text-gray-700 leading-relaxed">
                SMKN 4 Kuningan berdiri pada tahun 2005 sebagai salah satu sekolah kejuruan unggulan di Kabupaten Kuningan. 
                Pada awalnya, sekolah ini hanya memiliki dua program keahlian, yaitu Teknik Kendaraan Ringan dan Teknik Instalasi Tenaga Listrik, 
                dengan jumlah siswa angkatan pertama sebanyak 120 orang. Seiring berkembangnya kebutuhan dunia industri dan teknologi, 
                SMKN 4 Kuningan terus memperluas program keahliannya. Pada tahun 2010, dibuka jurusan Rekayasa Perangkat Lunak untuk menjawab tantangan era digital. 
                Disusul dengan Akuntansi dan Keuangan Lembaga, serta Manajemen Perkantoran dan Layanan Bisnis pada tahun-tahun berikutnya. 
                Hingga kini, SMKN 4 Kuningan telah menjadi sekolah kejuruan modern dengan lebih dari 1.500 siswa dan 6 kompetensi keahlian. 
                Dengan dukungan tenaga pendidik profesional serta fasilitas praktik yang terus ditingkatkan, sekolah ini berkomitmen mencetak lulusan yang berdaya saing tinggi, berkarakter, serta siap menghadapi dunia kerja maupun melanjutkan pendidikan ke jenjang lebih tinggi.
            </p>
        </div>
    </div>

    <section class="w-full bg-gradient-to-r from-blue-700 to-blue-500 text-white py-32 flex justify-center">
        <div class="max-w-6xl px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6" data-aos="fade-right" data-aos-duration="3000">
                Bersama SMKN 4 Kuningan, Raih Masa Depan Gemilang
            </h2>
            <p class="text-lg md:text-xl mb-8" data-aos="fade-left" data-aos-duration="3000">
                Bergabunglah dengan kami dan kembangkan keterampilan serta kompetensi yang siap menghadapi tantangan dunia modern.
            </p>
        </div>
    </section>

    <section id="prestasi" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-gray-800">Prestasi Siswa</h2>
            <div class="grid md:grid-cols-3 gap-8">

                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 p-6" data-aos="flip-left"
                    data-aos-duration="2000">
                    <div class="w-full h-82 overflow-hidden rounded-lg mb-4">
                        <img src="https://picsum.photos/600/400?school" alt="Prestasi 1"
                            class="w-full h-full object-cover transform transition duration-500 hover:scale-110">
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Juara 1 LKS IT Software</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet...</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition p-6" data-aos="flip-up"
                    data-aos-duration="2000">
                    <div class="w-full h-82 overflow-hidden rounded-lg mb-4">
                        <img src="https://picsum.photos/600/400?students" alt="Prestasi 2"
                            class="w-full h-full object-cover transform transition duration-500 hover:scale-110">
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Juara 2 Olimpiade Matematika</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet...</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition p-6" data-aos="flip-right"
                    data-aos-duration="2000">
                    <div class="w-full h-82 overflow-hidden rounded-lg mb-4">
                        <img src="https://picsum.photos/600/400?achievement" alt="Prestasi 3"
                            class="w-full h-full object-cover transform transition duration-500 hover:scale-110">
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Juara 1 Lomba Robotik</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Lorem ipsum dolor sit amet...</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Galeri Section --}}
    <section id="galeri" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">
                Galeri Kegiatan
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" data-aos="flip-up" data-aos-duration="2000">
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://picsum.photos/600/400?school1" alt="Kegiatan 1"
                        class="w-full h-full object-cover transform transition duration-500 hover:scale-120">
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://picsum.photos/600/400?school2" alt="Kegiatan 2"
                        class="w-full h-full object-cover transform transition duration-500 hover:scale-120">
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://picsum.photos/600/400?school3" alt="Kegiatan 3"
                        class="w-full h-full object-cover transform transition duration-500 hover:scale-120">
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://picsum.photos/600/400?school4" alt="Kegiatan 4"
                        class="w-full h-full object-cover transform transition duration-500 hover:scale-120">
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://picsum.photos/600/400?school5" alt="Kegiatan 5"
                        class="w-full h-full object-cover transform transition duration-500 hover:scale-120">
                </div>
                <div class="overflow-hidden rounded-lg shadow-sm">
                    <img src="https://picsum.photos/600/400?school6" alt="Kegiatan 6"
                        class="w-full h-full object-cover transform transition duration-500 hover:scale-120">
                </div>
            </div>
        </div>
    </section>

    <div class="bg-gradient-to-r from-blue-800 to-blue-700 text-white py-3 overflow-hidden">
        <marquee behavior="scroll" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
            🌟 SMKN 4 Kuningan – Membangun Generasi Unggul, Berkarakter, dan Siap Menghadapi Tantangan Global 🌟 
            | 💻 Raih Prestasi dan Kembangkan Potensi Bersama Kami! 💡
        </marquee>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
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

            gsap.registerPlugin(TextPlugin);
            gsap.timeline().to("#subtext", {
                duration: 10,
                text: 'Sekolah yang membentuk generasi unggul, berkarakter, siap menghadapi dunia kerja maupun perguruan tinggi.',
                ease: "none",
                delay: 2
            });
        });
    </script>

</div>

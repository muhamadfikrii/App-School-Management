<div class="min-w-screen overflow-x-hidden">
    <section class="relative min-h-[70vh] mt-16 w-full flex items-center md:min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 overflow-hidden">
    
        <!-- Elemen dekoratif abstrak -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-200 rounded-full opacity-30 blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-blue-300 rounded-full opacity-20 blur-2xl animate-pulse-slow"></div>

        <div class="relative px-4 max-w-[1280px] mx-auto sm:px-6 lg:px-12 grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-12 items-center">

            <!-- Teks -->
            <div data-aos="fade-right" class="space-y-3 sm:space-y-4 text-center md:text-left z-10">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">Selamat Datang di</h1>
                <h2 class="text-3xl sm:text-4xl md:text-5xl uppercase font-extrabold font-[Poppins] text-blue-700 tracking-wide">
                    SMKN 4 Kuningan
                </h2>
                <p id="subtext" class="mt-2 text-sm sm:text-base md:text-lg text-gray-600 max-w-full md:max-w-xl leading-relaxed">
                    Menjadi sekolah vokasi unggulan dengan fasilitas modern dan kurikulum berbasis industri.
                </p>

                <div class="mt-4 flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                    <a href="#jurusan" class="px-6 py-3 rounded-xl font-semibold text-white bg-blue-700 shadow-md transition duration-300 hover:bg-blue-600 hover:shadow-lg">
                        Jelajahi Sekolah
                    </a>
                    <a href="{{ route('Contact') }}" class="px-6 py-3 rounded-xl font-semibold text-blue-700 border-2 border-blue-700 bg-white shadow-md transition duration-300 hover:bg-blue-700 hover:text-white hover:shadow-lg">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <!-- Gambar Hero -->
            <div class="flex justify-center mt-6 md:mt-0 z-10" data-aos="fade-left">
                <img src="{{ asset('img/selamat-datang.jpg') }}" loading="lazy" alt="Selamat Datang" 
                    class="rounded-2xl shadow-xl max-w-full h-auto md:max-w-lg object-contain">
            </div>

        </div>
    </section>

    <livewire:partials.history/>
    <livewire:partials.statistics/>
    <livewire:partials.program/>
    <livewire:partials.achievement/>
    <livewire:partials.cta/>
    <livewire:partials.galeri/>
   
    <div class="bg-gradient-to-r from-blue-800 to-blue-700 text-white py-3 overflow-hidden">
        <marquee behavior="scroll" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
            🌟 SMKN 4 Kuningan – Membangun Generasi Unggul, Berkarakter, dan Siap Menghadapi Tantangan Global 🌟
            | 💻 Raih Prestasi dan Kembangkan Potensi Bersama Kami! 💡
        </marquee>
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

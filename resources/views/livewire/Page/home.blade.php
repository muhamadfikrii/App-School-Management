<div class="overflow-x-hidden" loading="lazy">
<section 
    class="relative min-h-screen flex items-center overflow-hidden" 
    x-data="heroSection()"
    x-init="init()"
>
    <!-- Background yang Lebih Modern & Elegan -->
    <div class="absolute inset-0 z-0">
        <!-- Background utama: Slate Gelap -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950"></div>
        
        <!-- Overlay Pattern untuk Tekstur Teknologi -->
        <div class="absolute inset-0 opacity-[0.03]"
             style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <!-- Gradient Orb Animasi untuk Dinamika -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Content Container -->
    <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Kolom Kiri: Konten Utama -->
            <div class="text-white space-y-8" x-data="{ isLoaded: false }" x-init="setTimeout(() => isLoaded = true, 300)">
                
                <!-- Badge/Tagline -->
                <div 
                    class="inline-flex items-center space-x-2 bg-slate-800/50 backdrop-blur-sm border border-slate-700 text-cyan-400 text-sm font-semibold px-4 py-2 rounded-full"
                    :class="isLoaded ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
                    x-transition:enter="transition ease-out duration-700"
                >
                    <i class="fas fa-graduation-cap"></i>
                    <span>Sekolah Berbasis Teknologi & Industri</span>
                </div>

                <!-- Headline Utama -->
                <div class="space-y-2">
                    <h1 
                        class="font-bold text-4xl md:text-5xl lg:text-6xl leading-tight"
                        :class="isLoaded ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
                        x-transition:enter="transition ease-out duration-700 delay-100"
                    >
                        Cetak Tenaga
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400 block">
                            Profesional Handal
                        </span>
                    </h1>
                </div>

                <!-- Paragraf Deskriptif -->
                <p class="text-lg text-slate-300 leading-relaxed"
                    :class="isLoaded ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
                    x-transition:enter="transition ease-out duration-700 delay-200"
                >
                    SMKN 4 Kuningan tidak hanya mengajar, kami membekali. Dengan kurikulum yang selalu relevan industri, fasilitas praktik berteknologi tinggi, dan pembimbingan dari para ahli, kami memastikan setiap lulusan siap menjadi aset berharga di dunia kerja.
                </p>

                <!-- Poin-Poin Unggulan -->
                <div class="space-y-3"
                    :class="isLoaded ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                >
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-cyan-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-cyan-400 text-sm"></i>
                        </div>
                        <span class="text-slate-300">Kurikulum Berbasis Industri & Link and Match</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-cyan-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-cyan-400 text-sm"></i>
                        </div>
                        <span class="text-slate-300">Guru Praktisi & Instruktur Bersertifikasi</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-cyan-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-cyan-400 text-sm"></i>
                        </div>
                        <span class="text-slate-300">Fasilitas Praktik Standar Nasional & Internasional</span>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div 
                    class="flex flex-col sm:flex-row gap-4"
                    :class="isLoaded ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
                    x-transition:enter="transition ease-out duration-700 delay-400"
                >
                    <a href="{{ route('jurusan') }}" 
                       class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-bold py-4 px-8 rounded-xl transition-all transform hover:scale-105 shadow-lg hover:shadow-cyan-500/25 text-center flex items-center justify-center space-x-2">
                        <i class="fas fa-rocket"></i>
                        <span>Temukan Jurusan Anda</span>
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 text-white hover:bg-slate-700/50 font-bold py-4 px-8 rounded-xl transition-all text-center flex items-center justify-center space-x-2">
                        <i class="fas fa-phone-alt"></i>
                        <span>Konsultasi Kami</span>
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Visual/Highlight Card -->
            <div class="relative" x-data="{ isLoaded: false }" x-init="setTimeout(() => isLoaded = true, 500)">
                
                <!-- Main Highlight Card -->
                <div class="relative z-10"
                    :class="isLoaded ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                >
                    <div class="bg-slate-800/50 backdrop-blur-lg border border-slate-700 rounded-2xl p-8 shadow-2xl">
                        
                        <!-- Header Card -->
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-cyan-500/25">
                                <i class="fas fa-medal text-white text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white">Program Unggulan</h3>
                            <p class="text-slate-400 mt-1">Jurusan Paling Diminati</p>
                        </div>

                        <!-- Program List -->
                        <div class="space-y-4">
                            <a href="urusan/pplg" class="flex items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-cyan-500/50 transition-all group">
                                <div class="w-12 h-12 bg-slate-800 rounded-lg flex items-center justify-center mr-4 group-hover:bg-cyan-500/20 transition-colors">
                                    <i class="fas fa-network-wired text-cyan-400 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-white">pemrograman Perangkat Lunak & Gim</div>
                                    <div class="text-slate-400 text-sm">Ahli dalam mengmbangkan software</div>
                                </div>
                                <i class="fas fa-arrow-right text-slate-500 group-hover:text-cyan-400 transition-colors"></i>
                            </a>
                            
                            <a href="jurusan/mplb" class="flex items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-cyan-500/50 transition-all group">
                                <div class="w-12 h-12 bg-slate-800 rounded-lg flex items-center justify-center mr-4 group-hover:bg-cyan-500/20 transition-colors">
                                    <i class="fas fa-building text-cyan-400 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-white">Manajamen Perkantoran & Layanan Bisnis</div>
                                    <div class="text-slate-400 text-sm">Mahir dalam menggunakan Microsoft Office</div>
                                </div>
                                <i class="fas fa-arrow-right text-slate-500 group-hover:text-cyan-400 transition-colors"></i>
                            </a>

                            <a href="jurusan/tkro" class="flex items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-cyan-500/50 transition-all group">
                                <div class="w-12 h-12 bg-slate-800 rounded-lg flex items-center justify-center mr-4 group-hover:bg-cyan-500/20 transition-colors">
                                    <i class="fas fa-cogs text-cyan-400 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold text-white">Teknik Otomotif</div>
                                    <div class="text-slate-400 text-sm">Spesialis dalam sebuah mesin kendaraan</div>
                                </div>
                                <i class="fas fa-arrow-right text-slate-500 group-hover:text-cyan-400 transition-colors"></i>
                            </a>
                        </div>

                        <!-- CTA Bottom -->
                        <div class="mt-8 text-center">
                            <a href="{{ route('jurusan') }}" 
                               class="inline-flex items-center space-x-2 text-cyan-400 hover:text-cyan-300 font-semibold transition-colors">
                                <span>Lihat Semua Jurusan</span>
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik Section (Dipindah ke Bawah) -->
        <div class="grid grid-cols-3 gap-6 pt-16 border-t border-slate-800"
            x-data="{ isLoaded: false }" x-init="setTimeout(() => isLoaded = true, 700)"
            :class="isLoaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
            x-transition:enter="transition ease-out duration-700"
        >
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-cyan-400">{{ $majors }}</div>
                <div class="text-sm text-slate-400 mt-1">Program Keahlian</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-cyan-400">{{ $students }}+</div>
                <div class="text-sm text-slate-400 mt-1">Siswa Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-cyan-400">97%</div>
                <div class="text-sm text-slate-400 mt-1">Tingkat Penyerapan Kerja</div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
        <div class="animate-bounce">
            <div class="w-6 h-10 border-2 border-slate-600 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-cyan-400 rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </div>
</section>

<script>
function heroSection() {
    return {
        isVisible: false,
        init() {
            this.isVisible = true;
        },
    }
}
</script>

<style>
/* Smooth transitions for all elements */
.transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}
</style>

<!-- Contact Section yang Dirapikan -->
<section id="contact" 
    class="relative z-10 mx-4 sm:mx-6 lg:mx-16 -mt-4 rounded-2xl overflow-hidden 
          bg-gradient-to-r from-slate-800 to-slate-900 text-white shadow-lg">

    <div class="flex flex-col md:flex-row items-center justify-between 
            text-center md:text-left px-5 sm:px-8 md:px-10 py-6 md:py-8 gap-5 md:gap-8">
        <div class="flex flex-col sm:flex-row items-center sm:items-start md:items-center gap-4 md:gap-5">
            <div class="relative">
                <div class="absolute inset-0 bg-white/10 rounded-lg transform rotate-3"></div>
                <img
                    src="{{ asset('img/logo.png') }}"
                    alt="Logo SMKN 4 Kuningan"
                    class="relative w-12 h-12 sm:w-14 sm:h-14 rounded-lg shadow-sm bg-white/5 p-2"/>
            </div>
            <div>
                <h2 class="text-lg sm:text-xl font-bold leading-tight">Tertarik Bergabung?</h2>
                <p class="text-sm text-slate-300 mt-1">Hubungi kami untuk informasi lebih lanjut tentang pendaftaran.</p>
            </div>
        </div>

        <a href="{{ route('contact') }}"
            class="bg-white text-slate-800 px-5 py-2.5 rounded-lg font-semibold 
                transition-all duration-300 hover:bg-slate-100 hover:shadow-sm
                w-full sm:w-auto md:w-auto flex items-center justify-center gap-2 text-sm">
            <span>Kontak Kami</span>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 transition-transform group-hover:translate-x-0.5"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
        </a>
    </div>
</section>

<style>
@keyframes pulse-slow {
    0%, 100% { opacity: 0.4; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}
</style>

    <!-- Livewire Components -->
    <livewire:partials.history/>
    <livewire:partials.statistics/>
    <section id="jurusan" class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle_at_20%_20%,rgba(59,130,246,0.15),transparent_60%)]"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-16 tracking-tight" data-aos="fade-up">
            Program Keahlian Unggulan
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            
            <a href="{{ url('/jurusan/pplg') }}"
                class="group relative bg-white rounded-2xl shadow-md border border-transparent 
                        p-8 block transform-gpu
                        duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]
                        hover:-translate-y-3 hover:shadow-2xl hover:border-blue-400 hover:bg-gradient-to-br hover:from-white hover:to-blue-50">

                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('img/jurusan-pplg.jpg') }}" alt="PPLG"
                            class="w-32 h-30 object-contain rounded-xl
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
            <div>
                <a href="{{ route('achievement') }}"
                    class="group flex items-center gap-2 mt-5 bg-white text-blue-700 px-6 py-3 rounded-full font-semibold 
                            shadow-lg transition-all duration-300 hover:bg-blue-100 hover:shadow-xl hover:-translate-y-1">
                        <span>Lihat Lebih Banyak</span>
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" 
                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6-6m6 6l-6 6" />
                        </svg>
                    </a>
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

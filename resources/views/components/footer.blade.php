<div>
    <footer class="bg-gray-900 text-white">
        <!-- Bagian Atas Footer -->
        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Grid utama dengan 4 kolom -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

                    <!-- Kolom 1: Logo & Deskripsi -->
                    <div class="space-y-6">
                        <!-- Logo dan Nama Sekolah -->
                        <div class="flex items-center space-x-3">
                            <div class="bg-white p-2.5 rounded-lg">
                                <i class="fas fa-graduation-cap text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">SMKN 4 KUNINGAN</h2>
                                <p class="text-blue-300 text-sm font-medium">UNGGULAN NASIONAL</p>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <p class="text-gray-300 text-sm leading-relaxed">
                            Sekolah unggulan yang berkomitmen memberikan pendidikan terbaik
                            untuk mencetak generasi penerus bangsa yang berakhlak mulia,
                            berprestasi akademik, dan siap dalam menghadapi dunia kerja.
                        </p>

                        <!-- Media Sosial -->
                        <div class="pt-2">
                            <p class="text-gray-400 text-sm mb-3">Ikuti Kami:</p>
                            <div class="flex space-x-3">
                                <a href="https://www.facebook.com/smkn4kng" class="bg-blue-600 hover:bg-blue-700 text-white py-2.5 px-4 text-center rounded-xl">
                                    <i class="fab fa-facebook-f text-center"></i>
                                </a>
                                <a href="https://www.instagram.com/smkn_04kng/" class="bg-pink-600 hover:bg-pink-700 text-white py-2.5 px-4 rounded-xl">
                                    <i class="fab fa-instagram text-center"></i>
                                </a>
                                <a href="wa.me/+6282216958783" class="bg-blue-400 hover:bg-blue-500 text-white py-2.5 px-4 text-center rounded-xl">
                                    <i class="fab fa-whatsapp text-center"></i>
                                </a>
                                <a href="https://www.youtube.com/@smkn4kuningan" class="bg-red-600 hover:bg-red-700 text-white py-2.5 px-4 text-center rounded-xl">
                                    <i class="fab fa-youtube text-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom 2: Tautan Cepat -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 pb-2 border-b border-gray-700">TAUTAN CEPAT</h3>
                        <div class="space-y-3">
                            
                            <div class="grid grid-cols-2 gap-4">
                                <a href="{{ route('home') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Beranda</span>
                                </a>
                                <a href="{{ route('organisasi') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Organisasi</span>
                                </a>
                                <a href="{{ route('profile-guru') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Profile Guru</span>
                                </a>
                                <a href="{{ route('berita') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Berita</span>
                                </a>
                                <a href="{{ route('achievement') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Prestasi</span>
                                </a>
                                <a href="{{ route('about') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Tentang Kami</span>
                                </a>
                                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Kontak</span>
                                </a>
                                <a href="{{ route('jurusan') }}" class="text-gray-300 hover:text-white link-transition flex items-center group">
                                    <i class="fas fa-chevron-right text-xs text-blue-400 mr-2 group-hover:translate-x-1 transition-transform"></i>
                                    <span>Program Keahlian</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom 3: Informasi Akademik -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 pb-2 border-b border-gray-700">AKADEMIK</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="{{ route('achievement') }}" class="text-gray-300 hover:text-white link-transition flex items-center">
                                    <i class="fas fa-chart-line text-blue-400 mr-3 w-5"></i>
                                    <span>Prestasi Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('berita') }}" class="text-gray-300 hover:text-white link-transition flex items-center">
                                    <i class="fas fa-newspaper text-blue-400 mr-3 w-5"></i>
                                    <span>Berita Sekolah</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Kolom 4: Kontak & Lokasi -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6 pb-2 border-b border-gray-700">KONTAK KAMI</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-blue-400 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-gray-300 text-sm">Alamat:</p>
                                    <p class="text-white text-sm">Jl. Raya Cikeusik No.73, Cikeusik, Kec. Cidahu, Kabupaten Kuningan, Jawa Barat 45595</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <i class="fas fa-phone text-blue-400 mr-3"></i>
                                <div>
                                    <p class="text-gray-300 text-sm">Telepon:</p>
                                    <p class="text-white">(0231) 8666972</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <i class="fas fa-envelope text-blue-400 mr-3"></i>
                                <div>
                                    <p class="text-gray-300 text-sm">Email:</p>
                                    <p class="text-white">admin@smkn4kuningan.sch.id</p>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <i class="fas fa-clock text-blue-400 mr-3"></i>
                                <div>
                                    <p class="text-gray-300 text-sm">Jam Operasional:</p>
                                    <p class="text-white">Senin - Jumat: 07:00 - 15:00</p>
                                </div>
                            </div>

                            <!-- Tombol Kontak -->
                            <div class="pt-2">
                                <a href="mailto:admin@smkn4kuningan.sch.id" class="inline-flex items-center justify-center w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-md font-medium link-transition">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Garis Pemisah -->
                <div class="divider my-10"></div>

                <!-- Newsletter Signup -->
                <div class="max-w-2xl mx-auto mb-10">
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-semibold mb-2">Maps</h3>
                    </div>
                     <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4520264997814!2d108.68152037587632!3d-6.955884768102995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0e97e9beddcb%3A0x2fd17d5f9eaf9d66!2sSMK%20Negeri%204%20Kuningan!5e0!3m2!1sid!2sid!4v1758000091445!5m2!1sid!2sid" 
                    class="w-full h-64   rounded-lg shadow-lg border-0" 
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                </div>

                <!-- Garis Pemisah -->
                <div class="divider my-8"></div>

                <!-- Bagian Bawah Footer -->
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <!-- Copyright -->
                    <div class="mb-4 md:mb-0">
                        <p class="text-gray-400 text-sm">
                            &copy; <span id="currentYear"></span> SMKN 4 KUNINGAN
                            <span class="text-blue-300">Semua hak dilindungi undang-undang.</span>
                        </p>
                    </div>

                    <!-- Link Legal -->
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="#" class="text-gray-400 hover:text-white text-sm link-transition">
                            Kebijakan Privasi
                        </a>
                        <span class="text-gray-600 hidden md:inline">|</span>
                        <a href="#" class="text-gray-400 hover:text-white text-sm link-transition">
                            Syarat & Ketentuan
                        </a>
                        <span class="text-gray-600 hidden md:inline">|</span>
                        <a href="#" class="text-gray-400 hover:text-white text-sm link-transition">
                            Peta Situs
                        </a>
                        <span class="text-gray-600 hidden md:inline">|</span>
                        <a href="#" class="text-gray-400 hover:text-white text-sm link-transition">
                            Aksesibilitas
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Copyright Bawah -->
        <div class="bg-gray-950 py-4 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="text-center">
                    <p class="text-gray-500 text-xs">
                        Website resmi SMKN 4 KUNINGAN |
                        Terakreditasi A (Unggul) oleh Badan Akreditasi Nasional
                    </p>
                </div>
            </div>
        </div>
    </footer>
        
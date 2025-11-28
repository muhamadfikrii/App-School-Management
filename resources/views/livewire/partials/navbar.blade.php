<div id="navbar"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300 py-3"
    x-data="{ 
        open: false, 
        scrolled: false
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 20
        });
        $watch('open', value => {
            if (value) {
                document.body.style.overflow = 'hidden';
                document.body.style.position = 'fixed';
                document.body.style.width = '100%';
            } else {
                document.body.style.overflow = '';
                document.body.style.position = '';
                document.body.style.width = '';
            }
        })
    "
    :class="scrolled ? 'bg-white/98 shadow-xl backdrop-blur-md py-2' : 'bg-white/95 py-3'">

    <!-- Main Navbar -->
    <nav>
        <div class="mx-28 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                <!-- Logo Section -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group cursor-pointer">
                        <div class="flex flex-col">
                            <span class="text-xl font-semibold text-gray-900 leading-tight bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text">
                                SMKN 4 Kuningan
                            </span>
                        </div>
                    </a>
                </div>
                
                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-10 ml-8 font-semibold px-5">
                        <x-nav-link href="{{ route('home') }}">
                            Beranda
                        </x-nav-link>
                        
                        <div class="relative" x-data="{ open: false }">
                            <x-nav-link 
                                href="#" 
                                class="px-5 py-2.5 rounded-xl flex items-center space-x-2"
                                @mouseenter="open = true"
                                @mouseleave="open = false">
                                <span>Info Sekolah</span>
                                <svg class="w-3 h-3 transition-transform duration-200 mt-0.5" 
                                    :class="open ? 'rotate-180' : ''" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </x-nav-link>

                            <!-- Dropdown Menu -->
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 translate-y-2"
                                 class="absolute mt-3 w-xl bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-200/80 z-50 py-3"
                                 @mouseenter="open = true"
                                 @mouseleave="open = false">
                                
                                <div class="px-4 py-2 border-b border-gray-100/80 mb-2">
                                    <h3 class="font-bold text-gray-900 text-sm">Informasi Sekolah</h3>
                                    <p class="text-xs text-gray-500 mt-0.5">Seluruh informasi terkait SMKN 4 Kuningan</p>
                                </div>
                                
                                <div class="space-y-1 px-2 grid grid-cols-2 gap-4">
                                    <a href="{{ route('jurusan') }}" class="flex items-center px-3 py-3 text-gray-700 hover:bg-blue-50/80 hover:text-blue-600 rounded-xl transition-all duration-200 group">
                                        <div class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 transition-transform">
                                            <i class="fas fa-laptop-code text-white text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-sm">Program Keahlian</div>
                                            <div class="text-xs text-gray-400 mt-0.5">Jurusan & Program Unggulan</div>
                                        </div>
                                        <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-blue-600 ml-2"></i>
                                    </a>
                                    
                                    <a href="{{ route('organisasi') }}" class="flex items-center px-3 py-3 text-gray-700 hover:bg-green-50/80 hover:text-green-600 rounded-xl transition-all duration-200 group">
                                        <div class="w-9 h-9 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 transition-transform">
                                            <i class="fas fa-users text-white text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-sm">Organisasi</div>
                                            <div class="text-xs text-gray-400 mt-0.5">OSIS & Ekstrakurikuler</div>
                                        </div>
                                        <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-green-600 ml-2"></i>
                                    </a>
                                    
                                    <a href="{{ route('profile-guru') }}" class="flex items-center px-3 py-3 text-gray-700 hover:bg-purple-50/80 hover:text-purple-600 rounded-xl transition-all duration-200 group">
                                        <div class="w-9 h-9 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 transition-transform">
                                            <i class="fas fa-chalkboard-teacher text-white text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-sm">Profile Guru</div>
                                            <div class="text-xs text-gray-400 mt-0.5">Staf Pengajar Profesional</div>
                                        </div>
                                        <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-purple-600 ml-2"></i>
                                    </a>
                                    
                                    <a href="{{ route('berita') }}" class="flex items-center px-3 py-3 text-gray-700 hover:bg-orange-50/80 hover:text-orange-600 rounded-xl transition-all duration-200 group">
                                        <div class="w-9 h-9 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 transition-transform">
                                            <i class="fas fa-newspaper text-white text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-sm">Berita</div>
                                            <div class="text-xs text-gray-400 mt-0.5">Informasi & Update Terkini</div>
                                        </div>
                                        <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-orange-600 ml-2"></i>
                                    </a>
                                    
                                    <a href="{{ route('achievement') }}" class="flex items-center px-3 py-3 text-gray-700 hover:bg-red-50/80 hover:text-red-600 rounded-xl transition-all duration-200 group">
                                        <div class="w-9 h-9 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mr-3 shadow-sm group-hover:scale-110 transition-transform">
                                            <i class="fas fa-trophy text-white text-xs"></i>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-sm">Prestasi</div>
                                            <div class="text-xs text-gray-400 mt-0.5">Penghargaan & Juara</div>
                                        </div>
                                        <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-red-600 ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <x-nav-link href="{{ route('about') }}">
                            Tentang Kami
                        </x-nav-link>
    
                        <x-nav-link href="{{ route('contact') }}">
                            Kontak
                        </x-nav-link>
                    </div>

                    <!-- Login Button Desktop -->
                    <a href="/admin"
                       class="hidden lg:flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl 
                              hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl 
                              font-semibold space-x-2 group border border-blue-500/20">
                        <i class="fas fa-sign-in-alt text-sm group-hover:scale-110 transition-transform"></i>
                        <span>Login Admin</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden relative w-12 h-12 flex items-center justify-center rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 transition-all duration-200 shadow-lg hover:shadow-xl group"
                            @click="open = true">
                        <div class="flex flex-col space-y-1.5 transform group-hover:scale-110 transition-transform">
                            <span class="w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300" 
                                  :class="open ? 'rotate-45 translate-y-2' : ''"></span>
                            <span class="w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300" 
                                  :class="open ? 'opacity-0' : 'opacity-100'"></span>
                            <span class="w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300" 
                                  :class="open ? '-rotate-45 -translate-y-2' : ''"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Sidebar -->
    <template x-teleport="body">
        <div class="lg:hidden fixed inset-0 z-50" 
             x-show="open"
             x-cloak
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" 
                 @click="open = false">
            </div>
            
            <!-- Sidebar -->
            <div class="absolute top-0 right-0 h-full w-80 max-w-[85vw] bg-white/98 backdrop-blur-md shadow-2xl transform"
                 x-show="open"
                 x-transition:enter="transform transition ease-out duration-300"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transform transition ease-in duration-200"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full">
                
                <!-- Sidebar Header -->
                <div class="flex items-center justify-between p-6 border-b border-gray-200/50 bg-gradient-to-r from-white to-gray-50/80">
                    <div class="flex items-center space-x-3">
                       <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg ring-2 ring-white/50">
                            <img src="{{ asset('img/logo.png') }}" class="w-8 h-8 object-contain" alt="SMKN 4 Logo">
                        </div>
                        <div class="flex flex-col">
                            <div class="font-black text-gray-900 text-lg">SMKN 4</div>
                            <div class="text-xs font-semibold text-blue-600 uppercase tracking-wider">Kuningan</div>
                        </div>
                    </div>
                    <button @click="open = false" 
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-gray-200 transition-all duration-200 hover:scale-110 shadow-sm">
                        <i class="fas fa-times text-gray-600 text-sm"></i>
                    </button>
                </div>

                <!-- Sidebar Content -->
                <div class="h-full overflow-y-auto pb-8">
                    <div class="p-6 space-y-2">
                        <!-- Navigation Links -->
                        <a href="{{ route('home') }}" @click="open = false" class="flex items-center w-full px-4 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors">
                            <i class="fas fa-home mr-3 text-gray-500"></i>
                            <span class="font-medium">Beranda</span>
                        </a>

                        <!-- Mobile Accordion Dropdown -->
                        <div x-data="{ infoOpen: false }" class="rounded-xl overflow-hidden">
                            <button @click="infoOpen = !infoOpen" 
                                    class="flex items-center justify-between w-full px-4 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle mr-3 text-gray-500"></i>
                                    <span class="font-medium">Info Sekolah</span>
                                </div>
                                <svg class="w-4 h-4 text-gray-500 transition-transform" :class="infoOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <div x-show="infoOpen" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform translate-y-0"
                                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                                 class="pl-4 pr-2 py-2 space-y-1 bg-gray-50/80 rounded-b-xl mt-1">
                                <a href="{{ route('jurusan') }}" @click="open = false" class="flex items-center px-4 py-2.5 text-sm text-gray-600 rounded-lg hover:bg-white hover:text-blue-600 transition-all">
                                    <i class="fas fa-laptop-code mr-3 text-blue-500"></i> Program Keahlian
                                </a>
                                <a href="{{ route('organisasi') }}" @click="open = false" class="flex items-center px-4 py-2.5 text-sm text-gray-600 rounded-lg hover:bg-white hover:text-green-600 transition-all">
                                    <i class="fas fa-users mr-3 text-green-500"></i> Organisasi
                                </a>
                                <a href="{{ route('profile-guru') }}" @click="open = false" class="flex items-center px-4 py-2.5 text-sm text-gray-600 rounded-lg hover:bg-white hover:text-purple-600 transition-all">
                                    <i class="fas fa-chalkboard-teacher mr-3 text-purple-500"></i> Profile Guru
                                </a>
                                <a href="{{ route('berita') }}" @click="open = false" class="flex items-center px-4 py-2.5 text-sm text-gray-600 rounded-lg hover:bg-white hover:text-orange-600 transition-all">
                                    <i class="fas fa-newspaper mr-3 text-orange-500"></i> Berita
                                </a>
                                <a href="{{ route('achievement') }}" @click="open = false" class="flex items-center px-4 py-2.5 text-sm text-gray-600 rounded-lg hover:bg-white hover:text-red-600 transition-all">
                                    <i class="fas fa-trophy mr-3 text-red-500"></i> Prestasi
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('about') }}" @click="open = false" class="flex items-center w-full px-4 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors">
                            <i class="fas fa-school mr-3 text-gray-500"></i>
                            <span class="font-medium">Tentang Kami</span>
                        </a>

                        <a href="{{ route('contact') }}" @click="open = false" class="flex items-center w-full px-4 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors">
                            <i class="fas fa-envelope mr-3 text-gray-500"></i>
                            <span class="font-medium">Kontak</span>
                        </a>

                        <!-- Divider -->
                        <div class="border-t border-gray-300/50 pt-4 mt-4">
                            <a href="/admin" @click="open = false"
                               class="flex items-center justify-center w-full py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl 
                                      hover:from-blue-700 hover:to-blue-800 transition-all duration-200 font-semibold shadow-md hover:shadow-lg">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                <span>Login Admin</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

<style>
    [x-cloak] { display: none !important; }
    
    /* Custom scrollbar for sidebar */
    .overflow-y-auto::-webkit-scrollbar { width: 6px; }
    .overflow-y-auto::-webkit-scrollbar-track { background: rgba(241, 245, 249, 0.5); border-radius: 3px; }
    .overflow-y-auto::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.5); border-radius: 3px; }
    .overflow-y-auto::-webkit-scrollbar-thumb:hover { background: rgba(100, 116, 139, 0.6); }
</style>
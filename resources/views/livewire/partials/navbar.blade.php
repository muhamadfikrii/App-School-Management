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
        <div class="mx-4 md:px-6 lg:mx-40">
            <div class="flex items-center justify-between">

                <!-- Logo Section -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group cursor-pointer">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg ring-2 ring-white/50">
                            <img src="{{ asset('img/logo.png') }}" class="w-8 h-8 object-contain" alt="SMKN 4 Logo">
                        </div>
                        <div class="flex flex-col">
                            <div class="font-black text-gray-900 text-xl">SMKN 4</div>
                            <div class="text-md font-semibold text-blue-600 uppercase tracking-wider">Kuningan</div>
                        </div>
                    </a>
                </div>
                
                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-8 ml-8 text-gray-700 font-semibold px-5">
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                            Beranda
                        </x-nav-link>
                        
                        <!-- Dropdown Info Sekolah dengan logika active yang benar -->
                        <div class="relative group" x-data="{ open: false }">
                            @php
                                $infoRoutes = ['jurusan', 'organisasi', 'profile-guru', 'berita', 'achievement', 'jurusan.detail', 'berita.detail', 'achievement.detail'];
                                $isInfoActive = false;
                                foreach ($infoRoutes as $routeName) {
                                    if (request()->routeIs($routeName)) {
                                        $isInfoActive = true;
                                        break;
                                    }
                                }
                            @endphp
                            
                            <div class="relative">
                                <x-nav-link
                                    href="#"
                                    class=" rounded-xl flex items-center space-x-0.5 cursor-pointer group"
                                    :active="$isInfoActive"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false">
                                    <span class="relative">Info Sekolah</span>
                                    <svg class="w-3 h-3 transition-transform duration-200 mt-0.5" 
                                        :class="open ? 'rotate-180' : ''" 
                                        fill="none" 
                                        stroke="currentColor" 
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </x-nav-link>
                            </div>

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
    
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                            Tentang Kami
                        </x-nav-link>
    
                        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                            Kontak
                        </x-nav-link>
                    </div>

                    <a href="/admin"
                       class="hidden lg:flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl 
                              hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl 
                              font-semibold space-x-2 group border border-blue-500/20">
                        <i class="fas fa-sign-in-alt text-sm group-hover:scale-110 transition-transform"></i>
                        <span>Login Admin</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden relative w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-gray-200 hover:from-gray-200 transition-all duration-200 shadow-md hover:shadow-lg group"
                            @click="open = !open">
                        <div class="flex flex-col space-y-1 transform group-hover:scale-105 transition-transform">
                            <span class="w-4 h-0.5 bg-gray-700 rounded-full transition-all duration-300"
                                  :class="open ? 'rotate-45 translate-y-1.5' : ''"></span>
                            <span class="w-4 h-0.5 bg-gray-700 rounded-full transition-all duration-300"
                                  :class="open ? 'opacity-0' : 'opacity-100'"></span>
                            <span class="w-4 h-0.5 bg-gray-700 rounded-full transition-all duration-300"
                                  :class="open ? '-rotate-45 -translate-y-1.5' : ''"></span>
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
                <div class="flex items-center justify-between px-6 py-3 border-b border-gray-200/50 bg-gradient-to-r from-white to-gray-50/80">
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
                        @php
                            $currentRoute = request()->route()->getName();
                        @endphp
                        
                        <a href="{{ route('home') }}" 
                           @click="open = false" 
                           class="flex items-center w-full px-4 py-3 rounded-xl transition-all duration-200
                                  {{ $currentRoute === 'home' ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i class="fas fa-home mr-3 {{ $currentRoute === 'home' ? 'text-blue-600' : 'text-gray-500' }}"></i>
                            <span class="font-medium">Beranda</span>
                            @if($currentRoute === 'home')
                                <span class="ml-auto w-2 h-2 bg-blue-600 rounded-full"></span>
                            @endif
                        </a>

                        <!-- Mobile Accordion Dropdown -->
                        <div x-data="{ infoOpen: false }" class="rounded-xl overflow-hidden">
                            @php
                                $infoRoutes = ['jurusan', 'organisasi', 'profile-guru', 'berita', 'achievement', 'jurusan.detail', 'berita.detail', 'achievement.detail'];
                                $isInfoActive = in_array($currentRoute, $infoRoutes);
                            @endphp
                            
                            <button @click="infoOpen = !infoOpen" 
                                    class="flex items-center justify-between w-full px-4 py-3 rounded-xl transition-all duration-200
                                           {{ $isInfoActive ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle mr-3 {{ $isInfoActive ? 'text-blue-600' : 'text-gray-500' }}"></i>
                                    <span class="font-medium">Info Sekolah</span>
                                </div>
                                <div class="flex items-center">
                                    @if($isInfoActive)
                                        <span class="mr-2 w-2 h-2 bg-blue-600 rounded-full"></span>
                                    @endif
                                    <svg class="w-4 h-4 {{ $isInfoActive ? 'text-blue-600' : 'text-gray-500' }} transition-transform" 
                                         :class="infoOpen ? 'rotate-180' : ''" 
                                         fill="none" 
                                         stroke="currentColor" 
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </button>
                            
                            <div x-show="infoOpen" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform translate-y-0"
                                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                                 class="pl-8 pr-2 py-2 space-y-1 bg-gray-50/80 rounded-b-xl mt-1">
                                @php
                                    $checkActive = function($routeName) use ($currentRoute) {
                                        return $currentRoute === $routeName;
                                    };
                                @endphp
                                
                                <a href="{{ route('jurusan') }}" 
                                   @click="open = false" 
                                   class="flex items-center px-4 py-2.5 text-sm rounded-lg transition-all
                                          {{ $checkActive('jurusan') || $checkActive('jurusan.detail') ? 'bg-white text-blue-600 border-l-2 border-blue-600' : 'text-gray-600 hover:bg-white hover:text-blue-600' }}">
                                    <i class="fas fa-laptop-code mr-3 {{ $checkActive('jurusan') || $checkActive('jurusan.detail') ? 'text-blue-600' : 'text-blue-500' }}"></i> 
                                    Program Keahlian
                                    @if($checkActive('jurusan') || $checkActive('jurusan.detail'))
                                        <span class="ml-auto w-1.5 h-1.5 bg-blue-600 rounded-full"></span>
                                    @endif
                                </a>
                                
                                <a href="{{ route('organisasi') }}" 
                                   @click="open = false" 
                                   class="flex items-center px-4 py-2.5 text-sm rounded-lg transition-all
                                          {{ $checkActive('organisasi') ? 'bg-white text-green-600 border-l-2 border-green-600' : 'text-gray-600 hover:bg-white hover:text-green-600' }}">
                                    <i class="fas fa-users mr-3 {{ $checkActive('organisasi') ? 'text-green-600' : 'text-green-500' }}"></i> 
                                    Organisasi
                                    @if($checkActive('organisasi'))
                                        <span class="ml-auto w-1.5 h-1.5 bg-green-600 rounded-full"></span>
                                    @endif
                                </a>
                                
                                <a href="{{ route('profile-guru') }}" 
                                   @click="open =false" 
                                   class="flex items-center px-4 py-2.5 text-sm rounded-lg transition-all
                                          {{ $checkActive('profile-guru') ? 'bg-white text-purple-600 border-l-2 border-purple-600' : 'text-gray-600 hover:bg-white hover:text-purple-600' }}">
                                    <i class="fas fa-chalkboard-teacher mr-3 {{ $checkActive('profile-guru') ? 'text-purple-600' : 'text-purple-500' }}"></i> 
                                    Profile Guru
                                    @if($checkActive('profile-guru'))
                                        <span class="ml-auto w-1.5 h-1.5 bg-purple-600 rounded-full"></span>
                                    @endif
                                </a>
                                
                                <a href="{{ route('berita') }}" 
                                   @click="open = false" 
                                   class="flex items-center px-4 py-2.5 text-sm rounded-lg transition-all
                                          {{ $checkActive('berita') || $checkActive('berita.detail') ? 'bg-white text-orange-600 border-l-2 border-orange-600' : 'text-gray-600 hover:bg-white hover:text-orange-600' }}">
                                    <i class="fas fa-newspaper mr-3 {{ $checkActive('berita') || $checkActive('berita.detail') ? 'text-orange-600' : 'text-orange-500' }}"></i> 
                                    Berita
                                    @if($checkActive('berita') || $checkActive('berita.detail'))
                                        <span class="ml-auto w-1.5 h-1.5 bg-orange-600 rounded-full"></span>
                                    @endif
                                </a>
                                
                                <a href="{{ route('achievement') }}" 
                                   @click="open = false" 
                                   class="flex items-center px-4 py-2.5 text-sm rounded-lg transition-all
                                          {{ $checkActive('achievement') || $checkActive('achievement.detail') ? 'bg-white text-red-600 border-l-2 border-red-600' : 'text-gray-600 hover:bg-white hover:text-red-600' }}">
                                    <i class="fas fa-trophy mr-3 {{ $checkActive('achievement') || $checkActive('achievement.detail') ? 'text-red-600' : 'text-red-500' }}"></i> 
                                    Prestasi
                                    @if($checkActive('achievement') || $checkActive('achievement.detail'))
                                        <span class="ml-auto w-1.5 h-1.5 bg-red-600 rounded-full"></span>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('about') }}" 
                           @click="open = false" 
                           class="flex items-center w-full px-4 py-3 rounded-xl transition-all duration-200
                                  {{ $currentRoute === 'about' ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i class="fas fa-school mr-3 {{ $currentRoute === 'about' ? 'text-blue-600' : 'text-gray-500' }}"></i>
                            <span class="font-medium">Tentang Kami</span>
                            @if($currentRoute === 'about')
                                <span class="ml-auto w-2 h-2 bg-blue-600 rounded-full"></span>
                            @endif
                        </a>

                        <a href="{{ route('contact') }}" 
                           @click="open = false" 
                           class="flex items-center w-full px-4 py-3 rounded-xl transition-all duration-200
                                  {{ $currentRoute === 'contact' ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                            <i class="fas fa-envelope mr-3 {{ $currentRoute === 'contact' ? 'text-blue-600' : 'text-gray-500' }}"></i>
                            <span class="font-medium">Kontak</span>
                            @if($currentRoute === 'contact')
                                <span class="ml-auto w-2 h-2 bg-blue-600 rounded-full"></span>
                            @endif
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
    
    /* Garis bawah animation */
    .group:hover span {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
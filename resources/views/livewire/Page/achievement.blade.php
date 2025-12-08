<div>
    <section class="py-20 bg-white mt-10 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
            <!-- Header Editorial Style -->
            <header class="mb-16">
                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between">
                    <div class="lg:w-2/3">
                        <span class="text-sm font-bold text-blue-600 uppercase tracking-widest">Laporan Khusus</span>
                        <h1 class="text-5xl lg:text-6xl font-serif font-bold text-gray-900 mt-2 leading-tight">
                            Dinding Juara
                        </h1>
                        <p class="text-lg text-gray-600 mt-4 max-w-xl">
                            Dokumentasi pencapaian luar biasa siswa SMKN 4 KUNINGAN yang mengharumkan nama sekolah di berbagai ajang.
                        </p>
                    </div>
                </div>
            </header>

            <div class="flex flex-col lg:flex-row lg:gap-12">
                <!-- Main Content Area -->
                <main class="w-full lg:w-2/3">
                    @if ($achievements->count() > 0)
                        <!-- Featured Story - Asymmetric Layout -->
                        <article class="mb-12 px-4 lg:px-0">
                            <a href="{{ route('achievement.detail', $achievements->first()->id) }}" class="group block">
                                <div class="relative">
                                    @if ($achievements->first()->photo)
                                        <img src="{{ $achievements->first()->photo }}" 
                                             alt="{{ $achievements->first()->title }}" 
                                             class="w-full h-96 lg:h-[500px] object-cover rounded-lg">
                                    @else
                                        <div class="w-full h-96 lg:h-[500px] bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                            <span class="text-8xl">🏆</span>
                                        </div>
                                    @endif
                                    <!-- Overlay Category -->
                                    <div class="absolute top-6 left-6">
                                        <span class="px-4 py-2 bg-white/90 backdrop-blur-sm text-gray-900 font-bold text-sm rounded-full shadow-lg">
                                            {{ $achievements->first()->level }}
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mt-8">
                                    <h2 class="text-3xl lg:text-4xl font-serif font-bold text-gray-900 mb-4 group-hover:text-blue-700 transition-colors leading-tight">
                                        <a href="{{ route('achievement.detail', $achievements->first()->id) }}">
                                            {{ $achievements->first()->title }}
                                        </a>
                                    </h2>
                                    
                                    <!-- Pull Quote -->
                                    <blockquote class="border-l-4 border-blue-600 pl-6 my-6 text-xl text-gray-700 italic font-serif">
                                        "{{ Str::limit($achievements->first()->description, 120) }}"
                                    </blockquote>
                                    
                                    <div class="flex items-center justify-between text-sm">
                                        <div class="flex items-center space-x-4">
                                            <span class="text-gray-500">Oleh</span>
                                            <span class="font-semibold text-gray-900">{{ $achievements->first()->student->full_name ?? 'Tim' }}</span>
                                            <span class="text-gray-400">|</span>
                                            <time class="text-gray-500">{{ \Carbon\Carbon::parse($achievements->first()->date)->format('d F Y') }}</time>
                                        </div>
                                        <span class="text-blue-600 font-bold uppercase tracking-wide group-hover:underline">
                                            Baca Selengkapnya →
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endif

                    <!-- More Stories Grid -->
                    <div class="space-y-12">
                        @foreach ($achievements->skip(1) as $achievement)
                            <article class="flex flex-col lg:flex-row gap-6 group">
                                <a href="{{ route('achievement.detail', $achievement->id) }}" class="lg:w-1/3 flex-shrink-0 block overflow-hidden rounded-lg">
                                    @if ($achievement->photo)
                                        <img src="{{ $achievement->photo }}" 
                                             alt="{{ $achievement->title }}" 
                                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                            <span class="text-6xl">🥇</span>
                                        </div>
                                    @endif
                                </a>
                                
                                <div class="lg:w-2/3 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center space-x-3 mb-2">
                                            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">{{ $achievement->level }}</span>
                                            <time class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($achievement->date)->format('d M Y') }}</time>
                                        </div>
                                        <h3 class="text-2xl font-serif font-bold text-gray-900 mb-2 leading-tight">
                                            <a href="{{ route('achievement.detail', $achievement->id) }}" class="group-hover:text-blue-700 transition-colors">
                                                {{ $achievement->title }}
                                            </a>
                                        </h3>
                                        <p class="text-gray-600 line-clamp-2">{{ $achievement->description }}</p>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-700">{{ $achievement->student->full_name ?? 'Tim' }}</span>
                                        <a href="{{ route('achievement.detail', $achievement->id) }}" class="text-sm font-bold text-blue-600 group-hover:text-blue-800 flex items-center">
                                            Lanjutkan Baca
                                            <i class="fas fa-arrow-right ml-2 transform translate-x-0 group-hover:translate-x-1 transition-transform"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </main>

                <!-- Sidebar -->
                <aside class="lg:w-1/3 mt-16 lg:mt-0">
                    <div class="sticky top-20 space-y-8">
                        <div class="bg-gray-100 rounded-2xl p-6">
                            <h4 class="font-bold text-gray-900 mb-4 uppercase tracking-wider text-sm">Statistik Prestasi</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Juara Nasional</span>
                                    <span class="text-2xl font-black text-blue-600">12</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Juara Provinsi</span>
                                    <span class="text-2xl font-black text-purple-600">45</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Inovasi & Karya</span>
                                    <span class="text-2xl font-black text-green-600">28</span>
                                </div>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div>
                            <h4 class="font-bold text-gray-900 mb-4 uppercase tracking-wider text-sm">Kategori</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Teknologi</span>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Sains</span>
                                <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-semibold">Olahraga</span>
                                <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-semibold">Seni</span>
                                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">Kewirausahaan</span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- Pagination -->
            <div class="mt-20 border-t border-gray-200 pt-10 flex justify-center">
                {{ $achievements->links('pagination::tailwind') }}
            </div>
        </div>
    </section>
</div>
<div class="min-h-screen bg-white">
    <!-- Accent Line -->
    <div class="h-1 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600"></div>
    
    <!-- Hero Section with Image -->
    <div class="relative h-96 lg:h-[600px] overflow-hidden">
        @if ($achievement->photo)
            <img
                src="{{ asset('storage/' . $achievement->photo) }}"
                alt="{{ $achievement->title }}"
                class="w-full h-full object-cover"
            />
        @else
            <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                <span class="text-8xl">🏆</span>
            </div>
        @endif
        
        <!-- Overlay with Title -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 lg:p-16 w-full">
            <div class="max-w-4xl">
                <div class="flex items-center space-x-3 mb-4">
                    <span class="px-3 py-1 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider rounded-full">
                        {{ $achievement->level }}
                    </span>
                    <time class="text-white/80 text-sm">{{ \Carbon\Carbon::parse($achievement->date)->translatedFormat('d F Y') }}</time>
                </div>
                <h1 class="text-4xl lg:text-6xl font-serif font-bold text-white leading-tight">
                    {{ $achievement->title }}
                </h1>
                <div class="flex items-center mt-6">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mr-4">
                        <x-heroicon-o-user class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <p class="text-white font-medium">{{ $achievement->student->full_name ?? 'Tim' }}</p>
                        <p class="text-white/70 text-sm">Peraih Prestasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-12 py-16">
        <div class="lg:flex lg:gap-12">
            <!-- Main Content -->
            <main class="lg:w-2/3">
                <!-- Pull Quote -->
                <blockquote class="border-l-4 border-blue-600 pl-6 my-8 text-2xl text-gray-700 italic font-serif">
                    "{{ Str::limit($achievement->description, 150) }}"
                </blockquote>

                <!-- Full Description -->
                <div class="prose prose-lg max-w-none">
                    <p class="text-gray-700 leading-relaxed text-lg">
                        {{ $achievement->description }}
                    </p>
                    
                    <!-- Additional Content (can be expanded with more fields) -->
                    <div class="mt-8 p-6 bg-blue-50 rounded-2xl">
                        <h3 class="text-xl font-bold text-blue-900 mb-3">Tentang Prestasi Ini</h3>
                        <p class="text-blue-800">
                            Prestasi ini merupakan hasil dari dedikasi, kerja keras, dan bimbingan dari para guru yang kompeten di bidangnya. 
                            Ini juga mencerminkan komitmen sekolah dalam mengembangkan potensi siswa untuk bersaing di tingkat yang lebih tinggi.
                        </p>
                    </div>
                </div>

                <!-- Share Section -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Bagikan Prestasi Ini</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url(route('achievement.detail', $achievement->id))) }}" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url(route('achievement.detail', $achievement->id))) }}&text={{ urlencode('Check out this achievement: ' . $achievement->title) }}" target="_blank" class="w-10 h-10 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" onclick="shareOnInstagram('{{ url(route('achievement.detail', $achievement->id)) }}', '{{ $achievement->title }}')" class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-500 text-white rounded-full flex items-center justify-center hover:from-purple-700 hover:to-pink-600 transition-all cursor-pointer">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode('Check out this achievement: ' . $achievement->title . ' ' . url(route('achievement.detail', $achievement->id))) }}" target="_blank" class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </main>

            <!-- Sidebar -->
            <aside class="lg:w-1/3 mt-12 lg:mt-0">
                <!-- Back Button -->
                <div class="mb-8">
                    <a href="{{ route('achievement') }}" 
                       class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                        <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" />
                        <span>Kembali ke Semua Prestasi</span>
                    </a>
                </div>

                <!-- Achievement Details -->
                <div class="bg-gray-50 rounded-2xl p-6 mb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Detail Prestasi</h3>
                    <dl class="space-y-3">
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Tingkat</dt>
                            <dd class="font-semibold text-gray-900">{{ $achievement->level }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Tanggal</dt>
                            <dd class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($achievement->date)->translatedFormat('d F Y') }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-600">Peserta</dt>
                            <dd class="font-semibold text-gray-900">{{ $achievement->student->full_name ?? 'Tim' }}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Related Achievements -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Prestasi Lainnya</h3>
                    <div class="space-y-4">
                        @if($achievements && $achievements->count() > 0)
                            @foreach($achievements as $relatedAchievement)
                            <a href="{{ route('achievement.detail', $relatedAchievement->id) }}" class="flex items-start space-x-3 group hover:bg-gray-100 p-2 rounded-lg transition-colors">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden flex-shrink-0">
                                    @if($relatedAchievement->photo)
                                        <img src="{{ asset('storage/' . $relatedAchievement->photo) }}" alt="{{ $relatedAchievement->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                            <span class="text-2xl">🏆</span>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">{{ $relatedAchievement->title }}</h4>
                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($relatedAchievement->date)->translatedFormat('d F Y') }}</p>
                                </div>
                            </a>
                            @endforeach
                        @else
                            <p class="text-gray-500 text-sm">Tidak ada prestasi lainnya yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
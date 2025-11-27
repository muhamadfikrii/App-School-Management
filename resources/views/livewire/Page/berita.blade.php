<div class="bg-gray-50" x-data="{ mobileMenuOpen: false }">

    <!-- Hero Section -->
    <div class="bg-blue-800 text-white py-12 pt-32 lg:max-h-7xl">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Berita Terkini SMKN 4 Kuningan</h1>
                <p class="text-lg md:text-xl mb-6">Ikuti perkembangan terbaru seputar kegiatan, prestasi, dan informasi penting dari sekolah kami.</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        @if(!$showDetail)
            <!-- List View -->
            <div class="mb-8 flex flex-wrap gap-4 items-center justify-between">
                <div class="relative w-full md:w-64">
                    <input 
                        type="text" 
                        placeholder="Cari berita..." 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        wire:model.live.debounce.500ms="searchQuery">
                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <!-- Loading State -->
            <div wire:loading class="flex justify-center items-center py-12">
                <div class="loading-spinner border-blue-500 border-t-blue-500"></div>
                <span class="ml-3 text-gray-600">Memuat berita...</span>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" wire:loading.remove>
                @foreach ($beritas as $news)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden news-card fade-in cursor-pointer" 
                         wire:click="showDetail({{ $news->id }})">
                        <div class="h-48 bg-gray-200 relative">
                            <img 
                                src="{{ $news->image_url 
                                    ? (filter_var($news->image_url, FILTER_VALIDATE_URL) ? $news->image_url : asset('storage/' . $news->image_url))
                                    : 'https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1172&q=80' }}"
                                alt="{{ $news->title }}" 
                                class="w-full h-full object-cover"
                                onerror="this.src='https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1172&q=80'">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                                <span class="text-white text-sm">{{ $news->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $news->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $news->excerpt ?: 'Tidak ada ringkasan tersedia.' }}</p>
                            
                            <div class="flex justify-between items-center">
                                <a href="{{ route('berita.detail', ['slug' => $news->id]) }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center gap-2">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <!-- Empty State -->
                @if ($beritas->count() === 0)
                    <div class="col-span-full text-center py-12 fade-in">
                        <i class="fas fa-newspaper text-5xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ada berita yang ditemukan</h3>
                        <p class="text-gray-500">Coba gunakan kata kunci lain untuk melihat berita.</p>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $beritas->links() }}
            </div>
        @else
            <!-- Detail View -->
            <div class="fade-in">
                <button 
                    class="mb-6 text-blue-600 hover:text-blue-800 font-semibold flex items-center gap-2"
                    wire:click="backToList">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Daftar Berita
                </button>
                
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-64 md:h-80 bg-gray-200 relative">
                        <img 
                            src="{{ $currentNews->image_url 
                            ? asset('storage/' . $currentNews->image_url) 
                            : 'https://images.unsplash.com/photo-1588072432836-e100327e50ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1172&q=80' }}"
                            alt="{{ $currentNews->title }}" 
                            class="w-full h-full object-cover"
                            onerror="this.src='https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1172&q=80'">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                            <span class="text-white text-sm">{{ $currentNews->created_at->format('d F Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $currentNews->title }}</h1>
                        
                        <div class="flex flex-wrap gap-4 text-gray-600 mb-6">
                            <div class="flex items-center">
                                <i class="far fa-clock mr-2"></i>
                                <span>{{ $currentNews->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                        
                        <div class="prose max-w-none mb-8">
                            {!! $currentNews->content ?: 'Konten berita tidak tersedia.' !!}
                        </div>
                        
                        <div class="border-t border-gray-200 pt-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Bagikan Berita Ini</h3>
                            <div class="flex gap-4">
                                <button class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button class="w-10 h-10 rounded-full bg-blue-400 text-white flex items-center justify-center hover:bg-blue-500">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="w-10 h-10 rounded-full bg-red-600 text-white flex items-center justify-center hover:bg-red-700">
                                    <i class="fab fa-whatsapp"></i>
                                </button>
                                <button class="w-10 h-10 rounded-full bg-gray-800 text-white flex items-center justify-center hover:bg-gray-900">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <style>
        .news-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .loading-spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid #3b82f6;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .prose {
            max-width: none;
        }
        .prose p {
            margin-bottom: 1rem;
        }
        .prose ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
</div>
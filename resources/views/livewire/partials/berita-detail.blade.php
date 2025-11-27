<div class="min-h-screen bg-gray-50 pt-16" x-data="{ showShareMenu: false }">

    <div class="container mx-auto px-4 py-8">
        @if($berita)
            <!-- Breadcrumb -->
            <div class="mb-8">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-sm text-gray-600">
                        <li>
                            <a href="{{ route('berita') }}" class="hover:text-blue-700 transition-colors">Beranda</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-chevron-right text-xs mx-2"></i>
                            <span class="text-gray-900 font-medium">{{ $berita->title }}</span>
                        </li>
                    </ol>
                </nav>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Konten Utama -->
                <div class="lg:w-2/3">
                    <article class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <!-- Header Artikel -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                    Berita Sekolah
                                </span>
                                <span class="text-gray-500 text-sm">
                                    <i class="far fa-clock mr-1"></i>
                                    <span>{{ $berita->created_at->format('d F Y') }}</span>
                                </span>
                            </div>
                            
                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                                {{ $berita->title }}
                            </h1>
                            
                            @if($berita->excerpt)
                            <p class="text-lg text-gray-600 mb-4">
                                {{ $berita->excerpt }}
                            </p>
                            @endif
                        </div>

                        <!-- Gambar Utama -->
                        <div class="relative">
                            <img src="{{ $berita->image_url
                                    ? asset('storage/' . $berita->image_url)
                                    : asset('img/logo.png') }}"
                                 alt="{{ $berita->title }}"
                                 class="w-full h-64 lg:h-96 object-cover">
                        </div>

                        <!-- Konten Artikel -->
                        <div class="p-6 lg:p-8">
                            <div class="prose prose-lg max-w-none">
                                {!! $berita->content ?? '<p class="text-gray-500">Konten berita tidak tersedia.</p>' !!}
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <!-- Berita Terkait -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-newspaper text-blue-600 mr-2"></i>
                            Berita Terkait
                        </h3>
                        
                        <div class="space-y-4">
                            @foreach($relatedNews as $item)
                                <a href="{{ route('berita.detail', $item->id) }}" 
                                class="flex gap-3 group hover:bg-gray-50 p-2 rounded-lg transition-colors">

                                    <!-- GAMBAR BERITA -->
                                    <img
                                        src="{{ $item->image_url
                                            ? asset('storage/' . $item->image_url)
                                            : asset('img/logo.png') }}"
                                        class="w-20 h-16 object-cover rounded-lg flex-shrink-0">

                                    <!-- TEXT BERITA -->
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-medium text-gray-900 group-hover:text-blue-700 line-clamp-2 leading-tight mb-1">
                                            {{ $item->title }}
                                        </h4>

                                        <div class="flex items-center text-xs text-gray-500 space-x-2">
                                            <span>{{ $item->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>

                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Info Penulis -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            Tentang Penulis
                        </h3>
                        
                        <div class="flex items-center gap-3">
                               <img src="{{ asset('img/profileAdmin.avif') }}" class="w-12 h-12 rounded-full flex items-center justify-center" alt="profile admin">
                            <div>
                                <h4 class="font-semibold text-gray-900">Admin Sekolah</h4>
                                <p class="text-sm text-gray-600">Tim Humas Sekolah</p>
                            </div>
                        </div>
                        
                        <p class="mt-3 text-sm text-gray-600">
                            Tim humas sekolah bertugas menyampaikan informasi dan perkembangan terbaru seputar kegiatan, prestasi, dan program sekolah.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Berita Lainnya -->
            <div class="mt-12">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Berita Lainnya</h2>
                    <a href="/berita" class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                        Lihat Semua
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedNews as $item)
                        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            @if($item->image_url)
                                <img src="{{ $item->image_url
                                    ? (filter_var($item->image_url, FILTER_VALIDATE_URL) ? $item->image_url : asset('storage/' . $item->image_url))
                                    : 'https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1172&q=80' }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-blue-100 flex items-center justify-center">
                                    <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1172&q=80" alt="">
                                </div>
                            @endif
                            
                            <div class="p-5">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-gray-500 text-xs">{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                                
                                <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-2 leading-tight">
                                    <a href="{{ route('berita.detail', $item->id) }}" class="hover:text-blue-700 transition-colors">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ $item->excerpt ?? 'Baca selengkapnya tentang berita terbaru dari sekolah kami.' }}
                                </p>
                                
                                <div class="flex items-center justify-between text-sm text-gray-500">
                                    <a href="{{ route('berita.detail', $item->id) }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                        Baca Selengkapnya
                                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Loading State -->
            <div class="flex justify-center items-center py-12">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-500"></div>
                <span class="ml-3 text-gray-600">Memuat berita...</span>
            </div>
        @endif
    </div>

    <script>
        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href);
            alert('Link berhasil disalin!');
        }
    </script>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .prose {
            max-width: none;
            line-height: 1.7;
        }
        
        .prose p {
            margin-bottom: 1.25rem;
        }
        
        .prose h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 2rem 0 1rem;
            color: #1f2937;
        }
        
        .prose h3 {
            font-size: 1.25rem;
            font-weight: bold;
            margin: 1.5rem 0 0.75rem;
            color: #1f2937;
        }
        
        .prose ul, .prose ol {
            margin-bottom: 1.25rem;
            padding-left: 1.625rem;
        }
        
        .prose li {
            margin-bottom: 0.5rem;
        }
        
        .prose blockquote {
            border-left: 4px solid #3b82f6;
            padding-left: 1rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #6b7280;
        }
    </style>
</div>
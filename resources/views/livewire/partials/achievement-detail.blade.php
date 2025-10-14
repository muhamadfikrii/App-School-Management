<div class="min-h-screen bg-gray-50 py-16 px-4 sm:px-6 lg:px-12">
    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-200">
        <div class="lg:flex">
            
            <!-- Gambar Prestasi -->
            @if($achievement->photo)
            <div class="lg:w-1/2">
                <img src="{{ asset('storage/' . $achievement->photo) }}" 
                     alt="{{ $achievement->title }}" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            </div>
            @endif

            <!-- Konten -->
            <div class="lg:w-1/2 p-8 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-blue-700 mb-4">{{ $achievement->title }}</h1>

                    <!-- Info Meta -->
                    <div class="flex flex-wrap items-center gap-3 text-gray-500 text-sm mb-6">
                        <span>Oleh: <span class="font-medium text-gray-700">{{ $achievement->student->full_name ?? 'Tim' }}</span></span>
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">{{ $achievement->level }}</span>
                        <span>{{ \Carbon\Carbon::parse($achievement->date)->format('d M Y') }}</span>
                    </div>

                    <!-- Deskripsi -->
                    <p class="text-gray-700 leading-relaxed text-justify">{{ $achievement->description }}</p>
                </div>

                <!-- Tombol Kembali -->
                <div class="mt-8">
                    <a href="{{ route('achievement') }}" 
                       class="inline-block px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold shadow-md hover:bg-blue-600 transition transform hover:-translate-y-1">
                        ← Kembali ke Semua Prestasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

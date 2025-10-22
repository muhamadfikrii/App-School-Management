<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-gray-50 py-20 px-4 sm:px-6 lg:px-12">
    <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100 transform transition-all hover:shadow-blue-200">
        <div class="lg:flex">
            <!-- Gambar Prestasi -->
            <div class="lg:w-1/2 relative group overflow-hidden">
                <img
                    src="{{ asset('storage/' . $achievement->photo) }}"
                    alt="{{ $achievement->title }}"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent opacity-70 group-hover:opacity-80 transition duration-500"></div>
                <div class="absolute bottom-6 left-6">
                    <span class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-full shadow-md">
                        {{ $achievement->level }}
                    </span>
                </div>
            </div>

            <!-- Konten -->
            <div class="lg:w-1/2 p-10 flex flex-col justify-between">
                <div>
                    <!-- Judul -->
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-blue-800 mb-6 leading-tight">
                        {{ $achievement->title }}
                    </h1>

                    <!-- Info Meta -->
                    <div class="flex flex-wrap items-center gap-3 text-gray-500 text-sm mb-6">
                        <div class="flex items-center gap-2">
                            <x-heroicon-o-user class="w-4 h-4 text-blue-500" />
                            <span class="font-medium text-gray-700">
                                {{ $achievement->student->full_name ?? 'Tim' }}
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-heroicon-o-calendar class="w-4 h-4 text-blue-500" />
                            <span>{{ \Carbon\Carbon::parse($achievement->date)->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <p class="text-gray-700 text-justify tracking-wide mb-4">
                            {{ $achievement->description }}
                        </p>
                </div>

                <!-- Tombol -->
                <div class="mt-10">
                    <a href="{{ route('achievement') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold shadow-md hover:bg-blue-600 hover:shadow-lg transition-all transform hover:-translate-y-1">
                        <x-heroicon-o-arrow-left class="w-5 h-5" />
                        <span>Kembali ke Semua Prestasi</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

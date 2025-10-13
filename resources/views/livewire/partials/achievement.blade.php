<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 text-center">
        <h1 class="text-3xl sm:text-4xl font-bold text-blue-700 mb-12">Prestasi Siswa</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($achievements as $achievement)
                <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    
                    @if ($achievement->photo)
                        <img src="{{ asset('storage/' . $achievement->photo) }}" alt="{{ $achievement->title }}" class="rounded-xl mb-4 w-full h-48 object-cover shadow-sm">
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
                </div>
            @endforeach
        </div>
    </div>
</div>

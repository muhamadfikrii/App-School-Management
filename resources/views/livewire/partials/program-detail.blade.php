<div class="min-h-screen bg-gray-50 py-20 px-6 mt-10">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
        <!-- Header -->
        <div class="relative">
            <img src="{{ $program['image'] }}" alt="{{ $program['name'] }}" class="w-full h-64 object-cover">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white tracking-wide">
                    {{ strtoupper($program['name']) }}
                </h1>
            </div>
        </div>

        <!-- Body -->
        <div class="p-10 space-y-8">
            <!-- Deskripsi -->
            <section>
                <h2 class="text-2xl font-semibold text-blue-700 mb-2">Deskripsi Jurusan</h2>
                <p class="text-gray-700 leading-relaxed">
                    {{ $program['description'] }}
                </p>
            </section>

            <!-- Kompetensi -->
            <section>
                <h2 class="text-2xl font-semibold text-blue-700 mb-2">Kompetensi Keahlian</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    @foreach ($program['skills'] as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Prospek kerja -->
            <section>
                <h2 class="text-2xl font-semibold text-blue-700 mb-2">Prospek Kerja</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    @foreach ($program['careers'] as $career)
                        <li>{{ $career }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Tombol kembali -->
            <div class="pt-6">
                <a href="{{ route('jurusan') }}"
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke daftar jurusan
                </a>
            </div>
        </div>
    </div>
</div>

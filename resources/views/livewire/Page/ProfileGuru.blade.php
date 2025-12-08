<div class="font-poppins bg-gray-50 text-[#1e293b]">

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#1e40af] to-[#0ea5e9] text-white pb-12 pt-26">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Profil Guru SMKN 4 Kuningan</h1>
                <p class="text-lg md:text-xl mb-6 opacity-90">Tim pengajar profesional yang berdedikasi tinggi dalam mencetak lulusan kompeten dan siap kerja di bidang teknologi.</p>
            </div>
        </div>
    </section>

    <!-- Filter & Search -->
    <section class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-[#1e40af] mb-2">Temukan Guru Anda</h2>
                <p class="text-gray-600 text-lg">Cari dan filter guru berdasarkan kebutuhan Anda</p>
            </div>

            <!-- Search Bar -->
            <div class="mb-8">
                <div class="relative max-w-md mx-auto">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama guru, NIP, atau mata pelajaran..." class="w-full px-6 py-4 pl-12 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-[#1e40af] focus:border-transparent text-lg">
                    <i class="fas fa-search absolute left-4 top-4.5 text-gray-400 text-lg"></i>
                </div>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-user-check mr-2 text-[#1e40af]"></i>Status Kepegawaian
                    </label>
                    <div class="flex flex-wrap gap-2">
                        <button wire:click="$set('statusFilter', '')" class="px-3 py-2 text-sm {{ !$statusFilter ? 'bg-[#1e40af] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg transition duration-200">Semua</button>
                        <button wire:click="$set('statusFilter', 'PNS')" class="px-3 py-2 text-sm {{ $statusFilter === 'PNS' ? 'bg-[#1e40af] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg transition duration-200">PNS</button>
                        <button wire:click="$set('statusFilter', 'PPPK')" class="px-3 py-2 text-sm {{ $statusFilter === 'PPPK' ? 'bg-[#1e40af] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg transition duration-200">PPPK</button>
                        <button wire:click="$set('statusFilter', 'GTY')" class="px-3 py-2 text-sm {{ $statusFilter === 'GTY' ? 'bg-[#1e40af] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg transition duration-200">GT</button>
                        <button wire:click="$set('statusFilter', 'GTT')" class="px-3 py-2 text-sm {{ $statusFilter === 'GTT' ? 'bg-[#1e40af] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg transition duration-200">GTT</button>
                        <button wire:click="$set('statusFilter', 'Honorer')" class="px-3 py-2 text-sm {{ $statusFilter === 'Honorer' ? 'bg-[#1e40af] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg transition duration-200">Honorer</button>
                        <button wire:click="$set('statusFilter', 'Kontrak')" class="px-3 py-2 text-sm {{ $statusFilter === 'Kontrak' ? 'bg-[#1e40af] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg transition duration-200">Kontrak</button>
                    </div>
                </div>

                <!-- Department Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-graduation-cap mr-2 text-[#1e40af]"></i>Jurusan/Program Studi
                    </label>
                    <select wire:model.live="departmentFilter" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#1e40af] focus:border-transparent">
                        <option value="">Semua Jurusan</option>
                        <option value="1">Normatif</option>
                        <option value="2">Produktif</option>
                        <option value="3">Produktif Khusus</option>
                    </select>
                </div>

                <!-- Active Filters & Reset -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-filter mr-2 text-[#1e40af]"></i>Filter Aktif
                    </label>
                    <div class="space-y-2">
                        @if($search)
                        <div class="flex items-center justify-between bg-blue-50 px-3 py-2 rounded-lg">
                            <span class="text-sm text-blue-700">Pencarian: "{{ $search }}"</span>
                        </div>
                        @endif
                        @if($statusFilter)
                        <div class="flex items-center justify-between bg-green-50 px-3 py-2 rounded-lg">
                            <span class="text-sm text-green-700">Status: {{ $statusFilter }}</span>
                        </div>
                        @endif
                        @if($departmentFilter)
                        <div class="flex items-center justify-between bg-purple-50 px-3 py-2 rounded-lg">
                            <span class="text-sm text-purple-700">Jurusan: {{ $departmentFilter == 1 ? 'Normatif' : ($departmentFilter == 2 ? 'Produktif' : 'Produktif Khusus') }}</span>
                        </div>
                        @endif
                        @if($search || $statusFilter || $departmentFilter)
                        <button wire:click="clearFilters" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200">
                            <i class="fas fa-times mr-2"></i> Hapus Semua Filter
                        </button>
                        @else
                        <div class="text-center py-4 text-gray-500">
                            <i class="fas fa-info-circle text-2xl mb-2"></i>
                            <p class="text-sm">Tidak ada filter aktif</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Results Summary -->
            <div class="border-t pt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center text-gray-600">
                    <div class="mb-4 sm:mb-0">
                        <i class="fas fa-users mr-2 text-[#1e40af]"></i>
                        <span class="font-medium">{{ $teachers->total() }}</span> guru ditemukan
                    </div>
                    @if($teachers->total() > 0)
                    <div class="text-sm">
                        Menampilkan {{ $teachers->firstItem() }} - {{ $teachers->lastItem() }} dari {{ $teachers->total() }} hasil
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Guru -->
    <main class="container mx-auto px-4 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($teachers as $teacher)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="p-6">
                    <!-- Header with Avatar and Basic Info -->
                    <div class="flex flex-col sm:flex-row items-center sm:items-start mb-4">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden border-4 border-[#1e40af]/10 mb-4 sm:mb-0 sm:mr-6 flex-shrink-0">
                            <img src="{{ $teacher->avatar_url ?? asset('img/profileGuru.png') }}" alt="{{ $teacher->full_name }}" class="w-full h-full object-cover">
                        </div>
                        <div class="text-center sm:text-left flex-1">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                                <h3 class="text-lg sm:text-xl font-bold text-[#1e40af] mb-2 sm:mb-0">{{ $teacher->full_name }}</h3>
                                <span class="px-3 py-1 {{ $teacher->status->badgeClass() }} text-xs font-bold rounded-full self-center sm:self-auto">{{ $teacher->status->label() }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center text-gray-500 text-sm space-y-1 sm:space-y-0 sm:space-x-4">
                                <div class="flex items-center justify-center sm:justify-start">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    <span>Pengalaman: {{ $teacher->date_of_birth ? \Carbon\Carbon::parse($teacher->date_of_birth)->age : 'N/A' }} Tahun</span>
                                </div>
                                @if($teacher->nip)
                                <div class="flex items-center justify-center sm:justify-start">
                                    <i class="fas fa-id-card mr-2"></i>
                                    <span>NIP: {{ $teacher->nip }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Subjects Section -->
                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-700 mb-2 text-sm">Mata Pelajaran:</h4>
                        <div class="flex flex-wrap gap-2">
                            @forelse($teacher->subjects as $subject)
                            <span class="px-2 py-1 bg-blue-50 text-[#1e40af] text-xs rounded-full">{{ $subject->name }}</span>
                            @empty
                            <span class="px-2 py-1 bg-gray-50 text-gray-500 text-xs rounded-full">Belum ada mata pelajaran</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col space-y-2">
                        <button class="w-full py-2 bg-[#1e40af] text-white rounded-lg font-medium hover:bg-[#1e40af]/90 transition duration-300 text-sm" wire:click="showTeacherDetail({{ $teacher->id }})">
                            Lihat Profil Lengkap
                        </button>
                        @if($teacher->user && $teacher->user->email)
                        <a href="mailto:{{ $teacher->user->email }}" class="w-full py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition duration-300 text-center text-sm">
                            <i class="fas fa-envelope mr-2"></i> Kirim Email
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($teachers->hasPages())
        <div class="flex justify-center mt-12">
            {{ $teachers->links('pagination::tailwind') }}
        </div>
        @endif

        <!-- Results Info -->
        <div class="text-center mt-6 text-gray-600">
            Menampilkan {{ $teachers->firstItem() ?? 0 }} sampai {{ $teachers->lastItem() ?? 0 }} dari total {{ $teachers->total() }} guru
        </div>
    </main>

    <!-- Modal Detail Guru -->
    @if($showModal && $selectedTeacher)
    <div class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4" wire:click="closeModal">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto" wire:ignore.self>
            <div class="sticky top-0 bg-white p-6 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-2xl font-bold text-[#1e40af]">Detail Profil Guru</h3>
                <button wire:click="closeModal" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="p-6">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mb-8">
                    <div class="w-48 h-48 rounded-full overflow-hidden border-8 border-[#1e40af]/10 flex-shrink-0">
                        <img src="{{ $selectedTeacher->avatar_url ?? asset('img/profileGuru.png') }}" alt="{{ $selectedTeacher->full_name }}" class="w-full h-full object-cover">
                    </div>

                    <div>
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <h2 class="text-3xl font-bold text-[#1e40af]">{{ $selectedTeacher->full_name }}</h2>
                            <span class="px-4 py-1 rounded-full text-sm font-bold {{ $selectedTeacher->status->badgeClass() }}">{{ $selectedTeacher->status->label() }}</span>
                        </div>

                        <p class="text-gray-600 text-lg mb-4">Bidang Keahlian: {{ $selectedTeacher->subjects->pluck('name')->join(', ') ?: 'Belum ditentukan' }}</p>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-briefcase text-[#0ea5e9] mr-3 text-xl"></i>
                                <div>
                                    <p class="text-sm text-gray-500">Pengalaman</p>
                                    <p class="font-medium">{{ $selectedTeacher->date_of_birth ? \Carbon\Carbon::parse($selectedTeacher->date_of_birth)->age : 'N/A' }} Tahun</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-graduation-cap text-[#0ea5e9] mr-3 text-xl"></i>
                                <div>
                                    <p class="text-sm text-gray-500">NIP</p>
                                    <p class="font-medium">{{ $selectedTeacher->nip ?: 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-4">
                            @if($selectedTeacher->user && $selectedTeacher->user->email)
                            <a href="mailto:{{ $selectedTeacher->user->email }}" class="px-4 py-2 bg-[#1e40af] text-white rounded-lg hover:bg-[#1e40af]/90">
                                <i class="fas fa-envelope mr-2"></i> Email
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h4 class="text-xl font-bold text-[#1e40af] mb-4">Mata Pelajaran yang Diampu</h4>
                    <div class="flex flex-wrap gap-2">
                        @forelse($selectedTeacher->subjects as $subject)
                        <span class="px-3 py-1 bg-blue-50 text-[#1e40af] text-sm rounded-full">{{ $subject->name }}</span>
                        @empty
                        <span class="px-3 py-1 bg-gray-50 text-gray-500 text-sm rounded-full">Belum ada mata pelajaran</span>
                        @endforelse
                    </div>
                </div>

                <div>
                    <h4 class="text-xl font-bold text-[#1e40af] mb-4">Informasi Tambahan</h4>
                    <div class="text-gray-700 leading-relaxed">
                        <p><strong>Jenis Kelamin:</strong> {{ $selectedTeacher->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        <p><strong>Alamat:</strong> {{ $selectedTeacher->address ?: 'N/A' }}</p>
                        <p><strong>Telepon:</strong> {{ $selectedTeacher->phone ?: 'N/A' }}</p>
                        @if($selectedTeacher->date_of_birth)
                        <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($selectedTeacher->date_of_birth)->format('d M Y') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

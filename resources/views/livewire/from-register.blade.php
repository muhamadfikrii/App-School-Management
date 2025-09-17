<div class="flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-10">
    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
        
        <!-- Header -->
        <div class="px-10 py-8 bg-gradient-to-r from-indigo-700 to-indigo-800 text-white text-center">
            <div class="flex justify-center gap-16 items-center mb-6 relative">
                <img src="{{ asset('img/logo.png') }}" alt="Logo SMK"
                    class="w-20 h-20 bg-white rounded-full shadow-lg p-2 border-4 border-indigo-200">
                <img src="{{ asset('img/logo.png') }}" alt="Logo SMK"
                    class="w-20 h-20 bg-white rounded-full shadow-lg p-2 border-4 border-indigo-200">
            </div>
            <h2 class="text-3xl font-bold">Formulir Registrasi</h2>
            <p class="text-sm mt-2 opacity-90">Isi data Anda dengan lengkap dan benar untuk melanjutkan</p>
        </div>

        <!-- Body -->
        <form wire:submit.prevent="submit" class="grid grid-cols-2 gap-6 px-10 py-8">
            
            <!-- Nama Lengkap -->
            <div class="col-span-2">
                <label class="block mb-2 text-gray-700 font-semibold">Nama Lengkap</label>
                <input type="text" wire:model="name" required placeholder="Masukkan nama lengkap"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-2 text-gray-700 font-semibold">Email</label>
                <input type="email" wire:model="email" required placeholder="contoh@email.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block mb-2 text-gray-700 font-semibold">Password</label>
                <input type="password" wire:model="password" required placeholder="Minimal 8 karakter"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block mb-2 text-gray-700 font-semibold">Konfirmasi Password</label>
                <input type="password" wire:model="password_confirmation" required placeholder="Ulangi password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
            </div>

            @if ($isTeacher)
                <!-- NIP -->
                <div>
                    <label class="block mb-2 text-gray-700 font-semibold">NIP</label>
                    <input type="text" wire:model="nip" required placeholder="Nomor Induk Pegawai"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    @error('nip') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block mb-2 text-gray-700 font-semibold">Nomor HP</label>
                    <input type="text" wire:model="phone" required placeholder="0812xxxxxx"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block mb-2 text-gray-700 font-semibold">Jenis Kelamin</label>
                    <select wire:model="gender"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                        <option value="">-- Pilih Gender --</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block mb-2 text-gray-700 font-semibold">Tanggal Lahir</label>
                    <input type="date" wire:model="date_of_birth"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                </div>

                <!-- Status -->
                <div>
                    <label class="block mb-2 text-gray-700 font-semibold">Status</label>
                    <select wire:model="status"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                        <option value="">-- Pilih Status --</option>
                        @foreach(\App\Enums\TeacherStatus::cases() as $status)
                            <option value="{{ $status->value }}">{{ $status->getLabel() }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Address -->
                <div class="col-span-2">
                    <label class="block mb-2 text-gray-700 font-semibold">Alamat</label>
                    <textarea wire:model="address" rows="3" placeholder="Tuliskan alamat lengkap"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition"></textarea>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="col-span-2 flex justify-center">
                <button type="submit"
                    class="w-full md:w-auto bg-indigo-700 hover:bg-indigo-800 text-white font-semibold px-10 py-3 rounded-lg shadow-md transition duration-200">
                    Daftar Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

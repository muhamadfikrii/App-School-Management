<div class="flex justify-center items-center min-h-screen bg-gray-50 px-4 py-20">
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
        
        <!-- Branding Kiri -->
        <div class="hidden md:flex flex-col justify-between bg-gradient-to-br from-indigo-700 to-indigo-900 text-white p-12 relative">
            <div>
                <h1 class="text-lg font-[Poppins] font-medium">
                    Selamat datang, {{ $name }}.<br>Silakan melakukan registrasi akun Anda.
                </h1>
            </div>

            <div class="text-center">
                <h1 class="text-3xl font-extrabold tracking-tight">SMKN 4 Kuningan</h1>
                <p class="mt-3 text-gray-200 text-base">
                    Bersama membangun generasi unggul melalui layanan digital resmi
                </p>
            </div>

            <div class="text-sm text-gray-300 text-center mt-4">
                © 2025 SMKN 4 Kuningan. Seluruh hak cipta dilindungi.
            </div>
        </div>

        <!-- Form Kanan -->
        <form wire:submit.prevent="submit" class="p-8 sm:p-12 md:p-14 bg-white">
            <!-- Judul -->
            <div class="mb-10 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-800">Registrasi Akun</h2>
                <p class="mt-2 text-gray-500 text-sm">Isi data Anda dengan benar untuk melanjutkan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" wire:model="name" required placeholder="Masukkan nama lengkap"
                           class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" wire:model="email" required placeholder="contoh@email.com"
                           class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                </div>

                <!-- Password -->
                <div x-data="{ show: false }" class="relative">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input :type="show ? 'text' : 'password'" wire:model="password" required
                           placeholder="Minimal 8 karakter"
                           class="mt-2 w-full px-4 py-3 pr-10 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                    <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-indigo-600 transition">
                        <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 
                                     8.268 2.943 9.542 7-1.274 4.057-5.064 
                                     7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13.875 18.825A10.05 10.05 0 
                                     0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 
                                     9.956 0 012.34-3.993m2.122-2.12A9.956 
                                     9.956 0 0112 5c4.478 0 8.268 2.943 
                                     9.542 7a9.953 9.953 0 01-4.132 
                                     5.411M15 12a3 3 0 11-6 0 
                                     3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3l18 18" />
                        </svg>
                    </button>
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" wire:model="password_confirmation" required placeholder="Ulangi password"
                           class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                </div>

                <!-- Teacher Fields -->
                @if ($isTeacher)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" wire:model="nip" required placeholder="Nomor Induk Pegawai"
                               class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                        <input type="text" wire:model="phone" required placeholder="0812xxxxxx"
                               class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select wire:model="gender"
                                class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                            <option value="">-- Pilih Gender --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" wire:model="date_of_birth"
                               class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select wire:model="status"
                                class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400">
                            <option value="">-- Pilih Status --</option>
                            @foreach(\App\Enums\TeacherStatus::cases() as $status)
                                <option value="{{ $status->value }}">{{ $status->getLabel() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea wire:model="address" rows="3" placeholder="Tuliskan alamat lengkap"
                                  class="mt-2 w-full px-4 py-3 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-300 hover:shadow-sm hover:border-indigo-400"></textarea>
                    </div>
                @endif
            </div>

            <!-- Tombol -->
            <div class="mt-10">
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-3 rounded-2xl shadow-lg transition transform hover:scale-105 duration-300">
                    Daftar Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

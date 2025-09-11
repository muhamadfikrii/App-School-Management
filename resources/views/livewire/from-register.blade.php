<div class="flex justify-center my-4  items-center min-h-screen bg-gray-50">
    <div class="w-full max-w-4xl">
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 border border-green-300 p-3 mb-6 rounded-lg shadow-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="shadow-lg border border-gray-200 rounded-xl">
            <div class="px-8 text-white font-semibold bg-indigo-600 py-6 border-b rounded-t-xl border-gray-200">
               <div class="relative flex items-center justify-between w-full">
                    <!-- Foto 1 -->
                    <img src="{{ asset('img/logo.png') }}" alt="logoSMK"
                        class="w-20 h-20 bg-white rounded-full shadow-lg p-2 z-10">

                    <!-- Garis penghubung -->
                    <div class="absolute left-0 right-0 h-0.5 bg-white top-1/2 -translate-y-1/2"></div>

                    <!-- Foto 2 -->
                    <img src="{{ asset('img/logo.png') }}" alt="logoSMK"
                        class="w-20 h-20 bg-white rounded-full shadow-lg p-2 z-10">
                </div>

                <h2 class="text-3xl font-bold font-sans text-gray-900 text-center">Form Registrasi</h2>
                <p class="text-sm text-center mt-1 pb-4">Silakan isi data dengan lengkap dan benar</p>
            </div>

            <form wire:submit.prevent="submit" class="grid grid-cols-2 gap-6 p-8 ">

                <!-- Nama Lengkap -->
                <div>
                    <label class="block mb-2 text-gray-700 font-medium">Nama Lengkap</label>
                    <input type="text" wire:model="name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                <!-- Email -->
                <div>
                    <label class="block mb-2 text-gray-700 font-medium">Email</label>
                    <input type="email" wire:model="email" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block mb-2 text-gray-700 font-medium">Password</label>
                    <input type="password" wire:model="password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block mb-2 text-gray-700 font-medium">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                @if ($isTeacher)
                    <!-- NIP -->
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">NIP</label>
                        <input type="text" wire:model="nip" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @error('nip') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Phone</label>
                        <input type="text" wire:model="phone" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Gender</label>
                        <select wire:model="gender"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">-- Pilih Gender --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('gender') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Tanggal Lahir</label>
                        <input type="date" wire:model="date_of_birth"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block mb-2 text-gray-700 font-medium">Status</label>
                        <select wire:model="status"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="">-- Pilih Status --</option>
                            @foreach(\App\Enums\TeacherStatus::cases() as $status)
                                <option value="{{ $status->value }}">{{ $status->getLabel() }}</option>
                            @endforeach
                        </select>
                        @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Address -->
                    <div class="col-span-2">
                        <label class="block mb-2 text-gray-700 font-medium">Alamat</label>
                        <textarea wire:model="address" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="col-span-2 flex justify-center">
                    <button type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

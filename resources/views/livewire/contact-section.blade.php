<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">

    @if ($successMessage)
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">

        <div>
            <label class="block text-gray-700 font-semibold">Nama</label>
            <input type="text" wire:model="name" class="w-full border rounded px-4 py-2 focus:ring focus:ring-blue-200" required>
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Email</label>
            <input type="email" wire:model="email" class="w-full border rounded px-4 py-2 focus:ring focus:ring-blue-200" required>
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Pesan</label>
            <textarea wire:model="message" rows="5" class="w-full border rounded px-4 py-2 focus:ring focus:ring-blue-200" required></textarea>
            @error('message') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" 
                class="px-6 py-2 mx-auto bg-blue-700 text-white rounded shadow hover:bg-blue-800 transition flex items-center justify-center gap-2">

            <!-- Loader Spin -->
            <svg wire:loading wire:target="submit" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z"></path>
            </svg>

            <!-- Teks Tombol -->
            <span wire:loading.remove wire:target="submit">Kirim Pesan</span>
            <span wire:loading wire:target="submit">Mengirim...</span>

        </button>

    </form>
</div>

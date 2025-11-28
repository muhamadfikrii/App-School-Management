<div>

    <div class="mx-auto mt-[15rem]">
        <h1 class="text-center text-5xl font-bold font-[Poppins]">Kontak Kami</h1>
        <div class="w-[15rem] h-2 mx-auto rounded-lg 
            bg-gradient-to-r from-blue-500 via-blue-700 to-blue-100 
            animate-gradient-x">
        </div>
    </div>

    <livewire:partials.contact-section />

    <div class="bg-white shadow-lg rounded-xl p-6 mt-10">
        {{-- Tabs --}}
        <div class="flex space-x-4 border-b mb-4">
            <button 
                wire:click="setTab('map')" 
                class="px-4 py-2 {{ $tab === 'map' ? 'text-blue-600 cursor-pointer font-semibold border-b-2 border-blue-600' : 'text-gray-600 font-semibold hover:text-blue-600' }}">
                Peta
            </button>
            <button 
                wire:click="setTab('info')" 
                class="px-4 py-2 {{ $tab === 'info' ? 'text-blue-600 cursor-pointer font-semibold border-b-2 border-blue-600' : 'text-gray-600 font-semibold hover:text-blue-600' }}">
                Informasi
            </button>
        </div>

        {{-- Tab Content --}}
        <div class="my-10">
            @if ($tab === 'map')
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4520264997814!2d108.68152037587632!3d-6.955884768102995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0e97e9beddcb%3A0x2fd17d5f9eaf9d66!2sSMK%20Negeri%204%20Kuningan!5e0!3m2!1sid!2sid!4v1758000091445!5m2!1sid!2sid" 
                    class="w-full h-[52rem] rounded-lg shadow-lg border-0" 
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            @else
                <div class="grid md:grid-cols-2 gap-8 mt-6">
                    <div class="p-6 bg-white shadow-md rounded-xl text-left space-y-4">
                        <h3 class="font-bold text-lg text-blue-600">Alamat</h3>
                        <p>Jl. Raya Cikuesik No.73, Kuningan, Jawa Barat</p>
                        
                        <h3 class="font-bold text-lg text-blue-600">Telepon / WA</h3>
                        <a href="https://wa.me/628123456789" class="text-blue-700 hover:underline">(0232) 123456</a>

                        <h3 class="font-bold text-lg text-blue-600">Email</h3>
                        <a href="mailto:info@smkn4kuningan.sch.id" class="text-blue-700 hover:underline">info@smkn4kuningan.sch.id</a>
                    </div>

                    {{-- Kanan --}}
                    <div class="p-6 bg-white shadow-md rounded-xl text-left space-y-4">
                        <h3 class="font-bold text-lg text-blue-600">Jam Operasional</h3>
                        <ul class="space-y-1">
                            <li>Senin – Jumat: 07.00 – 16.00 WIB</li>
                            <li>Sabtu - Minggu: Libur</li>
                        </ul>

                        <h3 class="font-bold text-lg text-blue-600">Sosial Media</h3>
                        <div class="flex space-x-4">
                            <a href="https://www.smkn4kuningan.sch.id/" class="text-blue-700 hover:underline underline-offset-2 hover:text-blue-800">🌐 Website Resmi</a>
                            <a href="https://www.facebook.com/smkn4kng/" class="text-blue-700 hover:underline underline-offset-2 hover:text-blue-800">📘 Facebook</a>
                            <a href="https://www.instagram.com/smkn_04kng/" class="text-blue-700 hover:underline underline-offset-2 hover:text-blue-800">📸 Instagram</a>
                        </div>
                    </div>

                </div>
            @endif
        </div>

        {{-- Tombol Hubungi Kami --}}
        <div class="text-center my-20">
            <a href="mailto:info@smkn4kuningan.sch.id" 
                class="px-6 py-3 bg-blue-700 border border-blue-700 text-white hover:text-blue-700 rounded-lg shadow hover:bg-white transition">
                Hubungi Kami
            </a>
        </div>

    </div>

</div>

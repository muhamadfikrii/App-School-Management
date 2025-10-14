<section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 text-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="{{ $students }}"></h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Siswa Aktif</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="{{ $teachers }}"></h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Guru & Staff</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="{{ $achievements }}">0</h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Prestasi</p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow transition transform hover:-translate-y-1 hover:border-blue-700">
                    <h3 class="text-3xl sm:text-4xl font-bold text-blue-700 counter" data-target="{{ $majors }}">0</h3>
                    <p class="mt-2 text-gray-600 text-sm sm:text-base">Program Keahlian</p>
                </div>
            </div>
        </div>
    </section>
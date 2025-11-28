<div>
  <!-- Hero Section -->
  <section class="relative w-full h-screen overflow-hidden">
    <img
      src="{{ asset('img/organization/organization.jpeg') }}"
      alt="Banner Organisasi dan Ekstrakurikuler"
      class="w-full h-full object-cover brightness-50"
    />
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white px-6 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Organisasi & Ekstrakurikuler</h1>
      <p class="max-w-2xl text-lg md:text-xl leading-relaxed">
        Wadah pengembangan diri bagi siswa SMKN 4 Kuningan untuk menyalurkan minat, bakat, serta membangun karakter unggul di luar kegiatan akademik.
      </p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="py-14 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6">
        Membangun Karakter Melalui Aktivitas Positif
      </h2>
      <p class="text-gray-600 leading-relaxed">
        Kegiatan organisasi dan ekstrakurikuler di SMKN 4 Kuningan tidak hanya menjadi sarana hiburan atau pengisi waktu luang, tetapi juga media pembelajaran karakter, kepemimpinan, kerja sama, dan tanggung jawab. 
        Setiap siswa memiliki kesempatan untuk menemukan potensi diri, berprestasi, dan berkontribusi nyata bagi sekolah dan masyarakat.
      </p>
    </div>
  </section>

  <!-- Grid Eskul Section -->
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">
        Pilihan Organisasi & Ekstrakurikuler
      </h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach ($organizations as $organization)            
        <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition overflow-hidden hover:-translate-y-1">
          <div class="relative">
            <img src="{{ asset($organization['image']) }}" class="w-full h-48 object-cover transition group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <h3 class="absolute bottom-3 left-4 text-white font-semibold text-lg">{{ $organization['name']}}</h3>
          </div>
          <div class="p-6">
            <p class="text-gray-600 text-sm leading-relaxed">
              {{ $organization['description'] }}
            </p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</div>

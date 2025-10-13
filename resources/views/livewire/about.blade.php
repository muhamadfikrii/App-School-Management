<div class="bg-white text-zinc-800 font-sans overflow-x-hidden">

  <!-- 🏫 HERO SECTION -->
  <section class="relative min-h-screen flex items-center justify-center text-center overflow-hidden">
    <!-- Background -->
    <img 
      src="{{ asset('img/profil-sekolah-smk.png') }}"
      alt="Gedung Sekolah"
      class="absolute inset-0 w-full h-full object-cover object-center brightness-90"
    />
    <div class="absolute inset-0 bg-gradient-to-b from-blue-900/70 via-blue-800/40 to-white/90"></div>

    <!-- Hero Content -->
    <div class="relative z-10 px-6 md:px-12 max-w-4xl animate-fadeIn">
      <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
        SMK Negeri 4 Kuningan
      </h1>
      <p class="text-lg md:text-2xl text-white/90 max-w-2xl mx-auto leading-relaxed drop-shadow-md mb-8">
        Membangun generasi unggul, kreatif, dan siap menghadapi tantangan dunia kerja dengan semangat inovasi dan profesionalisme.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#tentang"
          class="bg-white text-blue-700 font-semibold px-8 py-3 rounded-full shadow-md hover:shadow-lg hover:scale-105 transition">
          Jelajahi Sekolah Kami
        </a>
        <a href="#visi"
          class="border border-white text-white px-8 py-3 rounded-full hover:bg-white/10 hover:scale-105 transition">
          Lihat Visi & Misi
        </a>
      </div>
    </div>

    <!-- Decorative gradient blur -->
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/20 blur-3xl rounded-full"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-cyan-400/20 blur-3xl rounded-full"></div>
  </section>

  <!-- 🧩 TENTANG SEKOLAH -->
  <section id="tentang" class="container mx-auto px-6 py-24 max-w-6xl">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <img 
        src="https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=900&q=80"
        alt="Kegiatan Siswa"
        class="rounded-3xl shadow-xl hover:shadow-2xl hover:scale-[1.03] transition-transform duration-500"
      >
      <div>
        <h2 class="text-4xl font-bold text-blue-700 mb-4">Tentang Kami</h2>
        <p class="text-zinc-700 text-lg leading-relaxed mb-6">
          <span class="font-semibold text-blue-600">SMK Negeri 4 Kuningan</span> adalah lembaga pendidikan kejuruan unggulan 
          yang berfokus pada pengembangan keterampilan teknologi dan karakter. Kami menghadirkan pembelajaran inovatif
          berbasis proyek dan praktik industri nyata.
        </p>
        <ul class="space-y-3 text-zinc-700 text-lg">
          <li>📘 Fasilitas modern dan lingkungan belajar kreatif</li>
          <li>💡 Pembelajaran kolaboratif berbasis industri</li>
          <li>🌱 Program pengembangan karakter dan soft skill</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 👨‍🏫 KEPALA SEKOLAH -->
  <section class="bg-gradient-to-br from-blue-50 to-white py-24">
    <div class="container mx-auto max-w-6xl px-6 grid md:grid-cols-2 gap-12 items-center">
      <div class="order-2 md:order-1">
        <h2 class="text-4xl font-bold text-blue-700 mb-2">Kepala Sekolah</h2>
        <h3 class="text-2xl font-semibold text-zinc-900 mb-4">Yayan Supyan, M.Pd.I</h3>
        <p class="text-zinc-700 text-lg leading-relaxed">
          Di bawah kepemimpinan beliau, SMK Negeri 4 Kuningan terus berkembang menjadi sekolah berstandar industri, 
          menanamkan nilai <span class="font-semibold text-blue-600">integritas, profesionalisme, dan kolaborasi</span> dalam setiap kegiatan belajar.
        </p>
      </div>
      <div class="relative order-1 md:order-2 flex justify-center">
        <img 
          src="{{ asset('img/kepsek.png') }}"
          alt="Kepala Sekolah"
          class="rounded-full shadow-2xl object-cover w-72 h-72 md:w-96 md:h-96 border-4 border-white"
        >
        <div class="absolute -bottom-10 -right-10 w-44 h-44 bg-blue-400/30 rounded-full blur-3xl"></div>
      </div>
    </div>
  </section>

  <!-- 💎 NILAI & KEUNGGULAN -->
  <section class="py-24 bg-white">
    <div class="container mx-auto max-w-6xl px-6 text-center">
      <h2 class="text-4xl font-bold text-blue-700 mb-16">Nilai Utama Kami</h2>
      <div class="grid md:grid-cols-3 gap-10">
        <div class="p-8 border border-blue-100 rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">
          <h3 class="text-2xl font-semibold mb-3 text-blue-700">Profesional</h3>
          <p class="text-zinc-700">Kami membentuk siswa yang disiplin, bertanggung jawab, dan mampu bekerja dengan etika tinggi.</p>
        </div>
        <div class="p-8 border border-blue-100 rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">
          <h3 class="text-2xl font-semibold mb-3 text-blue-700">Inovatif</h3>
          <p class="text-zinc-700">Kreativitas menjadi kunci, dengan dukungan teknologi untuk menciptakan solusi nyata bagi masyarakat.</p>
        </div>
        <div class="p-8 border border-blue-100 rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition">
          <h3 class="text-2xl font-semibold mb-3 text-blue-700">Kolaboratif</h3>
          <p class="text-zinc-700">Kami menjalin kemitraan erat dengan dunia industri untuk mendukung pengalaman belajar praktis.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 🎯 VISI, MISI & TUJUAN -->
  <section id="visi" class="container mx-auto px-6 py-24 max-w-6xl">
    <h2 class="text-4xl font-extrabold text-center mb-16 text-blue-700">Visi, Misi & Tujuan</h2>
    <div class="grid md:grid-cols-3 gap-10">
      <div class="bg-white border border-blue-100 rounded-2xl p-8 shadow-sm hover:shadow-md transition">
        <h3 class="text-2xl font-bold text-blue-700 mb-3">Visi</h3>
        <p class="text-zinc-700 leading-relaxed">
          Menjadi SMK unggulan dan berdaya saing global yang menghasilkan lulusan profesional, berkarakter, dan adaptif terhadap teknologi.
        </p>
      </div>
      <div class="bg-white border border-blue-100 rounded-2xl p-8 shadow-sm hover:shadow-md transition">
        <h3 class="text-2xl font-bold text-blue-700 mb-3">Misi</h3>
        <ul class="list-disc pl-5 space-y-2 text-zinc-700 leading-relaxed">
          <li>Mengembangkan pembelajaran berbasis teknologi digital.</li>
          <li>Menanamkan nilai spiritual dan etika kerja.</li>
          <li>Menjalin kemitraan strategis dengan dunia industri.</li>
          <li>Meningkatkan kualitas guru dan tenaga pendidik.</li>
        </ul>
      </div>
      <div class="bg-white border border-blue-100 rounded-2xl p-8 shadow-sm hover:shadow-md transition">
        <h3 class="text-2xl font-bold text-blue-700 mb-3">Tujuan</h3>
        <ul class="list-decimal pl-5 space-y-2 text-zinc-700 leading-relaxed">
          <li>Menghasilkan lulusan berkompetensi tinggi di bidang keahlian.</li>
          <li>Menumbuhkan karakter wirausaha dan semangat inovasi.</li>
          <li>Mewujudkan lingkungan belajar yang hijau dan inklusif.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- 👨‍🏫 STAF PENGAJAR -->
    <section class="py-24 bg-gradient-to-b from-white via-blue-50/60 to-blue-100/40">
        <div class="container mx-auto max-w-6xl px-6 text-center">
            <h2 class="text-4xl font-extrabold text-blue-700 mb-4 tracking-tight">
            Staf Pengajar
            </h2>
            <p class="text-zinc-600 max-w-2xl mx-auto mb-16 text-lg leading-relaxed">
            Tim pengajar SMK Negeri 4 Kuningan terdiri dari pendidik profesional yang berdedikasi 
            membimbing siswa menuju kesuksesan akademik dan keterampilan dunia kerja.
            </p>

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-8">
            <!-- Kartu Guru -->
            <!-- Gunakan gaya seragam agar bersih -->
            <!-- Setiap kartu memiliki bayangan lembut dan efek hover halus -->
            
            <!-- 1 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/men/11.jpg" alt="Budi Santoso"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Budi Santoso, S.T.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Teknik Komputer & Jaringan</p>
                </div>
            </div>

            <!-- 2 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Siti Rahmawati"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Siti Rahmawati, M.Pd.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Bahasa Inggris</p>
                </div>
            </div>

            <!-- 3 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/men/13.jpg" alt="Andi Firmansyah"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Andi Firmansyah, S.Kom.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Rekayasa Perangkat Lunak</p>
                </div>
            </div>

            <!-- 4 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="Dewi Lestari"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Dewi Lestari, S.Pd.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Akuntansi</p>
                </div>
            </div>

            <!-- 5 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/men/15.jpg" alt="Heri Prasetyo"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Heri Prasetyo, M.T.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Elektronika Industri</p>
                </div>
            </div>

            <!-- 6 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/women/16.jpg" alt="Nur Aisyah"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Nur Aisyah, S.Pd.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Bahasa Indonesia</p>
                </div>
            </div>

            <!-- 7 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/men/17.jpg" alt="Rudi Hartono"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Rudi Hartono, S.Pd.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Matematika</p>
                </div>
            </div>

            <!-- 8 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/women/18.jpg" alt="Mega Aprilianti"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Mega Aprilianti, M.Pd.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru PPKn</p>
                </div>
            </div>

            <!-- 9 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/men/19.jpg" alt="Ahmad Fauzi"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Ahmad Fauzi, S.Kom.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Desain Grafis</p>
                </div>
            </div>

            <!-- 10 -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <img src="https://randomuser.me/api/portraits/women/20.jpg" alt="Intan Putri"
                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="p-5">
                <h3 class="font-semibold text-blue-700 text-lg">Intan Putri, S.Pd.</h3>
                <p class="text-sm text-zinc-600 mt-1">Guru Kewirausahaan</p>
                </div>
            </div>
            </div>
        </div>
    </section>


  <section id="ekstrakurikuler" class="py-24 bg-gradient-to-b from-blue-50 to-white">
    <div class="container mx-auto max-w-6xl px-6 text-center">
        <h2 class="text-4xl font-bold text-blue-700 mb-4">Ekstrakurikuler</h2>
        <p class="text-zinc-600 max-w-2xl mx-auto mb-12 text-lg">
        SMK Negeri 4 Kuningan menyediakan berbagai kegiatan ekstrakurikuler 
        untuk mengembangkan bakat, minat, serta karakter siswa di luar pembelajaran formal.
        </p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
        <!-- OSIS -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">🏫</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">OSIS</h3>
            <p class="text-zinc-700">Organisasi Siswa Intra Sekolah yang menjadi wadah utama bagi siswa dalam berorganisasi, memimpin, dan berkreasi.</p>
        </div>

        <!-- Pramuka -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">🏕️</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Pramuka</h3>
            <p class="text-zinc-700">Menumbuhkan kedisiplinan, kepemimpinan, dan rasa cinta tanah air melalui kegiatan kepanduan.</p>
        </div>

        <!-- Paskibra -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">🚩</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Paskibra</h3>
            <p class="text-zinc-700">Membentuk karakter tangguh dan disiplin melalui kegiatan baris-berbaris dan pengibaran bendera.</p>
        </div>

        <!-- Rohis -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">☪️</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Irma</h3>
            <p class="text-zinc-700">Meningkatkan keimanan dan akhlak siswa melalui kegiatan keagamaan dan sosial yang inspiratif.</p>
        </div>

        <!-- Marching Band -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">🥁</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Marching Band</h3>
            <p class="text-zinc-700">Meningkatkan kekompakan, ritme, dan semangat melalui pertunjukan musik yang energik.</p>
        </div>

        <!-- Bengkel Seni -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">🎨</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Bengkel Seni</h3>
            <p class="text-zinc-700">Menyalurkan kreativitas siswa dalam bidang seni rupa, tari, dan musik untuk membentuk jiwa ekspresif dan percaya diri.</p>
        </div>

        <!-- Futsal -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">⚽</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Futsal</h3>
            <p class="text-zinc-700">Mengasah keterampilan dan kerjasama tim melalui olahraga futsal yang kompetitif dan menyenangkan.</p>
        </div>

        <!-- Liputan 4 -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">📸</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Liputan 4</h3>
            <p class="text-zinc-700">Meningkatkan kemampuan jurnalistik dan dokumentasi siswa melalui kegiatan liputan dan publikasi sekolah.</p>
        </div>

        <!-- Pencak Silat -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">🥋</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">Pencak Silat</h3>
            <p class="text-zinc-700">Melatih ketangkasan, disiplin, serta menjunjung tinggi sportivitas melalui seni bela diri tradisional.</p>
        </div>

        <!-- PMR -->
        <div class="bg-white border border-blue-100 rounded-2xl shadow-md hover:shadow-lg p-8 transition">
            <div class="text-5xl mb-4">⛑️</div>
            <h3 class="text-2xl font-semibold text-blue-700 mb-2">PMR</h3>
            <p class="text-zinc-700">Palang Merah Remaja berperan aktif dalam kegiatan sosial, kesehatan, dan kemanusiaan di lingkungan sekolah.</p>
        </div>
        </div>
    </div>
    </section>
</div>

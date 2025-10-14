<section class="py-20 bg-gray-50 mt-10">
  <div class="text-center mb-12">
    <h2 class="text-4xl font-bold text-gray-800 mb-3">Kegiatan Jurusan</h2>
    <p class="text-gray-600">Eksplorasi enam jurusan unggulan di sekolah kami.</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-6 lg:px-20">
    @foreach ($jurusans as $jurusan)
      <a href="{{ route('jurusan.detail', $jurusan['slug']) }}" 
         class="group relative h-[90vh] bg-cover bg-center overflow-hidden rounded-xl"
         style="background-image: url('{{ $jurusan['img'] }}');">
         
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent transition-all duration-500 group-hover:from-black/80 group-hover:to-black/40"></div>
        
        <div class="relative z-10 flex flex-col justify-center h-full px-8 md:px-12 text-white">
          <h3 class="text-4xl font-bold mb-3 group-hover:text-blue-400 transition-colors duration-300">
            {{ $jurusan['nama'] }}
          </h3>
          <p class="text-lg max-w-2xl leading-relaxed opacity-90 group-hover:opacity-100 transition-opacity duration-300">
            {{ $jurusan['desc'] }}
          </p>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-0 group-hover:h-1/2 
            bg-gradient-to-t from-black/80 via-black/40 to-transparent 
            transition-all duration-700 ease-out overflow-hidden flex items-end justify-center">
            <div class="opacity-0 translate-y-10 group-hover:opacity-100 group-hover:translate-y-0 
                        transition-all duration-700 ease-out delay-150 mb-10">
              <span class="border border-white/80 backdrop-blur-sm bg-white/10 text-white 
                          text-sm font-semibold px-6 py-2 rounded-full 
                          hover:bg-white hover:text-black shadow-md 
                          transition-all duration-300 hover:scale-105">
                Lihat Detail
              </span>
            </div>
        </div>

      </a>
    @endforeach
  </div>
</section>

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $beritas = [
            [
                'title'     => 'SMKN 4 Kuningan Sabet Juara Nasional Web Design, Bukti Kualitas Pendidikan Berbasis Teknologi',
                'excerpt'   => '“Kemenangan ini adalah hasil kreativitas, ketekunan, dan kerja tim yang solid,” ujar pembimbing tim Web Design usai menerima penghargaan.',
                'content'   => 'Tim Web Design SMKN 4 Kuningan berhasil meraih Juara Nasional dalam ajang Web Design Competition 2025 di Jakarta. Kompetisi tersebut diikuti lebih dari 150 tim dari seluruh Indonesia. Karya tim bertema Eco Digital Living diapresiasi karena desain UI/UX yang modern, responsif, sekaligus inovatif. Kepala sekolah menyampaikan kebanggaannya dan berharap kemenangan ini memotivasi siswa lain untuk mengembangkan diri di bidang teknologi digital.',
                'image_url' => 'img/logo.png',
            ],
            [
                'title'     => 'Atlet Muda Raih Juara Pencak Silat se-Kabupaten Cirebon, Tampilkan Teknik Memukau',
                'excerpt'   => '“Setiap gerakan adalah hasil latihan bertahun-tahun,” ujar sang pelatih bangga.',
                'content'   => 'Seorang atlet muda dari Cirebon menorehkan prestasi membanggakan dengan meraih juara pertama pada Kejuaraan Pencak Silat se-Kabupaten Cirebon. Kompetisi berlangsung ketat dengan peserta dari berbagai perguruan silat. Sang juara berhasil mengalahkan lawan melalui teknik yang cepat, tepat, dan penuh percaya diri. Prestasi ini diharapkan membuka jalan menuju kejuaraan tingkat provinsi dan nasional.',
                'image_url' => null,
            ],
            [
                'title'     => 'Tim Futsal Pelajar Wilayah III Cirebon Berjaya, Taklukkan Lawan di Final Dramatis',
                'excerpt'   => '“Kami bermain dengan hati dan persatuan,” kata kapten tim.',
                'content'   => 'Tim futsal pelajar dari Cirebon sukses meraih gelar juara setelah pertandingan final yang berlangsung sengit. Pertandingan berakhir dengan skor 3–2. Strategi serangan balik cepat dan pertahanan kuat menjadi kunci kemenangan. Pelatih mengapresiasi kerja keras pemain selama persiapan intensif dua bulan terakhir.',
                'image_url' => 'img/futsal.jpg',
            ],
            [
                'title'     => 'Pelajar Indonesia Taklukkan Lomba Robotik Nasional dengan Inovasi Smart Automation',
                'excerpt'   => '“Inovasi inilah yang membedakan proyek mereka dari tim lain,” ujar salah satu juri.',
                'content'   => 'Tim robotik pelajar berhasil menorehkan prestasi tingkat nasional dengan robot Smart Automation ciptaan mereka. Robot tersebut mampu mengeksekusi tugas kompleks secara otomatis, memukau para juri lewat efisiensi dan algoritma cerdas. Kompetisi ini diikuti sekolah-sekolah unggulan dari berbagai kota besar. Kemenangan ini membuka peluang untuk tampil di tingkat internasional.',
                'image_url' => null,
            ],
            [
                'title'     => 'Pelajar Berprestasi Raih Emas pada Olimpiade Matematika Provinsi Jawa Barat',
                'excerpt'   => '“Dia memiliki kemampuan logika yang sangat kuat,” ujar guru pembimbing.',
                'content'   => 'Seorang siswa SMA dari Jawa Barat berhasil meraih medali emas pada Olimpiade Matematika tingkat provinsi. Ia unggul pada kategori aljabar dan geometri. Persiapan intensif selama enam bulan menjadi faktor utama keberhasilannya. Prestasi ini menambah daftar panjang perolehan medali sekolah tersebut di bidang sains.',
                'image_url' => 'img/profil-sekolah-smk.png',
            ],
            [
                'title'     => 'Karya Bertema Lingkungan Antar Pelajar Menang Lomba Poster Nasional',
                'excerpt'   => '“Poster ini kuat secara visual dan emosional,” komentar dewan juri.',
                'content'   => 'Seorang pelajar berhasil meraih juara 1 lomba desain poster nasional dengan karya bertema pelestarian alam. Poster tersebut menggunakan simbol visual yang kuat, warna kontras, dan pesan yang mengena. Kompetisi berlangsung ketat dengan ribuan peserta. Kemenangannya menunjukkan potensi besar dalam bidang seni grafis.',
                'image_url' => null,
            ],
            [
                'title'     => 'Pelajar Kuasai Bahasa Inggris, Jadi Juara Storytelling Tingkat Wilayah III',
                'excerpt'   => '“Kemampuannya menghidupkan karakter begitu luar biasa,” ungkap salah satu juri.',
                'content'   => 'Dalam kompetisi storytelling Bahasa Inggris tingkat wilayah, seorang pelajar berhasil meraih juara berkat kemampuan artikulasi, ekspresi wajah, dan kepercayaan diri yang tinggi. Cerita yang dibawakan mampu memikat audiens dan juri. Kemenangan ini menegaskan kualitas pembinaan bahasa asing di sekolah tersebut.',
                'image_url' => 'img/selamat-datang.jpg',
            ],
            [
                'title'     => 'Foto Dramatis Bertema Urban Life Bawa Pelajar Ini Menjadi Juara Fotografi Provinsi',
                'excerpt'   => '“Komposisi dan timing fotonya sempurna,” puji juri utama.',
                'content'   => 'Seorang pelajar meraih juara pertama dalam lomba fotografi pelajar tingkat provinsi. Karyanya menampilkan suasana kehidupan perkotaan dengan sudut pandang unik. Juri memuji penggunaan cahaya, komposisi, dan cerita visual yang tersampaikan. Karya tersebut rencananya akan dipamerkan di acara fotografi nasional.',
                'image_url' => null,
            ],
            [
                'title'     => 'Tim Cerdas Cermat Sukses Raih Juara Kabupaten Berkat Kerja Tim Solid',
                'excerpt'   => '“Mereka tampil konsisten dari babak awal hingga final.”',
                'content'   => 'Tim cerdas cermat dari sebuah sekolah menengah mampu mempertahankan performa terbaik hingga membawa pulang gelar juara. Kompetisi meliputi materi sejarah, matematika, bahasa, hingga logika umum. Faktor kemenangan mereka adalah kecepatan analisis dan komunikasi tim yang baik. Kemenangan ini membuat sekolah semakin terkenal sebagai pusat akademik unggulan.',
                'image_url' => 'img/kepsek.png',
            ],
            [
                'title'     => 'Penelitian Inovatif Tentang Energi Terbarukan Bawa Pelajar Ini Jadi Juara KIR Nasional',
                'excerpt'   => '“Penelitian ini memberikan solusi nyata terhadap isu energi masa depan,” kata dewan juri.',
                'content'   => 'Seorang pelajar meraih juara nasional dalam Lomba Karya Tulis Ilmiah Remaja berkat penelitiannya tentang pemanfaatan energi terbarukan berbasis limbah organik. Penelitiannya dinilai lengkap, terukur, dan memiliki dampak lingkungan yang signifikan. Karya tersebut rencananya diikutkan ke kompetisi sains internasional.',
                'image_url' => null,
            ],
        ];

        return $this->faker->randomElement($beritas);
    }
}

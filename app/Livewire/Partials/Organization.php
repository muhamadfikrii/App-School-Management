<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Organization extends Component
{
    public $organizations = [];

    public function mount()
    {
        $this->organizations = [
            [
                'name' => 'OSIS',
                'image' => 'img/organization/osis.jpeg',
                'description' => 'Organisasi Siswa Intra Sekolah yang menjadi wadah utama kepemimpinan dan koordinasi seluruh kegiatan siswa di sekolah.',
            ],
            [
                'name' => 'MPK',
                'image' => 'img/organization/mpk.jpeg',
                'description' => 'Majelis Perwakilan Kelas yang berperan sebagai penyalur aspirasi dan pengawas kinerja OSIS secara demokratis dan bertanggung jawab.',
            ],
            [
                'name' => 'Futsal',
                'image' => 'img/organization/futsal.jpeg',
                'description' => 'Mengasah kemampuan fisik, kerja sama tim, dan semangat sportivitas di lapangan hijau.',
            ],
            [
                'name' => 'Pramuka',
                'image' => 'img/organization/pramuka.jpeg',
                'description' => 'Membangun karakter, kemandirian, dan kepemimpinan melalui kegiatan lapangan yang seru dan menantang.',
            ],
            [
                'name' => 'Bengkel Seni',
                'image' => 'img/organization/bengkelSeni.jpg',
                'description' => 'Wadah ekspresi kreatif dalam musik, tari, dan teater untuk menyalurkan bakat seni siswa.',
            ],
            [
                'name' => 'Liputan 4',
                'image' => 'img/organization/liputan.jpg',
                'description' => 'Tim media sekolah yang aktif membuat konten berita, foto, dan video kegiatan sekolah.',
            ],
            [
                'name' => 'Marching Band',
                'image' => 'img/organization/marching.jpg',
                'description' => 'Menyatukan irama dan semangat melalui musik barisan. Simbol disiplin dan kekompakan.',
            ],
            [
                'name' => 'Pencak Silat',
                'image' => 'img/organization/silat.avif',
                'description' => 'Seni bela diri tradisional yang mengajarkan disiplin, ketahanan fisik, dan mental tangguh.',
            ],
            [
                'name' => 'PMR',
                'image' => 'img/organization/pmr.jpeg',
                'description' => 'Palang Merah Remaja yang berperan aktif dalam kegiatan sosial dan pelatihan pertolongan pertama.',
            ],
            [
                'name' => 'IRMA',
                'image' => 'img/organization/irma.jpg',
                'description' => 'Ikatan Remaja Masjid yang menumbuhkan semangat keagamaan dan kegiatan sosial positif.',
            ],
            [
                'name' => 'Voli',
                'image' => 'img/organization/voli.jpeg',
                'description' => 'Mengasah teamwork, refleks cepat, dan semangat kompetitif di lapangan bola voli.',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.partials.organization');
    }
}

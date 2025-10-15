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
                'image' => 'https://images.pexels.com/photos/3184300/pexels-photo-3184300.jpeg',
                'description' => 'Organisasi Siswa Intra Sekolah yang menjadi wadah utama kepemimpinan dan koordinasi seluruh kegiatan siswa di sekolah.',
            ],
            [
                'name' => 'MPK',
                'image' => 'https://images.pexels.com/photos/3184432/pexels-photo-3184432.jpeg',
                'description' => 'Majelis Perwakilan Kelas yang berperan sebagai penyalur aspirasi dan pengawas kinerja OSIS secara demokratis dan bertanggung jawab.',
            ],
            [
                'name' => 'Futsal',
                'image' => 'https://images.pexels.com/photos/7189521/pexels-photo-7189521.jpeg',
                'description' => 'Mengasah kemampuan fisik, kerja sama tim, dan semangat sportivitas di lapangan hijau.',
            ],
            [
                'name' => 'Pramuka',
                'image' => 'https://images.pexels.com/photos/9303986/pexels-photo-9303986.jpeg',
                'description' => 'Membangun karakter, kemandirian, dan kepemimpinan melalui kegiatan lapangan yang seru dan menantang.',
            ],
            [
                'name' => 'Bengkel Seni',
                'image' => 'https://images.pexels.com/photos/4492170/pexels-photo-4492170.jpeg',
                'description' => 'Wadah ekspresi kreatif dalam musik, tari, dan teater untuk menyalurkan bakat seni siswa.',
            ],
            [
                'name' => 'Liputan 4',
                'image' => 'https://images.pexels.com/photos/3182833/pexels-photo-3182833.jpeg',
                'description' => 'Tim media sekolah yang aktif membuat konten berita, foto, dan video kegiatan sekolah.',
            ],
            [
                'name' => 'Marching Band',
                'image' => 'https://images.pexels.com/photos/8941567/pexels-photo-8941567.jpeg',
                'description' => 'Menyatukan irama dan semangat melalui musik barisan. Simbol disiplin dan kekompakan.',
            ],
            [
                'name' => 'Pencak Silat',
                'image' => 'https://images.unsplash.com/photo-1605296867304-46d5465a13f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Seni bela diri tradisional yang mengajarkan disiplin, ketahanan fisik, dan mental tangguh.',
            ],
            [
                'name' => 'PMR',
                'image' => 'https://images.pexels.com/photos/8460157/pexels-photo-8460157.jpeg',
                'description' => 'Palang Merah Remaja yang berperan aktif dalam kegiatan sosial dan pelatihan pertolongan pertama.',
            ],
            [
                'name' => 'IRMA',
                'image' => 'https://images.pexels.com/photos/4652277/pexels-photo-4652277.jpeg',
                'description' => 'Ikatan Remaja Masjid yang menumbuhkan semangat keagamaan dan kegiatan sosial positif.',
            ],
            [
                'name' => 'Voli',
                'image' => 'https://images.pexels.com/photos/6203511/pexels-photo-6203511.jpeg',
                'description' => 'Mengasah teamwork, refleks cepat, dan semangat kompetitif di lapangan bola voli.',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.partials.organization');
    }
}

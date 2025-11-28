<?php

namespace App\Livewire\Partials;

use Livewire\Component;

use function view;

class ProgramDetail extends Component
{
    public $slug;

    public $program;

    public function mount($slug)
    {
        $this->slug = $slug;

        $programs = [
            'pplg' => [
                'name'        => 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
                'description' => 'Jurusan PPLG berfokus pada pembelajaran analisis, desain, implementasi, dan pengujian perangkat lunak serta pengembangan gim interaktif. Siswa dilatih menjadi programmer dan game developer yang kreatif, inovatif, serta mampu bersaing di dunia industri digital.',
                'skills'      => [
                    'Pemrograman Web (HTML, CSS, JavaScript, PHP, Laravel)',
                    'Pemrograman Mobile (Android, Flutter)',
                    'Desain UI/UX Modern',
                    'Manajemen Proyek Perangkat Lunak (Scrum, Agile)',
                    'Pembuatan Gim 2D dan 3D menggunakan Unity',
                ],
                'careers' => [
                    'Web Developer',
                    'Mobile App Developer',
                    'Game Developer',
                    'Software Engineer',
                    'UI/UX Designer',
                ],
                'image' => 'img/ProgramDetail/pplgDetail.jpeg',
            ],

            'akl' => [
                'name'        => 'Akuntansi dan Keuangan Lembaga (AKL)',
                'description' => 'Jurusan AKL mempersiapkan siswa dalam bidang akuntansi, keuangan, dan administrasi bisnis. Lulusan mampu mengelola laporan keuangan, analisis bisnis, serta memiliki kompetensi digital accounting.',
                'skills'      => [
                    'Penyusunan Laporan Keuangan',
                    'Perpajakan dan Akuntansi Pajak',
                    'Audit Internal dan Eksternal',
                    'Manajemen Keuangan dan Investasi',
                    'Penggunaan Software Akuntansi (MYOB, Accurate)',
                ],
                'careers' => [
                    'Akuntan',
                    'Staf Keuangan / Kasir',
                    'Auditor',
                    'Analis Keuangan',
                    'Pegawai Bank',
                ],
                'image' => 'img/ProgramDetail/aklDetail.jpeg',
            ],

            'mplb' => [
                'name'        => 'Manajemen Perkantoran dan Layanan Bisnis (MPLB)',
                'description' => 'Jurusan MPLB membekali siswa dalam bidang administrasi perkantoran modern, layanan bisnis, dan teknologi informasi untuk mendukung kegiatan manajerial dan pelayanan administrasi.',
                'skills'      => [
                    'Administrasi Perkantoran Digital',
                    'Komunikasi Bisnis dan Layanan Pelanggan',
                    'Pengarsipan dan Dokumentasi Elektronik',
                    'Public Relations (PR) dan Tata Kelola Rapat',
                    'Penggunaan Aplikasi Perkantoran (Microsoft Office, Google Workspace)',
                ],
                'careers' => [
                    'Sekretaris / Asisten Manajer',
                    'Staf Administrasi',
                    'Customer Service Officer',
                    'Public Relations Staff',
                    'Business Support Officer',
                ],
                'image' => 'img/ProgramDetail/mplbDetail.jpg',
            ],

            'tkl' => [
                'name'        => 'Teknik Ketenagalistrikan (TKL)',
                'description' => 'Jurusan TKL berfokus pada pembelajaran sistem tenaga listrik, instalasi, perawatan, dan pengendalian motor listrik. Lulusan siap bekerja di industri listrik dan energi terbarukan.',
                'skills'      => [
                    'Instalasi dan Pemeliharaan Listrik Rumah Tangga dan Industri',
                    'Pengoperasian Mesin dan Motor Listrik',
                    'Sistem Kontrol Otomatis dan PLC',
                    'Analisis Sistem Tenaga dan Distribusi',
                    'Keselamatan dan Kesehatan Kerja (K3) Listrik',
                ],
                'careers' => [
                    'Teknisi Listrik',
                    'Electrical Engineer',
                    'Maintenance Engineer',
                    'Quality Control Listrik',
                    'Operator PLTA/PLN',
                ],
                'image' => 'img/ProgramDetail/tklDetail.jpeg',
            ],

            'tkro' => [
                'name'        => 'Teknik Kendaraan Ringan Otomotif (TKRO)',
                'description' => 'Jurusan TKRO berfokus pada pembelajaran sistem kendaraan bermotor, perawatan mesin, dan teknologi otomotif modern. Siswa dilatih untuk menjadi mekanik yang profesional dan paham sistem kendaraan terkini.',
                'skills'      => [
                    'Perawatan dan Perbaikan Mesin Kendaraan',
                    'Sistem Kelistrikan Otomotif',
                    'Sistem Rem, Suspensi, dan Kemudi',
                    'Diagnosa dan Analisis Kerusakan Kendaraan',
                    'Teknologi Otomotif Injeksi dan Hybrid',
                ],
                'careers' => [
                    'Teknisi Otomotif',
                    'Mekanik Mobil',
                    'Service Advisor',
                    'Quality Control Otomotif',
                    'Wirausahawan Bengkel',
                ],
                'image' => 'img/ProgramDetail/tkroDetail.jpg',
            ],

            'tbsm' => [
                'name'        => 'Teknik dan Bisnis Sepeda Motor (TBSM)',
                'description' => 'Jurusan TBSM menyiapkan peserta didik untuk memahami sistem sepeda motor, perawatan, perbaikan, serta manajemen bengkel. Lulusan memiliki kemampuan teknis dan jiwa wirausaha di bidang otomotif roda dua.',
                'skills'      => [
                    'Perawatan dan Perbaikan Sepeda Motor',
                    'Sistem Kelistrikan Sepeda Motor',
                    'Injeksi dan EFI (Electronic Fuel Injection)',
                    'Manajemen Bengkel dan Pelayanan Pelanggan',
                    'Teknologi Sepeda Motor Listrik',
                ],
                'careers' => [
                    'Mekanik Sepeda Motor',
                    'Teknisi Diagnosa EFI',
                    'Service Advisor',
                    'Wirausaha Bengkel Motor',
                    'Instruktur Pelatihan Otomotif',
                ],
                'image' => 'img/ProgramDetail/tbsmDetail.jpg',
            ],
        ];

        $this->program = $programs[$slug] ?? [
            'name'        => 'Jurusan Tidak Ditemukan',
            'description' => 'Data jurusan tidak tersedia.',
            'skills'      => [],
            'careers'     => [],
            'image'       => 'https://source.unsplash.com/1600x900/?education',
        ];
    }

    public function render()
    {
        return view('livewire.partials.program-detail');
    }
}

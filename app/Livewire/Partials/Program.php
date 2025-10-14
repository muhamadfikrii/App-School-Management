<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Program extends Component
{

    public $jurusans = [];

    public function mount()
    {
        $this->jurusans = [
            [
                'nama' => 'PPLG',
                'slug' => 'pplg',
                'img' => 'https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg',
                'desc' => 'Fokus pada pengembangan perangkat lunak dan gim interaktif dengan kompetensi dalam pemrograman, desain UI/UX, serta teknologi digital modern.',
            ],
            [
                'nama' => 'MPLB',
                'slug' => 'mplb',
                'img' => 'https://images.pexels.com/photos/1181396/pexels-photo-1181396.jpeg',
                'desc' => 'Membekali peserta didik dengan keterampilan administrasi perkantoran digital, layanan bisnis, dan komunikasi profesional di dunia kerja modern.',
            ],
            [
                'nama' => 'AKL',
                'slug' => 'akl',
                'img'  => 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg',
                'desc' => 'Menyiapkan tenaga profesional di bidang akuntansi dan keuangan dengan kemampuan mengelola laporan keuangan serta sistem keuangan digital.',
            ],
            [
                'nama' => 'TKL',
                'slug' => 'tkl',
                'img'  => 'https://images.pexels.com/photos/33962540/pexels-photo-33962540.jpeg?_gl=1*jm2kq4*_ga*MTQ1NzI2MjA0Ny4xNzYwNDI0MTQx*_ga_8JE65Q40S6*czE3NjA0MzcyNDIkbzMkZzEkdDE3NjA0Mzc1OTEkajYwJGwwJGgw',
                'desc' => 'Mengembangkan kompetensi dalam sistem tenaga listrik, instalasi, dan perawatan kelistrikan industri serta teknologi energi terbarukan.',
            ],
            [
                'nama' => 'TKRO',
                'slug' => 'tkro',
                'img'  => 'https://images.pexels.com/photos/4489732/pexels-photo-4489732.jpeg',
                'desc' => 'Berfokus pada teknologi kendaraan bermotor, sistem kelistrikan, dan perawatan mesin dengan standar otomotif modern.',
            ],
            [
                'nama' => 'TBSM',
                'slug' => 'tbsm',
                'img'  => 'https://images.pexels.com/photos/1108101/pexels-photo-1108101.jpeg',
                'desc' => 'Mempersiapkan peserta didik menjadi ahli di bidang perawatan dan perbaikan sepeda motor dengan kemampuan teknis serta kewirausahaan.',
            ],
        ];
    }
    public function render()
    {
        return view('livewire.partials.program');
    }
}

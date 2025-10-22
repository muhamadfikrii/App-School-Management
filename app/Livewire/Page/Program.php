<?php

namespace App\Livewire\Page;

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
                'img' => 'img/Program/pplg.jpeg',
                'desc' => 'Fokus pada pengembangan perangkat lunak dan gim interaktif dengan kompetensi dalam pemrograman, desain UI/UX, serta teknologi digital modern.',
            ],
            [
                'nama' => 'MPLB',
                'slug' => 'mplb',
                'img' => 'img/Program/mplb.jpeg',
                'desc' => 'Membekali peserta didik dengan keterampilan administrasi perkantoran digital, layanan bisnis, dan komunikasi profesional di dunia kerja modern.',
            ],
            [
                'nama' => 'AKL',
                'slug' => 'akl',
                'img' => 'img/Program/akl.jpeg',
                'desc' => 'Menyiapkan tenaga profesional di bidang akuntansi dan keuangan dengan kemampuan mengelola laporan keuangan serta sistem keuangan digital.',
            ],
            [
                'nama' => 'TKL',
                'slug' => 'tkl',
                'img' => 'img/Program/tkl.jpeg',
                'desc' => 'Mengembangkan kompetensi dalam sistem tenaga listrik, instalasi, dan perawatan kelistrikan industri serta teknologi energi terbarukan.',
            ],
            [
                'nama' => 'TKRO',
                'slug' => 'tkro',
                'img' => 'img/Program/tkro.jpeg',
                'desc' => 'Berfokus pada teknologi kendaraan bermotor, sistem kelistrikan, dan perawatan mesin dengan standar otomotif modern.',
            ],
            [
                'nama' => 'TBSM',
                'slug' => 'tbsm',
                'img' => 'img/Program/tbsm.jpeg',
                'desc' => 'Mempersiapkan peserta didik menjadi ahli di bidang perawatan dan perbaikan sepeda motor dengan kemampuan teknis serta kewirausahaan.',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.Page.program');
    }
}

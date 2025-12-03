<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Student;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'title' => 'Juara 1 — Lomba Web Design IT Fest 2023 (Wilayah 3 Cirebon)',
                'description' => 'Siswa PPLG berhasil meraih Juara 1 dalam Lomba Web Design IT Fest 2023 tingkat Wilayah 3 Cirebon.',
                'level' => 'Wilayah',
                'date' => '2023-06-20',
            ],
            [
                'title' => 'Juara Bina 3 — LKBB Aresta 19 (Paskibra)',
                'description' => 'Tim Paskibra Gardapati meraih Juara Bina 3 pada LKBB Aresta 19.',
                'level' => 'Kabupaten',
                'date' => '2023-09-10',
            ],
            [
                'title' => 'Juara 1 — Pencak Silat Putri O2SN Kabupaten Kuningan 2024',
                'description' => 'Siswa berhasil meraih Juara 1 Pencak Silat Putri dalam ajang O2SN Kabupaten Kuningan.',
                'level' => 'Kabupaten',
                'date' => '2024-03-12',
            ],
            [
                'title' => 'Juara 3 — Atletik Putri O2SN Kabupaten Kuningan 2024',
                'description' => 'Siswa meraih Juara 3 cabang Atletik Putri pada O2SN Kabupaten.',
                'level' => 'Kabupaten',
                'date' => '2024-03-12',
            ],
            [
                'title' => 'Juara 3 — Bulutangkis Putra O2SN Kabupaten Kuningan 2024',
                'description' => 'Siswa berhasil meraih Juara 3 Bulutangkis Putra dalam O2SN Kabupaten.',
                'level' => 'Kabupaten',
                'date' => '2024-03-12',
            ],
            [
                'title' => 'Juara 3 — LKS IT Software Solution For Business Provinsi Jawa Barat 2019',
                'description' => 'Siswa RPL meraih Juara 3 pada LKS IT Software Solution For Business tingkat Provinsi.',
                'level' => 'Provinsi',
                'date' => '2019-07-15',
            ],
            [
                'title' => 'Juara 1 — LKS IT Software Solution For Business Kabupaten Kuningan 2019',
                'description' => 'Juara 1 LKS IT Software Solution For Business tingkat Kabupaten Kuningan.',
                'level' => 'Kabupaten',
                'date' => '2019-03-10',
            ],
            [
                'title' => 'Juara 3 — LKS IT Software Solution For Business Kabupaten Kuningan 2019',
                'description' => 'Siswa RPL meraih Juara 3 dalam LKS tingkat Kabupaten.',
                'level' => 'Kabupaten',
                'date' => '2019-03-10',
            ],
            [
                'title' => 'Juara 1 — LKS IT Software Solution For Business Provinsi Jawa Barat 2018',
                'description' => 'Prestasi gemilang meraih Juara 1 LKS tingkat Provinsi Jawa Barat.',
                'level' => 'Provinsi',
                'date' => '2018-07-20',
            ],
            [
                'title' => 'Juara 1 — LKS IT Software Solution For Business Kabupaten Kuningan 2018',
                'description' => 'Juara 1 LKS IT Software Solution For Business tingkat Kabupaten.',
                'level' => 'Kabupaten',
                'date' => '2018-03-12',
            ],
        ];

        foreach ($achievements as $data) {
            Achievement::create($data);
        }
    }
}

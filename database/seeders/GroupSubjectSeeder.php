<?php

namespace Database\Seeders;

use App\Models\GroupSubject;
use Illuminate\Database\Seeder;

class GroupSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'Kelompok A', 'description' => 'Kelompok A mata pelajaran (Wajib Nasional)'],
            ['name' => 'Kelompok B', 'description' => 'Kelompok B mata pelajaran (Wajib Kewilayahan)'],
            ['name' => 'Kejuruan', 'description' => 'Kelompok mata pelajaran produktif sesuai jurusan'],
        ];

        foreach ($groups as $group) {
            GroupSubject::create($group);
        }
    }
}

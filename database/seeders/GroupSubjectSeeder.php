<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GroupSubject;

class GroupSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'Normatif', 'description' => 'Kelompok mata pelajaran normatif (umum)'],
            ['name' => 'Adaptif', 'description' => 'Kelompok mata pelajaran adaptif (penunjang jurusan)'],
            ['name' => 'Produktif (Kompetensi kejuruan)', 'description' => 'Kelompok mata pelajaran produktif sesuai jurusan'],
        ];

        foreach ($groups as $group) {
            GroupSubject::create($group);
        }
    }
}

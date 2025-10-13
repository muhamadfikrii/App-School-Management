<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\GroupSubject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = Teacher::all();

        // Ambil id dari tiap kategori kelompok
        $kelompokA = GroupSubject::where('name', 'Kelompok A')->first()?->id;
        $kelompokB = GroupSubject::where('name', 'Kelompok B')->first()?->id;
        $kejuruan  = GroupSubject::where('name', 'Kejuruan')->first()?->id;

        $subjects = [
            ['name' => 'Pendidikan Agama', 'code' => 'AGM01', 'group' => $kelompokA],
            ['name' => 'Bahasa Indonesia', 'code' => 'BID01', 'group' => $kelompokA],
            ['name' => 'Matematika', 'code' => 'MAT01', 'group' => $kelompokA],
            ['name' => 'Bahasa Inggris', 'code' => 'BING01', 'group' => $kelompokA],
            ['name' => 'Sejarah', 'code' => 'SEJ01', 'group' => $kelompokA],

            ['name' => 'Seni Budaya', 'code' => 'SEN01', 'group' => $kelompokB],
            ['name' => 'Pendidikan Jasmani', 'code' => 'PJOK01', 'group' => $kelompokB],
            ['name' => 'Prakarya', 'code' => 'PRA01', 'group' => $kelompokB],

            ['name' => 'Komputer dan Jaringan Dasar', 'code' => 'KJD01', 'group' => $kejuruan],
            ['name' => 'Pemrograman Dasar', 'code' => 'PRO01', 'group' => $kejuruan],
            ['name' => 'Basis Data', 'code' => 'DB01', 'group' => $kejuruan],
            ['name' => 'Administrasi Perkantoran', 'code' => 'ADM01', 'group' => $kejuruan],
            ['name' => 'Akuntansi', 'code' => 'AKT01', 'group' => $kejuruan],
            ['name' => 'Fisika', 'code' => 'FIS01', 'group' => $kejuruan],
            ['name' => 'Kimia', 'code' => 'KIM01', 'group' => $kejuruan],
            ['name' => 'Biologi', 'code' => 'BIO01', 'group' => $kejuruan],
        ];

        foreach ($subjects as $subject) {
            $subjectModel = Subject::factory()->create([
                'name' => $subject['name'],
                'code' => $subject['code'],
                'group_subject_id' => $subject['group'],
                'kkm' => fake()->randomElement([65, 70, 75]),
            ]);

            $subjectModel->teachers()->attach($teachers->random()->id);
        }
    }
}

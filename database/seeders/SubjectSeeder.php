<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\GroupSubject;
use Filament\Schemas\Components\Group;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = Teacher::all();

        $group = GroupSubject::all();

        $subjects = [
            ['name' => 'Matematika', 'code' => 'MAT01'],
            ['name' => 'Bahasa Indonesia', 'code' => 'BID01'],
            ['name' => 'Bahasa Inggris', 'code' => 'BING01'],
            ['name' => 'Fisika', 'code' => 'FIS01'],
            ['name' => 'Kimia', 'code' => 'KIM01'],
            ['name' => 'Biologi', 'code' => 'BIO01'],
            ['name' => 'Sejarah', 'code' => 'SEJ01'],
            ['name' => 'Seni Budaya', 'code' => 'SEN01'],
            ['name' => 'Pendidikan Jasmani', 'code' => 'PJOK01'],
            ['name' => 'Prakarya', 'code' => 'PRA01'],
            ['name' => 'Pendidikan Agama', 'code' => 'AGM01'],
            ['name' => 'Komputer dan Jaringan Dasar', 'code' => 'KJD01'],
            ['name' => 'Pemrograman Dasar', 'code' => 'PRO01'],
            ['name' => 'Basis Data', 'code' => 'DB01'],
            ['name' => 'Administrasi Perkantoran', 'code' => 'ADM01'],
            ['name' => 'Akuntansi', 'code' => 'AKT01'],
        ];

        foreach ($subjects as $subject) {
             $subjectModel = Subject::factory()->create([
                'name'       => $subject['name'],
                'code'       => $subject['code'],
                'group_subject_id' => $group->random()?->id,
                'kkm'              => fake()->randomElement([65, 70, 75, 80]),
            ]);

            $subjectModel->teachers()->attach($teachers->random()->id);
        }
    }
}

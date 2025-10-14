<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Grade;
use App\Models\GradeComponent;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $subjects = Subject::all();
        $academicYear = AcademicYear::first() ?? AcademicYear::factory(500)->create();

        $uts = GradeComponent::firstOrCreate(['name' => 'UTS'], ['weight' => 25]);
        $uas = GradeComponent::firstOrCreate(['name' => 'UAS'], ['weight' => 25]);
        $tugas = GradeComponent::firstOrCreate(['name' => 'Tugas'], ['weight' => 15]);
        $kuis = GradeComponent::firstOrCreate(['name' => 'Harian'], ['weight' => 15]);
        $praktikum = GradeComponent::firstOrCreate(['name' => 'Praktikum'], ['weight' => 20]);

        foreach ($students as $student) {
            foreach ($subjects as $subject) {
                // --- 1x nilai UTS ---
                Grade::create([
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'class_rombel_id' => $student->class_rombel_id,
                    'semester' => fake()->randomElement(['Ganjil', 'Genap']),
                    'score' => fake()->numberBetween(50, 100),
                    'academic_year_id' => $academicYear->id,
                    'teacher_id' => $subject->teachers()->inRandomOrder()->first()?->id,
                    'grade_component_id' => $uts->id,
                    'description' => 'Nilai UTS',
                ]);

                // --- 1x nilai UAS ---
                Grade::create([
                    'student_id' => $student->id,
                    'subject_id' => $subject->id,
                    'class_rombel_id' => $student->class_rombel_id,
                    'semester' => fake()->randomElement(['Ganjil', 'Genap']),
                    'score' => fake()->numberBetween(50, 100),
                    'academic_year_id' => $academicYear->id,
                    'teacher_id' => $subject->teachers()->inRandomOrder()->first()?->id,
                    'grade_component_id' => $uas->id,
                    'description' => 'Nilai UAS',
                ]);

                // --- Banyak nilai Tugas/Harian/Praktikum
                $jumlahTugas = rand(3, 15);
                for ($i = 1; $i <= $jumlahTugas; $i++) {
                    Grade::create([
                        'student_id' => $student->id,
                        'subject_id' => $subject->id,
                        'class_rombel_id' => $student->class_rombel_id,
                        'semester' => fake()->randomElement(['Ganjil', 'Genap']),
                        'score' => fake()->numberBetween(50, 100),
                        'academic_year_id' => $academicYear->id,
                        'teacher_id' => $subject->teachers()->inRandomOrder()->first()?->id,
                        'grade_component_id' => fake()->randomElement([$tugas->id, $kuis->id]),
                        'description' => 'Nilai '.fake()->randomElement(['Tugas', 'Harian', 'Praktikum']),
                    ]);
                }
            }
        }
    }
}

<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Grade;
use App\Models\GradeComponent;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition(): array
    {
        $student = Student::inRandomOrder()->first() ?? Student::factory()->create();
        $classRombel = $student->classRombel ?? $student->classRombel()->create();
        $teacher = $classRombel->teacher ?? $classRombel->teacher()->create();
        $subject = Subject::inRandomOrder()->first() ?? Subject::factory()->create();
        $academicYear = AcademicYear::inRandomOrder()->first() ?? AcademicYear::factory()->create();

        // ambil semua komponen nilai; kalau kosong, buat default ['uts','uas','tugas','kuis']
        $components = GradeComponent::all();
        if ($components->isEmpty()) {
            $components = collect([
                GradeComponent::factory()->create(['name' => 'uts']),
                GradeComponent::factory()->create(['name' => 'uas']),
                GradeComponent::factory()->create(['name' => 'tugas']),
                GradeComponent::factory()->create(['name' => 'kuis']),
            ]);
        }

        $gradeComponent = $components->random();

        if (in_array(strtolower($gradeComponent->name), ['uts', 'uas'])) {
            $exists = Grade::where('student_id', $student->id)
                ->where('subject_id', $subject->id)
                ->where('academic_year_id', $academicYear->id)
                ->where('grade_component_id', $gradeComponent->id)
                ->exists();

            if ($exists) {
                // coba ambil komponen UTS/UAS lain (misal kita dapat UTS tapi UAS belum ada)
                $otherName = strtolower($gradeComponent->name) === 'uts' ? 'uas' : 'uts';
                $other = $components->first(fn ($c) => strtolower($c->name) === $otherName);

                $otherExists = $other
                    ? Grade::where('student_id', $student->id)
                        ->where('subject_id', $subject->id)
                        ->where('academic_year_id', $academicYear->id)
                        ->where('grade_component_id', $other->id)
                        ->exists()
                    : true;

                if ($other && ! $otherExists) {
                    $gradeComponent = $other;
                } else {
                    $fallback = $components->filter(fn ($c) => in_array(strtolower($c->name), ['tugas', 'kuis']));
                    $gradeComponent = $fallback->isNotEmpty() ? $fallback->random() : $components->random();
                }
            }
        }

        return [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'class_rombel_id' => $classRombel->id,
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),
            'score' => $this->faker->numberBetween(50, 100),
            'academic_year_id' => $academicYear->id,
            'teacher_id' => $teacher->id,
            'grade_component_id' => $gradeComponent->id,
            'description' => $this->faker->sentence(3),
        ];
    }
}

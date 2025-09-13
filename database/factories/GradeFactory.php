<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRombel;
use App\Models\AcademicYear;
use App\Models\GradeComponent;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition(): array
    {
        $student = Student::inRandomOrder()->first() ?? Student::factory()->create();
        $subject = Subject::inRandomOrder()->first() ?? Subject::factory()->create();
        $classRombel = ClassRombel::inRandomOrder()->first() ?? ClassRombel::factory()->create();
        $teacher = Teacher::inRandomOrder()->first() ?? Teacher::factory()->create();
        $academicYear = AcademicYear::inRandomOrder()->first() ?? AcademicYear::factory()->create();
        $gradeComponent = GradeComponent::inRandomOrder()->first() ?? GradeComponent::factory()->create();

        return [
            'student_id'         => $student->id,
            'subject_id'         => $subject->id,
            'class_rombel_id'    => $classRombel->id,
            'semester'           => $this->faker->randomElement(['Ganjil', 'Genap']),
            'score'              => $this->faker->numberBetween(50, 100), // nilai 50 - 100
            'academic_year_id'   => $academicYear->id,
            'teacher_id'         => $teacher->id,
            'grade_component_id' => $gradeComponent->id,
            'description'        => $this->faker->sentence(3),
        ];
    }
}

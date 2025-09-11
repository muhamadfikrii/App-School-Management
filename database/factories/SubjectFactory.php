<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition(): array
    {
        $teacher = Teacher::inRandomOrder()->first();

        return [
            'name'       => $this->faker->unique()->word() . ' ' . $this->faker->randomElement(['Matematika', 'Bahasa Inggris', 'Fisika', 'Kimia']),
            'code'       => strtoupper($this->faker->unique()->lexify('SUB???')),
            'teacher_id' => $teacher?->id,
        ];
    }
}

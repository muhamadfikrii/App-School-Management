<?php

namespace Database\Factories;

use App\Models\GroupSubject;
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
            'name' => $this->faker->unique()->word().' '.$this->faker->randomElement(['Matematika', 'Bahasa Inggris', 'Fisika', 'Kimia']),
            'code' => strtoupper($this->faker->unique()->lexify('SUB???')),
            'kkm' => $this->faker->randomElement([65, 70, 75, 80]),
            'group_subject_id' => GroupSubject::inRandomOrder()->first()?->id ?? GroupSubject::factory(),
        ];
    }
}

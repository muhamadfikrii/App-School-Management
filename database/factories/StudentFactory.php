<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\ClassRombel;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        $classRombel = ClassRombel::inRandomOrder()->first() ?? ClassRombel::factory()->create();

        return [
            'nisn'            => $this->faker->unique()->numerify('20########'),
            'full_name'       => $this->faker->name(),
            'date_of_birth'   => $this->faker->date('Y-m-d', '2010-12-31'),
            'gender'          => $this->faker->randomElement(['male', 'female']),
            'address'         => $this->faker->address(),
            'phone'           => $this->faker->phoneNumber(),
            'email'           => $this->faker->unique()->safeEmail(),
            'parent_name'     => $this->faker->name('male' | 'female'),
            'parent_phone'    => $this->faker->phoneNumber(),
            'status'          => $this->faker->randomElement(Status::toArray()),
            'year_enrollment' => $this->faker->year(),
            'class_rombel_id' => $classRombel->id,
        ];
    }
}

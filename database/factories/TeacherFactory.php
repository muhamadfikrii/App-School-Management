<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Teacher;
use App\Enums\TeacherStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'nip'           => $this->faker->unique()->numerify('1980#######'),
            'full_name'          => $this->faker->name(),
            'phone'         => $this->faker->phoneNumber(),
            'gender'        => $this->faker->randomElement(['male', 'female']),
            'date_of_birth' => $this->faker->date(),
            'status'        => $this->faker->randomElement(TeacherStatus::cases())->value,
            'address'       => $this->faker->address(),
            'user_id'       => User::factory()->asTeacher(),
        ];
    }
}

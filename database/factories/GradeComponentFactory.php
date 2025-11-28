<?php

namespace Database\Factories;

use App\Models\GradeComponent;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeComponentFactory extends Factory
{
    protected $model = GradeComponent::class;

    public function definition(): array
    {
        $names = ['Harian', 'UTS', 'UAS', 'Praktikum', 'Tugas'];

        return [
            'name'   => $this->faker->unique()->randomElement($names),
            'weight' => $this->faker->randomFloat(2, 10, 50),
        ];
    }
}

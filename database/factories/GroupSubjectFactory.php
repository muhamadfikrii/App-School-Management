<?php

namespace Database\Factories;

use App\Models\GroupSubject;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupSubjectFactory extends Factory
{
    protected $model = GroupSubject::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Kelompok A',
                'Kelompok B',
                'Kejuruan',
            ]),
            'description' => $this->faker->sentence(),
        ];
    }
}

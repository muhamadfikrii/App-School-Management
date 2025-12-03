<?php

namespace Database\Factories;

use App\Models\Student;

use function collect;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $levels = ['Kabupaten', 'Provinsi', 'Nasional'];

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'level' => 'Kabupaten',
            'date' => $this->faker->date(),
            'student_id' => null,
            'photo' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Student;
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
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(5),
            'level' => $this->faker->randomElement($levels),
            'date' => $this->faker->dateTimeBetween('2020-01-01', 'now'),
            'student_id' => Student::inRandomOrder()->first()->id,
            'photo' => null, // Opsional, bisa diisi dengan faker image
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\TeacherStatus;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::factory()->count(10)->create();

        Teacher::factory()->create([
            'nip'    => '198012345678',
            'full_name'   => 'Guru Tetap',
            'gender' => 'male',
            'status' => fake()->randomElement(TeacherStatus::cases())->value,
        ]);
    }
}

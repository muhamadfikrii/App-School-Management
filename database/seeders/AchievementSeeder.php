<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Student;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(10)->create();
        Achievement::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;
use App\Models\Student;

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

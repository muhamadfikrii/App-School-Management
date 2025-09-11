<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\MajorSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\TeacherSeeder;
use Database\Seeders\ScheduleSeeder;
use Database\Seeders\ClassRombelSeeder;
use Database\Seeders\AcademicYearSeeder;
use Database\Seeders\GradeComponentSeeder;
use Database\Seeders\DefaultTestUsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AcademicYearSeeder::class,
            DefaultTestUsersSeeder::class,
            TeacherSeeder::class,
            MajorSeeder::class,
            LevelSeeder::class,
            ClassRombelSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            ScheduleSeeder::class,
            GradeComponentSeeder::class,
        ]);
    }

}

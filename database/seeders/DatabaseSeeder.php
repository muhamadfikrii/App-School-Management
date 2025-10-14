<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DefaultTestUsersSeeder::class,
            AcademicYearSeeder::class,
            LevelSeeder::class,
            MajorSeeder::class,
            TeacherSeeder::class,
            ClassRombelSeeder::class,
            StudentSeeder::class,
            GroupSubjectSeeder::class,
            SubjectSeeder::class,
            ScheduleSeeder::class,
            GradeComponentSeeder::class,
            RoleSeeder::class,
            AchievementSeeder::class,
            // GradeSeeder::class,
        ]);
    }
}

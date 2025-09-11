<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\ClassRombel;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition(): array
    {
        $classRombel = ClassRombel::inRandomOrder()->first() ?? ClassRombel::factory()->create();
        $subject = Subject::inRandomOrder()->first() ?? Subject::factory()->create();
        $teacher = $subject->teacher_id ? Teacher::find($subject->teacher_id) : Teacher::inRandomOrder()->first();

        $startHour = $this->faker->numberBetween(7, 14);
        $endHour = $startHour + 1;

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        return [
            'day'            => $this->faker->randomElement($days),
            'time_start'     => sprintf('%02d:00', $startHour),
            'time_end'       => sprintf('%02d:00', $endHour),
            'class_rombel_id'=> $classRombel->id,
            'subject_id'     => $subject->id,
            'teacher_id'     => $teacher?->id,
        ];
    }
}

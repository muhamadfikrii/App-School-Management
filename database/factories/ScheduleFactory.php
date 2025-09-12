<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\ClassRombel;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ScheduleSubject;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition(): array
    {
        $classRombel = ClassRombel::inRandomOrder()->first() ?? ClassRombel::factory()->create();

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        return [
            'day'             => $this->faker->randomElement($days),
            'class_rombel_id' => $classRombel->id,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Schedule $schedule) {
            // pilih 1-3 subject random
            $subjects = Subject::inRandomOrder()->take(rand(1, 3))->get();

            foreach ($subjects as $subject) {
                // ambil guru yang mengajar subject ini atau random jika tidak ada
                $teacher = $subject->teacher_id
                    ? Teacher::find($subject->teacher_id)
                    : Teacher::inRandomOrder()->first();

                $startHour = $this->faker->numberBetween(7, 14);
                $endHour   = $startHour + 1;

                ScheduleSubject::create([
                    'schedule_id' => $schedule->id,
                    'subject_id'  => $subject->id,
                    'teacher_id'  => $teacher?->id,
                    'time_start'  => sprintf('%02d:00:00', $startHour),
                    'time_end'    => sprintf('%02d:00:00', $endHour),
                ]);
            }
        });
    }
}

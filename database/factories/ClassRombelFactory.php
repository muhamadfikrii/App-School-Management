<?php

namespace Database\Factories;

use App\Models\ClassRombel;
use App\Models\Level;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassRombelFactory extends Factory
{
    protected $model = ClassRombel::class;

    public function definition(): array
    {
        $level = Level::inRandomOrder()->first() ?? Level::factory()->create();
        $major = Major::inRandomOrder()->first() ?? Major::factory()->create();
        $teacher = Teacher::inRandomOrder()->first();

        $rombelNumber = $this->faker->numberBetween(1, 3);

        return [
            'level_id' => $level->id,
            'major_id' => $major->id,
            'teacher_id' => $teacher?->id,
            'rombel' => $rombelNumber,
            'name' => $level->name.' '.$major->name.' '.$rombelNumber,
        ];
    }
}

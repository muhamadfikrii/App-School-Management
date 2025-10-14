<?php

namespace Database\Seeders;

use App\Models\GradeComponent;
use Illuminate\Database\Seeder;

class GradeComponentSeeder extends Seeder
{
    public function run(): void
    {
        GradeComponent::factory()->create(['name' => 'Harian', 'weight' => 15.00]);
        GradeComponent::factory()->create(['name' => 'UTS', 'weight' => 25.00]);
        GradeComponent::factory()->create(['name' => 'UAS', 'weight' => 25.00]);
        GradeComponent::factory()->create(['name' => 'Tugas', 'weight' => 15.00]);
        GradeComponent::factory()->create(['name' => 'Praktikum', 'weight' => 20.00]);
    }
}

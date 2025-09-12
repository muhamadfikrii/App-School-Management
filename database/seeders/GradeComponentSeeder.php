<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeComponent;

class GradeComponentSeeder extends Seeder
{
    public function run(): void
    {
        GradeComponent::factory()->create(['name' => 'Harian / Kuis', 'weight' => 20.00]);
        GradeComponent::factory()->create(['name' => 'UTS', 'weight' => 30.00]);
        GradeComponent::factory()->create(['name' => 'UAS', 'weight' => 30.00]);
        GradeComponent::factory()->create(['name' => 'Tugas', 'weight' => 10.00]);
        GradeComponent::factory()->create(['name' => 'Praktikum', 'weight' => 10.00]);
    }
}

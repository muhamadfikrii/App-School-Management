<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        // generate 200 data nilai acak
        Grade::factory()->count(200)->create();
    }
}

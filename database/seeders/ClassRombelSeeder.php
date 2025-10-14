<?php

namespace Database\Seeders;

use App\Models\ClassRombel;
use Illuminate\Database\Seeder;

class ClassRombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassRombel::factory()->count(10)->create();
    }
}

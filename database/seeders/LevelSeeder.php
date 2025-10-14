<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::factory()->create(['name' => 'X']);
        Level::factory()->create(['name' => 'XI']);
        Level::factory()->create(['name' => 'XII']);
    }
}

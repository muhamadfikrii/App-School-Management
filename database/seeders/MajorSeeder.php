<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::factory()->create(['name' => 'Teknik Komputer dan Jaringan']);
        Major::factory()->create(['name' => 'Akuntansi']);
        Major::factory()->create(['name' => 'Administrasi Perkantoran']);
    }
}

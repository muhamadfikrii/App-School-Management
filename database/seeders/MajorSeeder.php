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
        Major::factory()->create(['name' => 'Pemrograman Perangkat Lunak & Gim']);
        Major::factory()->create(['name' => 'Akuntansi']);
        Major::factory()->create(['name' => 'Manajemen Perkantoran & Layanan Bisnis']);
        Major::factory()->create(['name' => 'Teknik Kendaraan Ringan Otomotif']);
        Major::factory()->create(['name' => 'Teknik Bisnis Sepeda Motor']);
        Major::factory()->create(['name' => 'Teknik Ketengaan Listrik']);

    }
}

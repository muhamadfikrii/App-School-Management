<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'administrator@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role_name' => UserRole::ADMINISTRATOR,
            ]
        );

        User::updateOrCreate(
            ['email' => 'teacher@smlsr.com'],
            [
                'name' => 'Teacher',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role_name' => UserRole::TEACHER
            ]
        );
    }
}

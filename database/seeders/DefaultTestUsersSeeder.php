<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Database\Seeder;

class DefaultTestUsersSeeder extends Seeder
{
    public function run(): void
    {
        if (! $this->command->getLaravel()->environment('local', 'testing')) {
            return;
        }

        User::firstOrCreate(
            ['email' => 'administrator@smk4kng.local'],
            [
                'name' => 'Test Administrator',
                'password' => bcrypt('password'),
                'role_name' => UserRole::ADMINISTRATOR,
            ]
        );

        User::firstOrCreate(
            ['email' => 'akun-guru@smk4kng.local'],
            [
                'name' => 'Test Guru',
                'password' => bcrypt('password'),
                'role_name' => UserRole::TEACHER,
            ]
        );
    }
}

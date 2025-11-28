<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\TeacherStatus;
use App\Enums\UserRole;
use App\Models\Teacher;
use App\Models\User;

use function bcrypt;
use function fake;

use Illuminate\Database\Seeder;

class DefaultTestUsersSeeder extends Seeder
{
    public function run(): void
    {
        if (!$this->command->getLaravel()->environment('local', 'testing')) {
            return;
        }

        // Admin user
        User::firstOrCreate(
            ['email' => 'administrator@smk4kng.local'],
            [
                'name'      => 'Test Administrator',
                'password'  => bcrypt('password'),
                'role_name' => UserRole::ADMINISTRATOR,
            ]
        );

        // Teacher user
        $user = User::firstOrCreate(
            ['email' => 'akun-guru@smk4kng.local'],
            [
                'name'      => 'Test Guru',
                'password'  => bcrypt('password'),
                'role_name' => UserRole::TEACHER,
            ]
        );

        // Buat teacher record jika belum ada
        Teacher::firstOrCreate(
            ['user_id' => $user->id],
            [
                'full_name'     => $user->name,
                'nip'           => fake()->unique()->numerify('1980#######'),
                'phone'         => fake()->phoneNumber(),
                'gender'        => fake()->randomElement(['laki-laki', 'perempuan']),
                'date_of_birth' => fake()->date(),
                'status'        => fake()->randomElement(TeacherStatus::cases())->value,
                'address'       => fake()->address(),
            ]
        );
    }
}

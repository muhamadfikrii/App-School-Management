<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $kepsek = Role::firstOrCreate(['name' => 'kepala sekolah']);
        $guru = Role::firstOrCreate(['name' => 'guru']);

        // Buat permissions
        $permissions = [
            'manage users',
            'view class rombel',
            'view student',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Assign permissions
        $admin->givePermissionTo(Permission::all());
        $kepsek->givePermissionTo(['view class rombel', 'view student']);
        $guru->givePermissionTo(['view class rombel', 'view student']);
    }
}

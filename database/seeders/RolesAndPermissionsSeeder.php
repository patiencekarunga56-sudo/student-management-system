<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage students',
            'manage courses',
            'manage registrations',
            'manage users',
            'view courses',
            'view assigned courses',
            'register courses',
            'view own registrations',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        Role::firstOrCreate(['name' => 'Administrator', 'guard_name' => 'web'])
            ->syncPermissions([
                'manage students',
                'manage courses',
                'manage registrations',
                'manage users',
                'view courses',
            ]);

        Role::firstOrCreate(['name' => 'Lecturer', 'guard_name' => 'web'])
            ->syncPermissions([
                'view courses',
                'view assigned courses',
            ]);

        Role::firstOrCreate(['name' => 'Student', 'guard_name' => 'web'])
            ->syncPermissions([
                'view courses',
                'register courses',
                'view own registrations',
            ]);
    }
}
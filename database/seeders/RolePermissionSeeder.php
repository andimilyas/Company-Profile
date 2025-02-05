<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage-statistics',
            'manage-products',
            'manage-principles',
            'manage-testimonials',
            'manage-clients',
            'manage-teams',
            'manage-about',
            'manage-appointments',
            'manage-hero_sections',
        ];

        foreach ($permissions as $permission)
        {
            Permission::createOrFirst(
                [
                    'name' => $permission,
                ]
                );
        }

        $managerRole = Role::createOrFirst(['name' => 'manager']);

        $managerPermissions = [
            'manage statistics',
            'manage products',
            'manage principles'
            ];

        $managerRole->syncPermissions($managerPermissions);

        $superAdmin = Role::createOrFirst(['name' => 'super-admin']);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($superAdmin);
    }
}

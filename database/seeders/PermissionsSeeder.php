<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionsSeeder extends Seeder
{

    public function run(): void
    {

        // Define role permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete'
         ];

        // Define backup permissions
        $backupPermissions = [
            'backup.create-new-backup',
            'backup.all-backup',
            'backup.delete-backup',
        ];

        // Merge all permissions
        $allPermissions = array_merge(
            $permissions,
            $backupPermissions
        );

        // Define the guard name
        $guardName = 'admin';

        // Create permissions
        foreach ($allPermissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => $guardName
            ]);
        }

    }

}

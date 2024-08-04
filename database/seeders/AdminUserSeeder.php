<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create admin user
        $user = Admin::create([
            'name' => 'Nazmul',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Create admin role with guard_name 'admin'
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'admin',
        ]);

        // Fetch all permissions with guard_name 'admin'
        $permissions = Permission::where('guard_name', 'admin')->get();
        // Sync permissions with role
        $role->syncPermissions($permissions);
        // Assign role to user
        $user->assignRole($role);

    }
}

<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // رول ادمین
        $admin = Role::firstOrCreate(
            ['name' => 'admin'],
            [
                'title' => 'ادمین',
                'guard_name' => 'web',
            ]
        );
        
        // دادن همه درسترسی ها به ادمین
        $admin->syncPermissions(Permission::all());
        
        Role::firstOrCreate(
            ['name' => 'user'],
            [
                'title' => 'کاربر',
                'guard_name' => 'web',
            ]
        );
        
    }
}

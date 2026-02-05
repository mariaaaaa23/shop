<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // در مدل رول عنوان ادمین رو سرچ میکنه
            // firstOrFail() اگر رکورد نباشه اجرای برنامه همون‌جا متوقف می‌شه خطای واضح می‌ده:
        $adminRole = Role::where('name', 'admin')->firstOrFail();

        //ایجاد یوزر ادمین
        User::create([
             'role_id' => $adminRole->id, // ← فقط id
             'name' => 'admin user',
             'email' => 'nateghmaryam5@gmail.com',
             'password' => Hash::make('12345'),
        ]);

        
        
    }
}

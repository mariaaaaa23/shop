<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'nateghmaryam5@gmail.com'], // ← شرط یکتایی
            [
                'name' => 'admin user',
                'password' => Hash::make('12345'), // ← فقط وقتی ساخته میشه استفاده میشه
            ]
        );

        $user->assignRole('admin');
    }
}
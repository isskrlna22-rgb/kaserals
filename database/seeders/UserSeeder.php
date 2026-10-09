<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin KASERALS',
            'email' => 'admin@kaserals.test',
            'password' => Hash::make('password'),
            'role' => 'ADMIN',
        ]);


        User::create([
            'name' => 'Bendahara Kelas',
            'email' => 'bendahara@kaserals.test',
            'password_hash' => Hash::make('password'),
            'role' => 'BENDAHARA',
        ]);
    }
}

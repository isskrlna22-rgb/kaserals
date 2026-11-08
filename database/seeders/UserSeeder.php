<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'iiskarlina@admin.kaserals.id'],
            [
                'name' => 'Admin KASERALS',
                'password_hash' => Hash::make('password'),
                'role' => 'ADMIN',
            ]
        );

        User::updateOrCreate(
            ['email' => 'bendahara@kaserals.test'],
            [
                'name' => 'Bendahara Kelas',
                'password_hash' => Hash::make('password'),
                'role' => 'BENDAHARA',
            ]
        );
    }
}

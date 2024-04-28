<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'admin',
            'email' => 'admin@farhan.dev',
            'user_type' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@farhan.dev',
            'password' => Hash::make('password'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Krisna',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Rizky',
            'email' => 'purchase@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'Purchasing',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Akbar',
            'email' => 'gudang@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'Gudang',
            'remember_token' => Str::random(10),
        ]);
    }
}

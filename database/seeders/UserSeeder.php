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
        $admin = User::create([
            'name' => 'Rizky Apriansyah',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $purchasing = User::create([
            'name' => 'Krisna Aji Prakoso',
            'email' => 'purchasing@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        $gudang = User::create([
            'name' => 'Akbar',
            'email' => 'gudang@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        // assign Role menggunakan spatie
        $admin->assignRole('Admin');
        $purchasing->assignRole('Purchasing');
        $gudang->assignRole('Gudang');
    }
}

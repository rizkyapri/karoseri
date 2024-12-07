<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_profiles')->insert([
            [
                'app_nama' => 'Karoseri',
                'app_deskripsi' => 'Dashboard yang bisa di gunakan untuk manajemen aplikasi',
                'app_tahun' => 2024,
                'app_pengembang' => 'Team K2 Nexus',
                'app_icon' => 'logoTRB.png',
                'app_logo' => 'logoTRB.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}

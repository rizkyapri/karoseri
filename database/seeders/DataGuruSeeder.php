<?php

namespace Database\Seeders;

use App\Models\DataGuru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataGuru::factory(10)->create();
    }
}

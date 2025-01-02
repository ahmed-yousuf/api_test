<?php

namespace Database\Seeders;

use App\Models\VinLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VinLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VinLog::factory()->count(10000)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvailableHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('available_hours')->insert([
            ['hour_id' => 1, 'start_time' => '08:00:00', 'end_time' => '10:00:00'],
            ['hour_id' => 2, 'start_time' => '10:00:00', 'end_time' => '12:00:00'],
            ['hour_id' => 3, 'start_time' => '14:00:00', 'end_time' => '16:00:00'],
            ['hour_id' => 4, 'start_time' => '16:00:00', 'end_time' => '18:00:00'],
        ]);
    }
}

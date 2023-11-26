<?php

namespace Database\Seeders;

use App\Models\WorkLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1,30) as $value){
            WorkLog::create([
                'user_id' => 1,
                'date' => "2023-11-$value",
                'start_time' => "07:00",
                'end_time' => "03:00",
                'total_time' => 28800,
                'city' => "KOTA MALANG",
            ]);
        }
        foreach(range(1,30) as $value){
            WorkLog::create([
                'user_id' => 1,
                'date' => "2023-10-$value",
                'start_time' => "07:00",
                'end_time' => "03:00",
                'total_time' => 28800,
                'city' => "KOTA Batu",
            ]);
        }
    }
}

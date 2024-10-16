<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            ['name' => 'Saturday', 'start_time' => '10:00:00', 'end_time' => '14:00:00', 'is_active' => true],
            ['name' => 'Sunday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Monday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Tuesday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Wednesday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Thursday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Friday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
        ];

        foreach ($days as $day) {
            Day::create($day);
        }
    }
}

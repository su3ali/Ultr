<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to insert into the shifts table
        $shifts = [
            [
                'day_id' => 1, // Assuming Sunday
                'group_id' => 1, // Assuming Group 1
                'service_id' => 22, // Assuming Service 22
                'shift_no' => 'shift-' . rand(1000, 9999),
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'is_active' => true,
            ],
            [
                'day_id' => 2, // Assuming Monday
                'group_id' => 2, // Assuming Group 2
                'service_id' => 22, // Assuming Service 22
                'shift_no' => 'shift-' . rand(1000, 9999),
                'start_time' => '15:00:00',
                'end_time' => '17:00:00',
                'is_active' => true,
            ],
            [
                'day_id' => 3, // Assuming Tuesday
                'group_id' => 3, // Assuming Group 3
                'service_id' => 22, // Assuming Service 22
                'shift_no' => 'shift-' . rand(1000, 9999),
                'start_time' => '17:00:00',
                'end_time' => '19:00:00',
                'is_active' => true,
            ],
            [
                'day_id' => 4, // Assuming Wednesday
                'group_id' => 28, // Assuming Group 4
                'service_id' => 22, // Assuming Service 22
                'shift_no' => 'shift-' . rand(1000, 9999),
                'start_time' => '19:00:00',
                'end_time' => '21:00:00',
                'is_active' => true,
            ],
            [
                'day_id' => 5, // Assuming Thursday
                'group_id' => 31, // Assuming Group 5
                'service_id' => 22, // Assuming Service 22
                'shift_no' => 'shift-' . rand(1000, 9999),
                'start_time' => '21:00:00',
                'end_time' => '22:00:00',
                'is_active' => true,
            ],
        ];

        // Insert the data into the shifts table
        DB::table('shifts')->insert($shifts);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftsSeeder extends Seeder
{
<<<<<<< HEAD
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
=======
    public function run()
    {
        $shifts = [
            [
                'shift_no' => 'sh-001',
                'service_id' => json_encode([22, 21]), // مثال على إدخال خدمات متعددة
                'group_id' => json_encode([22, 23]), // مثال على إدخال مجموعات متعددة
                'day_id' => json_encode([1, 2, 3]), // مثال على إدخال أيام متعددة
                'start_time' => '09:00:00',
>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
                'end_time' => '17:00:00',
                'is_active' => true,
            ],
            [
<<<<<<< HEAD
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
=======
                'shift_no' => 'sh-002',
                'service_id' => json_encode([22, 21]),
                'group_id' => json_encode([28, 32]),
                'day_id' => json_encode([4, 5]),
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
                'is_active' => true,
            ],
            [
                'shift_no' => 'sh-003',
                'service_id' => json_encode([21, 22]),
                'group_id' => json_encode([28]),
                'day_id' => json_encode([6]),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'is_active' => true,
            ],
            // يمكنك إضافة المزيد من الشيفتات حسب الحاجة
        ];

>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
        DB::table('shifts')->insert($shifts);
    }
}

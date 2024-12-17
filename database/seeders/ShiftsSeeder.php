<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftsSeeder extends Seeder
{
    public function run()
    {
        $shifts = [
            [
                'shift_no' => 'sh-001',
                'service_id' => json_encode([22, 21]), // مثال على إدخال خدمات متعددة
                'group_id' => json_encode([22, 23]), // مثال على إدخال مجموعات متعددة
                'day_id' => json_encode([1, 2, 3]), // مثال على إدخال أيام متعددة
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'is_active' => true,
            ],
            [
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

        DB::table('shifts')->insert($shifts);
    }
}

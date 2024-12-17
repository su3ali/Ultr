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
<<<<<<< HEAD
        $days = [
            ['name' => 'Saturday', 'start_time' => '10:00:00', 'end_time' => '14:00:00', 'is_active' => true],
            ['name' => 'Sunday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Monday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Tuesday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Wednesday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Thursday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
            ['name' => 'Friday', 'start_time' => '09:00:00', 'end_time' => '17:00:00', 'is_active' => true],
=======

        $days = [
            ['name' => 'Saturday', 'name_ar' => 'السبت', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Sunday', 'name_ar' => 'الأحد', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Monday', 'name_ar' => 'الإثنين', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Tuesday', 'name_ar' => 'الثلاثاء', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Wednesday', 'name_ar' => 'الأربعاء', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Thursday', 'name_ar' => 'الخميس', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Friday', 'name_ar' => 'الجمعة', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
>>>>>>> 56de7c2d5ebf6136d8cbbd14ced17475edfe6130
        ];

        foreach ($days as $day) {
            Day::create($day);
        }
    }
}

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
            ['name' => 'Saturday', 'name_ar' => 'السبت', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Sunday', 'name_ar' => 'الأحد', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Monday', 'name_ar' => 'الإثنين', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Tuesday', 'name_ar' => 'الثلاثاء', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Wednesday', 'name_ar' => 'الأربعاء', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Thursday', 'name_ar' => 'الخميس', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
            ['name' => 'Friday', 'name_ar' => 'الجمعة', 'start_time' => '13:00:00', 'end_time' => '22:00:00', 'is_active' => true],
        ];

        foreach ($days as $day) {
            Day::create($day);
        }
    }
}

<?php
namespace Database\Seeders;

use App\Models\BusinessOrderStatus;
use Illuminate\Database\Seeder;

class BusinessOrderStatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name_en' => 'Pending', 'name_ar' => 'قيد الانتظار'],
            ['name_en' => 'In Progress', 'name_ar' => 'تحت الإجراء'],
            ['name_en' => 'Completed', 'name_ar' => 'مكتمل'],
            ['name_en' => 'Canceled', 'name_ar' => 'ملغي'],
        ];

        foreach ($statuses as $status) {
            BusinessOrderStatus::updateOrCreate(
                ['name_en' => $status['name_en']],
                [
                    'name_ar' => $status['name_ar'],
                    'active'  => true,
                ]
            );
        }
    }
}

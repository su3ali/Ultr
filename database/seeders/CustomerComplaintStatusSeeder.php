<?php
namespace Database\Seeders;

use App\Models\CustomerComplaintStatus;
use Illuminate\Database\Seeder;

class CustomerComplaintStatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name_ar' => 'قيد الانتظار', 'name_en' => 'Pending', 'color' => '#FFA500'],
            ['name_ar' => 'جاري المعالجة', 'name_en' => 'In Progress', 'color' => '#007BFF'],
            ['name_ar' => 'تم الحل', 'name_en' => 'Resolved', 'color' => '#28A745'],
            ['name_ar' => 'مغلقة', 'name_en' => 'Closed', 'color' => '#6C757D'],
            ['name_ar' => 'مرفوضة', 'name_en' => 'Rejected', 'color' => '#DC3545'],
            ['name_ar' => 'تم التواصل مع العميل', 'name_en' => 'Contacted Customer', 'color' => '#17A2B8'],
        ];

        foreach ($statuses as $status) {
            CustomerComplaintStatus::updateOrCreate(
                ['name_en' => $status['name_en']],
                $status
            );
        }

        echo "✅ Customer Complaint Statuses Seeded Successfully!\n";
    }
}

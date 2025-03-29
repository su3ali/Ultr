<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['id' => 72, 'name' => 'create_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة المورد', 'name_en' => 'Add new Suppliers'],
            ['id' => 73, 'name' => 'view_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'عرض المورد', 'name_en' => 'View Suppliers'],
            ['id' => 74, 'name' => 'delete_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'حذف المورد', 'name_en' => 'Delete Suppliers'],
            ['id' => 75, 'name' => 'update_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة المورد', 'name_en' => 'Add new Suppliers'],
            ['id' => 76, 'name' => 'update_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'تحديث المورد', 'name_en' => 'Update Suppliers'],
            ['id' => 77, 'name' => 'view_financial_reports', 'guard_name' => 'dashboard', 'name_ar' => 'عرض التقارير المالية', 'name_en' => 'View Financial Reports'],
            ['id' => 78, 'name' => 'view_customer_complaints', 'guard_name' => 'dashboard', 'name_ar' => 'عرض شكاوي العملاء', 'name_en' => 'View Customer Complaints'],
            // Home Page
            ['id' => 79, 'name' => 'view_home_page', 'guard_name' => 'dashboard', 'name_ar' => 'عرض الصفحة الرئيسية', 'name_en' => 'View Home Page'],
            // Tech Orders
            ['id' => 80, 'name' => 'view_technician_orders', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طلبات الفنيين', 'name_en' => 'View Technician Orders'],
            ['id' => 81, 'name' => 'view_today_technician_orders', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طلبات الفنيين اليوم', 'name_en' => 'View Today Technician Orders'],
            ['id' => 82, 'name' => 'view_orders_status', 'guard_name' => 'dashboard', 'name_ar' => 'عرض حالات الطلبات', 'name_en' => 'View Orders Status'],
            ['id' => 83, 'name' => 'view_cancellation_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'عرض اسباب الإلغاء', 'name_en' => 'View Cancellation Reasons'],
            ['id' => 84, 'name' => 'update_cancellation_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل اسباب الإلغاء', 'name_en' => 'Update Cancellation Reasons'],
            ['id' => 85, 'name' => 'delete_cancellation_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'حذف اسباب الإلغاء', 'name_en' => 'Delete Cancellation Reasons'],
        ];

        // Insert or update permissions
        foreach ($permissions as $permission) {
            DB::table('permissions')->updateOrInsert(
                ['id' => $permission['id']], // Ensure it matches the 'id' field in your table
                $permission
            );
        }

        echo "✅ Permissions inserted or updated successfully!\n";
    }
}

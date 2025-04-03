<?php

use Illuminate\Support\Facades\DB;

// Include the Composer autoload file to load Laravel's functionality
require __DIR__ . '/vendor/autoload.php';

// Bootstrap the Laravel application
$app = require_once __DIR__ . '/bootstrap/app.php';

// Create an instance of the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Boot the application
$kernel->bootstrap();

// Define the permissions
$permissions = [
    ['id' => 72, 'name' => 'create_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة المورد', 'name_en' => 'Add new Suppliers'],
    ['id' => 73, 'name' => 'view_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'عرض المورد', 'name_en' => 'View Suppliers'],
    ['id' => 74, 'name' => 'delete_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'حذف المورد', 'name_en' => 'Delete Suppliers'],
    ['id' => 75, 'name' => 'update_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة المورد', 'name_en' => 'Add new Suppliers'],
    ['id' => 76, 'name' => 'update_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'تحديث المورد', 'name_en' => 'Update Suppliers'],
    ['id' => 77, 'name' => 'view_financial_reports', 'guard_name' => 'dashboard', 'name_ar' => 'عرض التقارير المالية', 'name_en' => 'View Financial Reports'],
    ['id' => 78, 'name' => 'view_customer_complaints', 'guard_name' => 'dashboard', 'name_ar' => 'عرض شكاوي العملاء ', 'name_en' => ' View Customer Complaints '],
    ['id' => 79, 'name' => 'view_customer_complaints', 'guard_name' => 'dashboard', 'name_ar' => 'عرض شكاوي العملاء ', 'name_en' => ' View Customer Complaints '],

    // start Tech Orders
    ['id' => 80, 'name' => 'view_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طلبات الفنيين', 'name_en' => 'View Technician Orders'],
    ['id' => 81, 'name' => 'update_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل طلبات الفنيين', 'name_en' => 'Update Technician Orders'],
    ['id' => 82, 'name' => 'delete_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => 'حذف طلبات الفنيين', 'name_en' => 'Delete Technician Orders'],

    ['id' => 83, 'name' => 'view_today_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => ' عرض طلبات الفنيين اليوم', 'name_en' => 'View Technician Orders'],
    // End Tech Orders

    // cancel reasons

    ['id' => 84, 'name' => 'view_cancel_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'عرض  اسباب الإلغاء', 'name_en' => 'View Cancel Reasons'],
    ['id' => 85, 'name' => 'update_cancel_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل اسباب الإلغاء ', 'name_en' => 'Update Cancel Reasons'],
    ['id' => 86, 'name' => 'delete_cancel_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'حذف  اسباب الإلغاء', 'name_en' => 'Delete Cancel Reasons'],

    // End cancel reasons

    // Orders  Status

    ['id' => 87, 'name' => 'view_orders_status', 'guard_name' => 'dashboard', 'name_ar' => 'عرض حالات الطلبات', 'name_en' => 'View Orders Status'],
    ['id' => 88, 'name' => 'update_orders_status', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل حالات الطلبات ', 'name_en' => 'Update Orders Status'],
    ['id' => 89, 'name' => 'delete_orders_status', 'guard_name' => 'dashboard', 'name_ar' => 'حذف حالات الطلبات', 'name_en' => 'Delete Orders Status'],

    // End Orders  Status

    //Public Setting

    ['id' => 90, 'name' => 'view_public_setting', 'guard_name' => 'dashboard', 'name_ar' => 'عرض الإعدادات العامة ', 'name_en' => 'View Public Setting'],

    // End Public Setting

    // companys services management

    ['id' => 91, 'name' => 'view_companys_services_management', 'guard_name' => 'dashboard', 'name_ar' => 'إدارة خدمات الشركات', 'name_en' => 'View Companys Services Management'],
    ['id' => 92, 'name' => 'view_companys_services', 'guard_name' => 'dashboard', 'name_ar' => 'عرض خدمات الشركات', 'name_en' => 'View Companys Services'],
    ['id' => 93, 'name' => 'update_companys_services', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل خدمات الشركات', 'name_en' => 'Update Companys Services'],
    ['id' => 94, 'name' => 'delete_companys_services', 'guard_name' => 'dashboard', 'name_ar' => 'حذف خدمات الشركات', 'name_en' => 'Delete Companys Services'],

    ['id' => 95, 'name' => 'view_companys_services_orders', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طلبات خدمات الشركات', 'name_en' => 'View Companys Services Orders'],
    ['id' => 96, 'name' => 'delete_companys_services_orders', 'guard_name' => 'dashboard', 'name_ar' => 'حذف طلبات خدمات الشركات', 'name_en' => 'Delete Companys Services Orders'],

    // view_technicians_groups
    ['id' => 97, 'name' => 'view_technicians_groups', 'guard_name' => 'dashboard', 'name_ar' => 'عرض  مجموعات الفنيين', 'name_en' => 'View Technicians Groups'],
    ['id' => 98, 'name' => 'update_technicians_groups', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل  مجموعات الفنيين ', 'name_en' => 'Update Technicians Groups'],
    ['id' => 99, 'name' => 'delete_technicians_groups', 'guard_name' => 'dashboard', 'name_ar' => 'حذف  مجموعات الفنيين', 'name_en' => 'Delete Technicians Groups'],

    //  complaint_type
    ['id' => 100, 'name' => 'view_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'عرض نوع الشكوى', 'name_en' => 'View Complaint Type'],
    ['id' => 101, 'name' => 'update_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل نوع الشكوى', 'name_en' => 'Update Complaint Type'],
    ['id' => 102, 'name' => 'delete_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'حذف نوع الشكوى', 'name_en' => 'Delete Complaint Type'],
    ['id' => 103, 'name' => 'create_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'اضافة نوع الشكوى', 'name_en' => 'Create Complaint Type'],

];

// Insert or update permissions
foreach ($permissions as $permission) {
    DB::table('permissions')->updateOrInsert(['id' => $permission['id']], $permission);
}

echo "Permissions inserted or updated successfully!\n";

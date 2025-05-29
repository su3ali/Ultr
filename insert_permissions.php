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

    // Suppliers
    ['id' => 72, 'name' => 'create_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة المورد', 'name_en' => 'Add new Suppliers'],
    ['id' => 73, 'name' => 'view_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'عرض المورد', 'name_en' => 'View Suppliers'],
    ['id' => 74, 'name' => 'delete_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'حذف المورد', 'name_en' => 'Delete Suppliers'],
    ['id' => 75, 'name' => 'update_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة المورد', 'name_en' => 'Add new Suppliers'], // likely duplicate
    ['id' => 76, 'name' => 'update_suppliers', 'guard_name' => 'dashboard', 'name_ar' => 'تحديث المورد', 'name_en' => 'Update Suppliers'],

    // Reports & Complaints
    ['id' => 77, 'name' => 'view_financial_reports', 'guard_name' => 'dashboard', 'name_ar' => 'عرض التقارير المالية', 'name_en' => 'View Financial Reports'],
    ['id' => 78, 'name' => 'view_customer_complaints', 'guard_name' => 'dashboard', 'name_ar' => 'عرض شكاوي العملاء ', 'name_en' => ' View Customer Complaints '],
    ['id' => 79, 'name' => 'view_customer_complaints', 'guard_name' => 'dashboard', 'name_ar' => 'عرض شكاوي العملاء ', 'name_en' => ' View Customer Complaints '], // duplicate

    // Technician Orders
    ['id' => 80, 'name' => 'view_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طلبات الفنيين', 'name_en' => 'View Technician Orders'],
    ['id' => 81, 'name' => 'update_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل طلبات الفنيين', 'name_en' => 'Update Technician Orders'],
    ['id' => 82, 'name' => 'delete_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => 'حذف طلبات الفنيين', 'name_en' => 'Delete Technician Orders'],
    ['id' => 83, 'name' => 'view_today_tech_orders', 'guard_name' => 'dashboard', 'name_ar' => ' عرض طلبات الفنيين اليوم', 'name_en' => 'View Technician Orders'],

    // Cancel Reasons
    ['id' => 84, 'name' => 'view_cancel_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'عرض  اسباب الإلغاء', 'name_en' => 'View Cancel Reasons'],
    ['id' => 85, 'name' => 'update_cancel_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل اسباب الإلغاء ', 'name_en' => 'Update Cancel Reasons'],
    ['id' => 86, 'name' => 'delete_cancel_reasons', 'guard_name' => 'dashboard', 'name_ar' => 'حذف  اسباب الإلغاء', 'name_en' => 'Delete Cancel Reasons'],

    // Order Status
    ['id' => 87, 'name' => 'view_orders_status', 'guard_name' => 'dashboard', 'name_ar' => 'عرض حالات الطلبات', 'name_en' => 'View Orders Status'],
    ['id' => 88, 'name' => 'update_orders_status', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل حالات الطلبات ', 'name_en' => 'Update Orders Status'],
    ['id' => 89, 'name' => 'delete_orders_status', 'guard_name' => 'dashboard', 'name_ar' => 'حذف حالات الطلبات', 'name_en' => 'Delete Orders Status'],

    // Public Settings
    ['id' => 90, 'name' => 'view_public_setting', 'guard_name' => 'dashboard', 'name_ar' => 'عرض الإعدادات العامة ', 'name_en' => 'View Public Setting'],

    // Company Services Management
    ['id' => 91, 'name' => 'view_companys_services_management', 'guard_name' => 'dashboard', 'name_ar' => 'إدارة خدمات الشركات', 'name_en' => 'View Companys Services Management'],
    ['id' => 92, 'name' => 'view_companys_services', 'guard_name' => 'dashboard', 'name_ar' => 'عرض خدمات الشركات', 'name_en' => 'View Companys Services'],
    ['id' => 93, 'name' => 'update_companys_services', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل خدمات الشركات', 'name_en' => 'Update Companys Services'],
    ['id' => 94, 'name' => 'delete_companys_services', 'guard_name' => 'dashboard', 'name_ar' => 'حذف خدمات الشركات', 'name_en' => 'Delete Companys Services'],
    ['id' => 95, 'name' => 'view_companys_services_orders', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طلبات خدمات الشركات', 'name_en' => 'View Companys Services Orders'],
    ['id' => 96, 'name' => 'delete_companys_services_orders', 'guard_name' => 'dashboard', 'name_ar' => 'حذف طلبات خدمات الشركات', 'name_en' => 'Delete Companys Services Orders'],

    // Technician Groups
    ['id' => 97, 'name' => 'view_technicians_groups', 'guard_name' => 'dashboard', 'name_ar' => 'عرض  مجموعات الفنيين', 'name_en' => 'View Technicians Groups'],
    ['id' => 98, 'name' => 'update_technicians_groups', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل  مجموعات الفنيين ', 'name_en' => 'Update Technicians Groups'],
    ['id' => 99, 'name' => 'delete_technicians_groups', 'guard_name' => 'dashboard', 'name_ar' => 'حذف  مجموعات الفنيين', 'name_en' => 'Delete Technicians Groups'],

    // Complaint Types
    ['id' => 100, 'name' => 'view_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'عرض نوع الشكوى', 'name_en' => 'View Complaint Type'],
    ['id' => 101, 'name' => 'update_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل نوع الشكوى', 'name_en' => 'Update Complaint Type'],
    ['id' => 102, 'name' => 'delete_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'حذف نوع الشكوى', 'name_en' => 'Delete Complaint Type'],
    ['id' => 103, 'name' => 'create_complaint_type', 'guard_name' => 'dashboard', 'name_ar' => 'اضافة نوع الشكوى', 'name_en' => 'Create Complaint Type'],

    // Rescheduling Orders
    ['id' => 104, 'name' => 'view_Reschedule_orders', 'guard_name' => 'dashboard', 'name_ar' => 'امكانية جدولة الطلبات', 'name_en' => 'view Reschedule Orders'],

    // Appointment Settings
    ['id' => 105, 'name' => 'appointment_settings_manage', 'guard_name' => 'dashboard', 'name_ar' => 'إدارةإعدادات المواعيد', 'name_en' => 'Appointment Settings Manage'],

    // Shifts
    ['id' => 106, 'name' => 'view_shifts', 'guard_name' => 'dashboard', 'name_ar' => 'عرض المناوبات', 'name_en' => 'View Shifts'],
    ['id' => 107, 'name' => 'create_shifts', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة المناوبات', 'name_en' => 'Create Shift'],
    ['id' => 108, 'name' => 'edit_shifts', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل المناوبات', 'name_en' => 'Edit Shift'],
    ['id' => 109, 'name' => 'delete_shifts', 'guard_name' => 'dashboard', 'name_ar' => 'حذف المناوبات', 'name_en' => 'Delete Shift'],

    // Business Orders
    ['id' => 110, 'name' => 'view_business_orders', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طلبات الأعمال', 'name_en' => 'View Business Orders'],
    ['id' => 111, 'name' => 'update_business_orders', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل طلبات الأعمال', 'name_en' => 'Update Business Orders'],
    ['id' => 112, 'name' => 'delete_business_orders', 'guard_name' => 'dashboard', 'name_ar' => 'حذف طلبات الأعمال', 'name_en' => 'Delete Business Orders'],
    ['id' => 113, 'name' => 'create_business_orders', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة طلبات الأعمال', 'name_en' => 'Create Business Orders'],

    // business Orders Projects

    ['id' => 114, 'name' => 'business_orders_projects', 'guard_name' => 'dashboard', 'name_ar' => 'مشاريع طلبات الأعمال', 'name_en' => 'Business Orders Projects'],
    ['id' => 115, 'name' => 'business_orders_projects_create', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة مشروع لطلبات الأعمال', 'name_en' => 'Create Business Orders Projects'],
    ['id' => 116, 'name' => 'business_orders_projects_update', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل مشروع من طلبات الأعمال', 'name_en' => 'Update Business Orders Projects'],
    ['id' => 117, 'name' => 'business_orders_projects_delete', 'guard_name' => 'dashboard', 'name_ar' => 'حذف مشروع من طلبات الأعمال', 'name_en' => 'Delete Business Orders Projects'],
    ['id' => 118, 'name' => 'business_orders_projects_view', 'guard_name' => 'dashboard', 'name_ar' => 'عرض مشاريع طلبات الأعمال', 'name_en' => 'View Business Orders Projects'],

    // business Orders Branches

    ['id' => 119, 'name' => 'business_orders_branches', 'guard_name' => 'dashboard', 'name_ar' => 'فروع طلبات الأعمال', 'name_en' => 'Business Orders Branches'],
    ['id' => 120, 'name' => 'business_orders_branches_create', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة فرع لطلبات الأعمال', 'name_en' => 'Create Business Orders Branches'],
    ['id' => 121, 'name' => 'business_orders_branches_update', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل فرع من طلبات الأعمال', 'name_en' => 'Update Business Orders Branches'],
    ['id' => 122, 'name' => 'business_orders_branches_delete', 'guard_name' => 'dashboard', 'name_ar' => 'حذف فرع من طلبات الأعمال', 'name_en' => 'Delete Business Orders Branches'],
    ['id' => 123, 'name' => 'business_orders_branches_view', 'guard_name' => 'dashboard', 'name_ar' => 'عرض فروع طلبات الأعمال', 'name_en' => 'View Business Orders Branches'],

    // business Orders Floors

    ['id' => 124, 'name' => 'business_orders_floors', 'guard_name' => 'dashboard', 'name_ar' => 'طوابق طلبات الأعمال', 'name_en' => 'Business Orders Floors'],
    ['id' => 125, 'name' => 'business_orders_floors_create', 'guard_name' => 'dashboard', 'name_ar' => 'إضافة طابق لطلبات الأعمال', 'name_en' => 'Create Business Orders Floors'],
    ['id' => 126, 'name' => 'business_orders_floors_update', 'guard_name' => 'dashboard', 'name_ar' => 'تعديل طابق من طلبات الأعمال', 'name_en' => 'Update Business Orders Floors'],
    ['id' => 127, 'name' => 'business_orders_floors_delete', 'guard_name' => 'dashboard', 'name_ar' => 'حذف طابق من طلبات الأعمال', 'name_en' => 'Delete Business Orders Floors'],
    ['id' => 128, 'name' => 'business_orders_floors_view', 'guard_name' => 'dashboard', 'name_ar' => 'عرض طوابق طلبات الأعمال', 'name_en' => 'View Business Orders Floors'],

    ['id' => 129, 'name' => 'orders_change_status', 'guard_name' => 'dashboard', 'name_ar' => 'تغيير حالة الطلب', 'name_en' => 'Orders Change Status'],
    ['id' => 130, 'name' => 'bookings_change_status', 'guard_name' => 'dashboard', 'name_ar' => 'تغيير حالة الحجز', 'name_en' => 'Booking Change Status'],
    ['id' => 131, 'name' => 'apply_coupon', 'guard_name' => 'dashboard', 'name_ar' => 'تفعيل كوبونات الخصم', 'name_en' => 'Activate discount coupons'],

];

// Insert or update permissions
foreach ($permissions as $permission) {
    DB::table('permissions')->updateOrInsert(['id' => $permission['id']], $permission);
}

echo "Permissions inserted or updated successfully!\n";

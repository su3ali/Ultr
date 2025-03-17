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

];

// Insert or update permissions
foreach ($permissions as $permission) {
    DB::table('permissions')->updateOrInsert(['id' => $permission['id']], $permission);
}

echo "Permissions inserted or updated successfully!\n";

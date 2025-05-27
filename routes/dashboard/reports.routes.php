<?php

use App\Http\Controllers\Dashboard\Orders\OrderController;
use App\Http\Controllers\Dashboard\Reports\CustomerReportsController;
use App\Http\Controllers\Dashboard\Reports\ReportsController;

Route::get('report/sales', 'Reports\ReportsController@sales')->name('report.sales');
Route::get('report/updateSummary', 'Reports\ReportsController@updateSummary')->name('report.updateSummary');
Route::get('report/contractSales', 'Reports\ReportsController@contractSales')->name('report.contractSales');
Route::get('report/customers', 'Reports\ReportsController@customers')->name('report.customers');
Route::get('report/technicians', 'Reports\ReportsController@technicians')->name('report.technicians');
Route::get('report/services', 'Reports\ReportsController@services')->name('report.services');

//  Export Routes

Route::get('report/sales/export/excel', [ReportsController::class, 'exportExcel'])->name('report.sales.export.excel');
Route::get('report/sales/export/print', [ReportsController::class, 'exportPrint'])->name('report.sales.export.print');

//  Customer Reports

Route::get('customer/report', [CustomerReportsController::class, 'report'])->name('customer.report');

Route::get('orders/by-user/{id}', [OrderController::class, 'byUser'])->name('orders.by_user');

Route::get('customer.orders/{customer_id}', 'Orders\OrderController@customerOrders')->name('customer.orders');

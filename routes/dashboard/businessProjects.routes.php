<?php
use App\Http\Controllers\Dashboard\BusinessProject\ProjectBranchController;
use App\Http\Controllers\Dashboard\BusinessProject\ProjectFloorController;
use Illuminate\Support\Facades\Route;

Route::resource('business_projects', 'BusinessProject\BusinessProjectController');

// Resource route for Project Branches

Route::resource('business-project-branches', 'BusinessProject\ProjectBranchController');

// Resource route for Project Floors

Route::resource('business-project-floors', 'BusinessProject\ProjectFloorController');

Route::post('floors_statuses/change_status/change', [ProjectFloorController::class, 'change_status'])->name('floors_statuses.change_status');

Route::post('business-project-floors/{id}/restore', [ProjectFloorController::class, 'restore'])->name('dashboard.business-project-floors.restore');

// Get project branche
Route::get('/get-project-branches/{project_id}', [ProjectBranchController::class, 'getBranchesByProject'])->name('dashboard.project.branches');

// routes/web.php أو routes/dashboard.php حسب تنظيمك
Route::get('/get-branch-floors/{branch_id}', [ProjectFloorController::class, 'getFloorsByBranch'])
    ->name('dashboard.branch.floors');

// business orders

Route::resource('business_orders', 'BusinessProject\BusinessOrderController');

// Get Price for service in project

// Route::post('/get-service-price', [BusinessProjectController::class, 'getPrice'])->name('dashboard.get.service.price');

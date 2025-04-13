<?php


Route::get('/business-projects', [BusinessProjectController::class, 'index'])->name('business_projects.index');

Route::get('/business-projects/create', [BusinessProjectController::class, 'create'])->name('business_projects.create');
Route::post('/business-projects', [BusinessProjectController::class, 'store'])->name('business_projects.store');
Route::get('/business-projects/{id}', [BusinessProjectController::class, 'show'])->name('business_projects.show');
Route::get('/business-projects/{id}/edit', [BusinessProjectController::class, 'edit'])->name('business_projects.edit');
Route::put('/business-projects/{id}', [BusinessProjectController::class, 'update'])->name('business_projects.update');


<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminWorkOrderController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User management routes
    Route::resource('users', UserController::class)->except(['create', 'show', 'edit']);
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

    // Section management routes
    Route::resource('sections', SectionController::class);
    Route::post('subsections', [SectionController::class, 'storeSubsection'])->name('subsections.store');
    Route::put('subsections/update', [SectionController::class, 'updateSubsection'])->name('subsections.update');
    Route::delete('subsections/{id}', [SectionController::class, 'destroySubsection'])->name('subsections.destroy');

    Route::post('departments/create', [SectionController::class, 'storeDepartment'])->name('departments.store');
    Route::put('departments/update', [SectionController::class, 'updateDepartment'])->name('departments.update');
    Route::delete('departments/{id}', [SectionController::class, 'destroyDepartment'])->name('departments.destroy');

    // Work order routes
    Route::get('workorder', [AdminWorkOrderController::class, 'index'])->name('workorder.index');
    Route::get('workorder/{workOrder}', [AdminWorkOrderController::class, 'show'])->name('workorder.show')->where('workOrder', '.*');
    Route::delete('workorder/{workOrder}', [AdminWorkOrderController::class, 'destroy'])->name('workorder.destroy')->where('workOrder', '.*');
});

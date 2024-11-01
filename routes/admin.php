<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminWorkOrderController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Route for the admin dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Route to list all users
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('users/create', [UserController::class, 'create'])->name('users.create');

    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');

    // Route to display the sections

    Route::get('sections', [SectionController::class, 'index'])->name('sections.index');

    // Route to handle the form submission for creating a user
    Route::post('users', [UserController::class, 'store'])->name('users.store');

    // Route to display the edit user form
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

    // Route to handle the form submission for updating a user
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

    // Route to handle user deletion
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Route::delete('sections/{department}', [SectionController::class, 'destroy'])->name('department.destroy');

    // Route to delete either a department or a subsection
    Route::delete('sections/delete/{type}/{id}', [SectionController::class, 'destroy'])->name('delete');





    Route::resource('sections', SectionController::class);


    Route::post('departments/store', [SectionController::class, 'storeDepartment'])->name('departments.store');


    Route::post('subsections', [SectionController::class, 'storeSubsection'])->name('subsections.store');

    Route::put('subsections/update', [SectionController::class, 'updateSubsection'])->name('subsections.update');
    Route::put('departments/update', [SectionController::class, 'updateDepartment'])->name('departments.update');

    Route::delete('subsections/{id}', [SectionController::class, 'destroySubsection'])->name('subsections.destroy');
    Route::delete('departments/{id}', [SectionController::class, 'destroyDepartment'])->name('departments.destroy');

    Route::post('subsections/store', [SectionController::class, 'storeSubsection'])->name('subsections.store');

    Route::get('workorder', [AdminWorkOrderController::class, 'index'])->name('workorder.index');
    Route::get('workorder/{workOrder}', [AdminWorkOrderController::class, 'show'])
    ->name('workorder.show')
    ->where('workOrder', '.*');

    Route::delete('workorder/{workOrder}', [AdminWorkOrderController::class, 'destroy'])->name('workorder.destroy')->where('workOrder', '.*');
});

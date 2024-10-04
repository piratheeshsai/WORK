<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'admin', 'as' =>'admin.'], function(){
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





    Route::resource('sections', SectionController::class);






});

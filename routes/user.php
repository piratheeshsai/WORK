<?php

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProfileController;

use App\Http\Controllers\User\WorkOrderController;
use App\Models\Subsection; // Import the Subsection model
use App\Models\Department; // Import the Department model
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('workorder', [WorkOrderController::class, 'index'])->name('work.index');
    Route::get('workorder/create', [WorkOrderController::class, 'create'])->name('work.create');

    // Get subsections based on section ID
    Route::get('/get-subsections/{sectionId}', function($sectionId) {
        return response()->json(Subsection::where('section_id', $sectionId)->get());
    });

    Route::get('/get-departments/{subsectionsId}', function($subsectionId) {
        return response()->json(Department::where('subsections_id', $subsectionId)->get());
    });

    Route::get('profile', [UserProfileController::class, 'index'])->name('profile.index');

    Route::put('profile', [UserProfileController::class, 'update'])->name('profile.update');

    Route::post('workorder/store', [WorkOrderController::class, 'store'])->name('work.store');

});

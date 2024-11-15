<?php

use App\Http\Controllers\Civil\CivilDashboardController;
use App\Http\Controllers\Civil\CivilProfileController;
use App\Http\Controllers\Civil\CivilWorkOrderController;
use App\Models\Department;
use App\Models\Subsection;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'civil','as' =>'civil.'], function(){
Route::get('dashboard', [CivilDashboardController::class, 'index'])->name('dashboard');
Route::get('profile', [CivilProfileController::class, 'index'])->name('profile.index');

Route::put('profile', [CivilProfileController::class, 'update'])->name('profile.update');
Route::get('/get-subsections/{sectionId}', function($sectionId) {
    return response()->json(Subsection::where('section_id', $sectionId)->get());
});

Route::get('/get-departments/{subsectionsId}', function($subsectionId) {
    return response()->json(Department::where('subsections_id', $subsectionId)->get());
});

Route::get('workorder', [CivilWorkOrderController::class, 'index'])->name('work.index');

Route::get('workorder/{workOrder}', [CivilWorkOrderController::class, 'show'])
    ->name('workorder.show')
    ->where('workOrder', '.*');


    Route::delete('workorder/{workOrder}', [CivilWorkOrderController::class, 'destroy'])->name('workorder.destroy')
    ->where('workOrder', '.*');

    Route::post('workorder/{id}/Accept', [CivilWorkOrderController::class, 'Accept'])
    ->name('workorder.Accept')
    ->where('id', '.*');

    Route::post('workorder/{id}/Complete', [CivilWorkOrderController::class, 'Complete'])
    ->name('workorder.Complete')
    ->where('id', '.*');


});

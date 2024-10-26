<?php


// use App\Http\Controllers\Engineer\EngineerDashboardController;
// use App\Http\Controllers\Recommender\RecommenderController;
// use App\Http\Controllers\Recommender\RecommenderProfileController;
// use App\Http\Controllers\Recommender\RecommenderWorkOrderController;
// use App\Models\Department;
// use App\Models\Subsection;
// use Illuminate\Support\Facades\Route;

// Route::group(['prefix' =>'recommender','as' =>'recommender.'], function(){
// Route::get('dashboard', [RecommenderController::class, 'index'])->name('dashboard');

// Route::get('workorder', [RecommenderWorkOrderController::class, 'index'])->name('work.index');

// Route::get('profile', [RecommenderProfileController::class, 'index'])->name('profile.index');

// Route::put('profile', [RecommenderProfileController::class, 'update'])->name('profile.update');

// Route::get('/get-subsections/{sectionId}', function($sectionId) {
//     return response()->json(Subsection::where('section_id', $sectionId)->get());
// });

// Route::get('/get-departments/{subsectionsId}', function($subsectionId) {
//     return response()->json(Department::where('subsections_id', $subsectionId)->get());
// });


// });

use App\Http\Controllers\Engineer\EngineerDashboardController;
use App\Http\Controllers\Recommender\RecommenderController;
use App\Http\Controllers\Recommender\RecommenderProfileController;
use App\Http\Controllers\Recommender\RecommenderWorkOrderController;
use App\Models\Department;
use App\Models\Subsection;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'recommender', 'as' =>'recommender.', 'middleware' => 'auth'], function() {
    Route::get('dashboard', [RecommenderController::class, 'index'])->name('dashboard');

    Route::get('workorder', [RecommenderWorkOrderController::class, 'index'])->name('work.index');

    Route::get('profile', [RecommenderProfileController::class, 'index'])->name('profile.index');

    Route::put('profile', [RecommenderProfileController::class, 'update'])->name('profile.update');

    Route::get('/get-subsections/{sectionId}', function($sectionId) {
        return response()->json(Subsection::where('section_id', $sectionId)->get());
    });

    Route::get('/get-departments/{subsectionsId}', function($subsectionId) {
        return response()->json(Department::where('subsections_id', $subsectionId)->get());
    });
});

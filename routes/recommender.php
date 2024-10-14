<?php


use App\Http\Controllers\Engineer\EngineerDashboardController;
use App\Http\Controllers\Recommender\RecommenderController;
use App\Http\Controllers\Recommender\RecommenderWorkOrderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'recommender','as' =>'recommender.'], function(){
Route::get('dashboard', [RecommenderController::class, 'index'])->name('dashboard');

Route::get('workorder', [RecommenderWorkOrderController::class, 'index'])->name('work.index');

});

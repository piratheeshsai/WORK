<?php


use App\Http\Controllers\Engineer\EngineerDashboardController;
use App\Http\Controllers\Recommender\RecommenderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'recommender','as' =>'recommender.'], function(){
Route::get('dashboard', [RecommenderController::class, 'index'])->name('dashboard');

});

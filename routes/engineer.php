<?php


use App\Http\Controllers\Engineer\EngineerDashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'engineer','as' =>'engineer.'], function(){
Route::get('dashboard', [EngineerDashboardController::class, 'index'])->name('dashboard');

});

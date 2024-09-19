<?php

use App\Http\Controllers\Civil\CivilDashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'civil','as' =>'civil.'], function(){
Route::get('dashboard', [CivilDashboardController::class, 'index'])->name('dashboard');

});

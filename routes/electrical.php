 <?php

use App\Http\Controllers\Electrical\ElectricalDashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'electrical','as' =>'electrical.'], function(){
Route::get('dashboard', [ElectricalDashboardController::class, 'index'])->name('dashboard');

});

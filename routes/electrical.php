 <?php

use App\Http\Controllers\Electrical\ElectricalDashboardController;
use App\Http\Controllers\Electrical\ElectricalProfileController;
use App\Http\Controllers\Electrical\ElectricalWorkOrderController;
use App\Models\Subsection;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'electrical','as' =>'electrical.'], function(){
Route::get('dashboard', [ElectricalDashboardController::class, 'index'])->name('dashboard');
Route::get('profile', [ElectricalProfileController::class, 'index'])->name('profile.index');

Route::put('profile', [ElectricalProfileController::class, 'update'])->name('profile.update');
Route::get('/get-subsections/{sectionId}', function($sectionId) {
    return response()->json(Subsection::where('section_id', $sectionId)->get());
});
Route::get('workorder', [ElectricalWorkOrderController::class, 'index'])->name('work.index');

Route::get('workorder/{workOrder}', [ElectricalWorkOrderController::class, 'show'])
    ->name('workorder.show')
    ->where('workOrder', '.*');


    Route::delete('workorder/{workOrder}', [ElectricalWorkOrderController::class, 'destroy'])->name('workorder.destroy')
    ->where('workOrder', '.*');

});
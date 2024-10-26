<?php

namespace App\Http\Controllers\Recommender;

use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use App\Models\workOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecommenderWorkOrderController extends Controller
{

    public function index()
{
    Log::info('RecommenderWorkOrderController@index: Start retrieving work orders.');

    if (!auth()->check()) {
        Log::warning('User is not authenticated.');
        return redirect()->route('login')->with('error', 'You must be logged in to view work orders.');
    }

    $user = auth()->user();
    Log::info('Authenticated user ID: ' . $user->id);

    $workOrders = WorkOrder::where('recommender_id', $user->id)->paginate(10);
    Log::info('Number of work orders retrieved: ' . $workOrders->count());

    return view('recommender.workOrder.index', compact('workOrders'));
}

    }


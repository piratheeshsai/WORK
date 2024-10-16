<?php

namespace App\Http\Controllers\Recommender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecommenderWorkOrderController extends Controller
{
    public function index(){
        
        return view('recommender.workOrder.index');
    }
}

<?php

namespace App\Http\Controllers\Recommender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class RecommenderController extends Controller
{
    public function index():View{
        return view('Recommender.dashboard.index');
    }
}

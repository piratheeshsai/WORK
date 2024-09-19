<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EngineerDashboardController extends Controller
{
    public function index():View{
        return view('engineer.dashboard.index');
    }

}

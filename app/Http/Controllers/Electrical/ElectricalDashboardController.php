<?php

namespace App\Http\Controllers\Electrical;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ElectricalDashboardController extends Controller
{
    public function index():View{
        return view('electrical.dashboard.index');
    }

}

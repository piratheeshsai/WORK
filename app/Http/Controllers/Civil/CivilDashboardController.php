<?php

namespace App\Http\Controllers\Civil;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CivilDashboardController extends Controller
{
    public function index():View{
        return view('civil.dashboard.index');
    }

}

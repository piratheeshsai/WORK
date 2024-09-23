<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index():View{
        return view('users.dashboard.index');
    }
    
}


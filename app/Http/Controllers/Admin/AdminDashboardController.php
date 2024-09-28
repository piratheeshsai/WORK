<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index():View{
        // return view('admin.layouts.master1');
        return view('admin.dashboard.index');
    }
}

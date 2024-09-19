<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Section; // Import the Section model
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{


        public function create()
        {
            // Fetch all sections to be used in the form
            $section = Section::all();

            // Pass the sections to the view
            return view('users.workorder.create', compact('section'));
        }
    }

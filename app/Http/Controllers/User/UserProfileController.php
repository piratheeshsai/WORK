<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\User;
use Illuminate\Contracts\View\View;
class UserProfileController extends Controller
{

    public function index()
    {
        // Fetch the authenticated user
        $user = auth()->user(); // This assumes you're using authentication to get the logged-in user

        // Fetch all sections to be used in the form
        $section = Section::all();

        // Pass both the user and sections to the view
        return view('users.profile.index', compact('user', 'section'));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\userDetails;
use Illuminate\Contracts\View\View;
class UserProfileController extends Controller
{

    public function index()
    {
        // Fetch the authenticated user
        $user = auth()->user();

        // Fetch all sections to be used in the form
        $section = Section::all();

        $userDetails = userDetails::where('userID', $user->userID)->first();

        // Pass both the user and sections to the view
        return view('users.profile.index', compact('user', 'section', 'userDetails'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {


        $users = User::with('userDetails')->get();
        $users = User::paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => ['required', Rule::in(['Admin', 'User', 'Engineer', 'Civil', 'Electrical','Recommender'])],
            'password' => 'required|string|min:8|confirmed',
            'userID' => 'required|string|unique:users,userID|max:50', // Include userID validation
        ]);

        $user = User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'userID' => $request->userID, // Store userID
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => ['required', Rule::in(['Admin', 'User', 'Engineer', 'Civil', 'Electrical','Recommender'])],
            'password' => 'nullable|string|min:8|confirmed',
            'userID' => ['required', 'string', 'max:50', Rule::unique('users', 'userID')->ignore($user->getKey(), $user->getKeyName())], // Adjusted to handle userID
        ]);

        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'userID' => $request->userID, // Update userID
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

}

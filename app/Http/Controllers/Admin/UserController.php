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
        $users = User::paginate(3);
        $users = User::with('userDetails')->get();
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
            'role' => ['required', Rule::in(['Admin', 'User', 'Engineer', 'Civil', 'Electrical'])],
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
            // 'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => ['required', Rule::in(['Admin', 'User', 'Engineer', 'Civil', 'Electrical'])],
            'password' => 'nullable|string|min:8|confirmed',
            'userID' => ['required', 'string', 'max:50', Rule::unique('users', 'userID')->ignore($user->userID)], // Include userID validation
        ]);

        $user->update([
            'name' => $request->name,
            // 'email' => $request->email,
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

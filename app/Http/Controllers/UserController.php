<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();
        
        return view('admin.users.userslist', compact('users'));
    }

    public function updateUsertype(Request $request, User $user)
    {
        $request->validate([
            'usertype' => 'required|in:user,admin',
        ]);

        if ($user->name !== 'admin') {
            $user->usertype = $request->usertype;
            $user->save();

            return redirect()->route('users.index')->with('success', 'Usertype updated successfully.');
        }

        return redirect()->route('users.index')->with('error', 'Cannot change the usertype of the admin user.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:32|unique:users,name,' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'required|string|min:8',
            'usertype' => 'required|in:user,admin',
        ]);

        // Create new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'usertype' => $validatedData['usertype'],
        ]);

        // Redirect or respond with success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function destroy(User $user)
{
    if ($user->name === 'admin') {
        return redirect()->route('users.index')->with('error', 'Cannot delete admin user.');
    }

    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}


}

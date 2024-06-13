<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}

<?php

// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . Auth::id(),
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'birthday' => 'nullable|date|before:2013-01-01',
            'bio' => 'nullable|string|max:1000',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birthday = $request->birthday ? Carbon::createFromFormat('Y-m-d', $request->birthday) : null;
        $user->bio = $request->bio;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
        ]);
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $avatarName, 'public');

            // Optionally, delete the old avatar if it's not the default one
            if ($user->avatar && $user->avatar !== 'avatars/default_avatar.png') {
                \Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = 'avatars/' . $avatarName;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('status', 'avatar-uploaded');
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return \Illuminate\Support\Facades\Redirect::to('/');
    }
}

<?php

// AvatarController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Handle the avatar upload.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:1024',
        ]);

        $user = Auth::user();
        $path = $request->file('avatar')->store('avatars', 'public');

        // Delete the old avatar if it exists
        if ($user->avatar && $user->avatar !== 'avatars/default_avatar.png') {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->avatar = $path;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'avatar-uploaded');
    }

    /**
     * Reset the user's avatar to the default avatar.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset()
    {
        $user = Auth::user();

        // Check if current avatar is not default avatar
        if ($user->avatar !== 'avatars/default_avatar.png') {
            // Delete the current avatar
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Set avatar to default
            $user->avatar = 'avatars/default_avatar.png';
            $user->save();
        }

        return redirect()->route('profile.edit')->with('status', 'avatar-reset');
    }
}

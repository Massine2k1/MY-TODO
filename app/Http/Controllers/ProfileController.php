<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('auth.profile');
    }

    public function update(Request $request)
    {
        $request->validate(["avatar"=>["nullable","image","max:2000"]]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars','public');
            $user->avatar = $path;
            }
        $user->save();

        return to_route('auth.profile')->with('success','Avatar mis à jour!');

    }
}

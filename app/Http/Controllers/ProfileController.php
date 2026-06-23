<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Requests\FormProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('auth.profile');
    }

    public function extractData(User $user,FormProfileRequest $request)
    {
        $data = $request->validated();
        $avatar = $request->validated('avatar');

        if ($avatar==null || $avatar->getError()) {
            return $data;
        }

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $data['avatar'] = $avatar->store('avatars','public');
        return $data;
    }

    public function update(FormProfileRequest $request)
    {
        $user = Auth::user();
        $ProfileRequest = $this->extractData($user, $request);
        $user->update($ProfileRequest);

        return to_route('auth.profile')->with('success','Profil mis à jour avec succès !');
    }

}

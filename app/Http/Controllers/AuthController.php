<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentails = $request->validated();

        if (Auth::attempt($credentails)) {
            $request->session()->regenerate();
            return redirect()->intended(route('post.index'));
        }

        return to_route('auth.login')->withErrors(["email"=>"email invalide"])->onlyInput('email');
    }
}

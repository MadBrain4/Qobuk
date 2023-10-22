<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }

    public function register ()
    {
        return view('auth.register');
    }

    public function authLogin (LoginRequest $request) : RedirectResponse
    {
        $credentials = $request->getCredentials();

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->route('home');
    }

    public function authRegister (RegisterRequest $request) : RedirectResponse
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,    
        ]);

        return redirect()->route('login');
    }

    public function authLogout () : RedirectResponse
    {
        auth()->guard('web')->logout();

        return redirect()->route('login');
    }
}

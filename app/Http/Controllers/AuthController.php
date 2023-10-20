<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login (LoginRequest $request) : JsonResponse
    {
        $credentials = $request->getCredentials();
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email or password is incorrect',
            ]);
        }

        $user = User::where('email', $credentials['email'])->first();

        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully',
            'data' => new UserResource($user),
            'access_token' => $user->createToken('API TOKEN')->plainTextToken
        ]);
    }

    public function register (RegisterRequest $request) : JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'success' => true, 
            'message' => 'User created successfully',
            'data' => new UserResource($user)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index() : JsonResource
    {
        return UserResource::collection(User::all());
    }

    public function store(UserStoreRequest $request) : JsonResponse
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
        ], 201);
    }

    public function show(User $user) : JsonResponse
    {
        return response()->json([
            'data' => new UserResource($user)
        ]);
    }

    public function update(UserUpdateRequest $request, User $user) : JsonResponse
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully',
            'data' => new UserResource($user)
        ]);
    }

    public function destroy(User $user) : JsonResponse
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully',
            'data' => new UserResource($user)
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->register($data);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }


    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $token = $this->userService->login($data);

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
        ]);
    }




}

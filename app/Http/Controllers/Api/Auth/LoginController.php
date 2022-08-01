<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\ZealPay\Repositories\Contracts\UserRepository;
use App\ZealPay\Services\Auth\Login;

class LoginController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = (new Login())->attempt($this->userRepository, $request->validated());

        if (is_null($user)){
            return response()->json(['message' => 'error', 'error' => 'wrong credentials']);
        }

        $token = $user?->createToken('auth')->plainTextToken;

        return response()->json(['message' => 'success', 'user' => ['name' => $user?->name, 'token' => $token]]);
    }
}

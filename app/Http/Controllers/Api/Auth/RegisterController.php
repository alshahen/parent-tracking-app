<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\ZealPay\Repositories\Contracts\UserRepository;
use App\ZealPay\Services\Auth\Register;

class RegisterController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(RegisterRequest $request)
    {
        (new Register())->store($this->userRepository, $request->validated());

        return response()->json(['message' => 'success']);
    }
}

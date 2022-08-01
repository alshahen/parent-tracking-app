<?php

namespace App\ZealPay\Services\Auth;

use App\ZealPay\Repositories\Contracts\UserRepository;

class Register
{

    public function store(UserRepository $userRepository, $attributes): \App\Models\User
    {
        return $userRepository->create($attributes);
    }

}

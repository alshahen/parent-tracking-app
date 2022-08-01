<?php

namespace App\ZealPay\Services\Auth;

use App\Models\User;
use App\ZealPay\Repositories\Contracts\UserRepository;
use Illuminate\Database\Eloquent\Model;

class Login
{

    public function attempt(UserRepository $userRepository, $attributes): Model|null
    {
        $user = $userRepository->where(function ($query) use ($attributes) {
            $query->where('name', $attributes['username'])
                ->orWhere('id', $attributes['username']);
        });

        if ($user->exists()) {
            return $user->first();
        }

        return null;
    }
}

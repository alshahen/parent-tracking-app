<?php

namespace App\ZealPay\Services\Partner;

use App\ZealPay\Repositories\Contracts\UserRepository;

class IndexPartner
{
    public function index($userId, UserRepository $userRepository)
    {
        return $userRepository->findOrFail($userId)->load('partners');
    }
}

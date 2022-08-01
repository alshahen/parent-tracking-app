<?php

namespace App\ZealPay\Services\Partner;

use App\ZealPay\Repositories\Contracts\UserRepository;

class CreatePartner
{
    public function store(UserRepository $userRepository, $attributes)
    {
        return $userRepository->createPartner( $attributes);
    }

}

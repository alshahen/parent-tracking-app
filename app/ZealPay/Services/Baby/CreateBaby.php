<?php

namespace App\ZealPay\Services\Baby;

use App\Models\Baby;
use App\ZealPay\Repositories\Contracts\BabyRepository;

class CreateBaby
{
    public function store(BabyRepository $babyRepository, $attributes): Baby
    {
        return $babyRepository->create($attributes);
    }
}

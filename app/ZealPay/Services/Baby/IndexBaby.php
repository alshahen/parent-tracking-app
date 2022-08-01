<?php

namespace App\ZealPay\Services\Baby;

use App\ZealPay\Repositories\Contracts\UserRepository;

class IndexBaby
{
    public function index($userId, UserRepository $babyRepository): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return $babyRepository->getBabies($userId);
    }

}

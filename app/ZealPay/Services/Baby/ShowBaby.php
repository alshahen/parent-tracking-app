<?php

namespace App\ZealPay\Services\Baby;

use App\Models\Baby;
use App\ZealPay\Repositories\Contracts\BabyRepository;

class ShowBaby
{
    public function show($id, BabyRepository $babyRepository): Baby
    {
        return $babyRepository->findOrFail($id);
    }
}

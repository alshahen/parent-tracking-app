<?php

namespace App\ZealPay\Services\Baby;

use App\Models\Baby;
use App\ZealPay\Repositories\Contracts\BabyRepository;

class UpdateBaby
{
    public function update($id, BabyRepository $babyRepository, $attributes): Baby
    {
        return $babyRepository->update($id, $attributes);
    }
}

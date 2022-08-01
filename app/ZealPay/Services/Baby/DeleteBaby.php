<?php

namespace App\ZealPay\Services\Baby;

use App\ZealPay\Repositories\Contracts\BabyRepository;

class DeleteBaby
{
    public function delete($id, BabyRepository $babyRepository): bool
    {
        return $babyRepository->delete($id);
    }

}

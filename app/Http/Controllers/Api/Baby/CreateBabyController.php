<?php

namespace App\Http\Controllers\Api\Baby;

use App\Http\Requests\CreateBabyRequest;
use App\ZealPay\Repositories\Contracts\BabyRepository;
use App\ZealPay\Services\Baby\CreateBaby;

class CreateBabyController
{
    protected BabyRepository $babyRepository;

    public function __construct(BabyRepository $babyRepository)
    {
        $this->babyRepository = $babyRepository;
    }

    public function __invoke(CreateBabyRequest $request)
    {
        (new CreateBaby())->store($this->babyRepository, $request->validated());

        return response()->json(['message' => 'success']);
    }
}

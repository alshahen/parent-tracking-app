<?php

namespace App\Http\Controllers\Api\Baby;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndexBabyResource;
use App\ZealPay\Repositories\Contracts\UserRepository;
use App\ZealPay\Services\Baby\IndexBaby;

class IndexBabyController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke()
    {
        $babies = (new IndexBaby())->index(auth()->id(), $this->userRepository);

        return response()->json(['babies' => new IndexBabyResource($babies)]);
    }
}

<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\ZealPay\Repositories\Contracts\UserRepository;
use App\ZealPay\Services\Partner\IndexPartner;
use Illuminate\Http\Request;

class IndexPartnerController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(Request $request)
    {
        $partners = (new IndexPartner())->index(auth()->id(), $this->userRepository);

        return response()->json(['partners' => $partners]);
    }
}

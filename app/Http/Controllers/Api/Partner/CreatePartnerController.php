<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Partner\CreatePartnerRequest;
use App\ZealPay\Repositories\Contracts\UserRepository;
use App\ZealPay\Services\Partner\CreatePartner;
use Illuminate\Support\Facades\Gate;


class CreatePartnerController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(CreatePartnerRequest $request)
    {
        $partner = $this->userRepository->findOrFail($request->partner_id);

        Gate::authorize('create', $partner);

        (new CreatePartner())->store($this->userRepository, $request->validated());

        return response()->json(['message' => 'success']);
    }
}

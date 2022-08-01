<?php

namespace App\Http\Controllers\Api\Baby;

use App\Http\Requests\UpdateBabyRequest;
use App\ZealPay\Repositories\Contracts\BabyRepository;
use App\ZealPay\Services\Baby\UpdateBaby;
use Illuminate\Support\Facades\Gate;

class UpdateBabyController
{
    protected BabyRepository $babyRepository;

    public function __construct(BabyRepository $babyRepository)
    {
        $this->babyRepository = $babyRepository;
    }

    public function __invoke($id, UpdateBabyRequest $request)
    {
        $baby = $this->babyRepository->findOrFail($id);

        Gate::authorize('update', $baby);

        (new UpdateBaby())->update($id, $this->babyRepository, $request->validated());

        return response()->json(['message' => 'success']);
    }
}

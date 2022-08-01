<?php

namespace App\Http\Controllers\Api\Baby;

use App\Http\Controllers\Controller;
use App\ZealPay\Repositories\Contracts\BabyRepository;
use App\ZealPay\Services\Baby\DeleteBaby;
use Illuminate\Support\Facades\Gate;

class DeleteBabyController extends Controller
{
    protected BabyRepository $babyRepository;

    public function __construct(BabyRepository $babyRepository)
    {
        $this->babyRepository = $babyRepository;
    }

    public function __invoke($id)
    {
        $baby = $this->babyRepository->findOrFail($id);

        Gate::authorize('delete', $baby);

        (new DeleteBaby())->delete($id, $this->babyRepository);

        return response()->json(['message' => 'success']);
    }
}

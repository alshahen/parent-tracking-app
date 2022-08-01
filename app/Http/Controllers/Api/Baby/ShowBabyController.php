<?php

namespace App\Http\Controllers\Api\Baby;

use App\Http\Controllers\Controller;
use App\ZealPay\Repositories\Contracts\BabyRepository;
use App\ZealPay\Services\Baby\ShowBaby;
use Illuminate\Support\Facades\Gate;

class ShowBabyController extends Controller
{
    protected BabyRepository $babyRepository;

    public function __construct(BabyRepository $babyRepository)
    {
        $this->babyRepository = $babyRepository;
    }

    public function __invoke($id)
    {
        $baby = $this->babyRepository->findOrFail($id);

        Gate::authorize('show', $baby);

        $baby = (new ShowBaby())->show($id, $this->babyRepository);

        return response()->json(['baby' => $baby]);
    }
}

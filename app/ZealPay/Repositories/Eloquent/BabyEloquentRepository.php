<?php

namespace App\ZealPay\Repositories\Eloquent;

use App\Models\Baby;
use App\ZealPay\Repositories\Contracts\BabyRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BabyEloquentRepository implements BabyRepository
{

    public function findOrFail($id): Baby
    {
        return Baby::findOrFail($id);
    }

    public function create(array $attributes): Baby
    {
        return Baby::create($attributes);
    }

    public function update($id, array $attributes): Baby
    {
        $baby = $this->findOrFail($id);
        $baby->update($attributes);
        return $baby;
    }


    public function where($clause): Builder
    {
        return Baby::where($clause);
    }

    public function all(): Collection
    {
        return Baby::all();
    }

    public function delete($id): ?bool
    {
        return $this->findOrFail($id)->delete();
    }
}

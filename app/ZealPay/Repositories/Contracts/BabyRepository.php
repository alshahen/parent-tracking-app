<?php

namespace App\ZealPay\Repositories\Contracts;

use App\Models\Baby;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

Interface BabyRepository
{
    public function findOrFail($id): Baby;
    public function all(): Collection;
    public function create(array $attributes): Baby;
    public function update($id, array $attributes): Baby;
    public function where($clause): Builder;
    public function delete($id): bool|null;
}

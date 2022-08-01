<?php

namespace App\ZealPay\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\NewAccessToken;

Interface UserRepository
{
    public function findOrFail($id): User;
    public function create(array $attributes): User;
    public function where($clause): Builder;
    public function createToken($id, string $name): NewAccessToken;
    public function getBabies($userId): Model|Collection|Builder|array|null;
    public function createPartner($attributes);
    public function factory(): Factory;
}

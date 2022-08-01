<?php

namespace App\ZealPay\Repositories\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use App\ZealPay\Repositories\Contracts\UserRepository;
use Laravel\Sanctum\NewAccessToken;

class UserEloquentRepository implements UserRepository
{

    public function findOrFail($id): User
    {
        return User::findOrFail($id);
    }

    public function create(array $attributes): User
    {
        return User::create($attributes);
    }

    public function createToken($id, string $name): NewAccessToken
    {
        return $this->findOrFail($id)->createToken($name);
    }


    public function where($clause): Builder
    {
        return User::where($clause);
    }

    public function getBabies($userId): Model|Collection|Builder|array|null
    {
        return User::with('babies','partners.babies:id,name,user_id')->findOrFail($userId);
    }

    public function createPartner($attributes): void
    {
        User::findOrFail($attributes['user_id'])->partners()->syncWithoutDetaching(User::findOrFail($attributes['partner_id']));
    }

    public function factory(): Factory
    {
        return User::factory();
    }
}

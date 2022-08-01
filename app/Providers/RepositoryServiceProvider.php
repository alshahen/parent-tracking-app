<?php

namespace App\Providers;

use App\ZealPay\Repositories\Contracts\BabyRepository;
use App\ZealPay\Repositories\Contracts\UserRepository;
use App\ZealPay\Repositories\Eloquent\BabyEloquentRepository;
use App\ZealPay\Repositories\Eloquent\UserEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, UserEloquentRepository::class);
        $this->app->bind(BabyRepository::class, BabyEloquentRepository::class);
    }
}

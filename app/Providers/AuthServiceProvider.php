<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Baby;
use App\Models\User;
use App\Policies\BabyPolicy;
use App\Policies\PartnerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Baby::class => BabyPolicy::class,
        User::class => PartnerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

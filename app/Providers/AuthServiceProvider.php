<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Http\Policies\OffersPolicy;
use App\Http\Policies\ServicesPolicy;
use App\Http\Policies\UsersPolicy;
use App\Models\Offer;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UsersPolicy::class,
        Service::class => ServicesPolicy::class,
        Offer::class => OffersPolicy::class,
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Owner;
use App\Models\Car;
use App\Policies\CarPolicy;
use App\Policies\OwnerPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Owner::class, OwnerPolicy::class);
        Gate::policy(Car::class, CarPolicy::class);

        Gate::define('changeLanguage', function ($user) {
            return true;
        });

        Gate::define('modifyOwner', function ($user, Owner $owner) {
            if ($user->id == $owner->user_id) {
                return true;
            }

            if ($user->type=='admin') {
                return true;
            }
            return false;
        });

        Gate::define('modifyCar', function ($user, Car $car) {
            if ($user->id == $car->owner->user_id) {
                return true;
            }

            if ($user->type=='admin') {
                return true;
            }
            return false;
        });

        Gate::define('viewCar', function ($user, Car $car) {
            if ($user->id == $car->owner->user_id) {
                return true;
            }

            if ($user->type=='admin' || $user->type=='readonly') {
                return true;
            }
            return false;
        });

        Gate::define('viewOwner', function ($user, Owner $owner) {
            if ($user->id == $owner->user_id) {
                return true;
            }

            if ($user->type=='admin' || $user->type=='readonly') {
                return true;
            }
            return false;
        });
    }
}

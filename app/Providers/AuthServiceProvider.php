<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Discount' => 'App\Policies\DiscountPolicy',
        'App\Models\FoodCategory' => 'App\Policies\FoodCategoryPolicy',
        'App\Models\Restaurnt' => 'App\Policies\RestaurantPolicy',
        'App\Models\Food' => 'App\Policies\FoodPolicy',
        'App\Models\InformationRest' => 'App\Policies\InformationRestaurantPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}

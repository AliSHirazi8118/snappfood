<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FoodCategory;
use App\Models\Restaurnt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('Restaurant_type' , function($attribute , $value , $parameters=[] , ValidationValidator $validator){
            $categories = Restaurnt::get('restaurnt_categories');

            foreach ($categories as $name) {
                $rester[] = $name->restaurnt_categories;
            }
            if (in_array( $value , $rester)) {
                return true;
            }
            return false;
        }, ':attribute is not valid');


        Validator::extend('Restaurant_type_id' , function($attribute , $value , $parameters=[] , ValidationValidator $validator){
            $categories = Restaurnt::get('id');

            foreach ($categories as $name) {
                $rester[] = $name->id;
            }
            if (in_array( $value , $rester)) {
                return true;
            }
            return false;
        }, ':attribute is not valid');


        Validator::extend('Food_type' , function($attribute , $value , $parameters=[] , ValidationValidator $validator){
            $categories = FoodCategory::get('food_categories');
            foreach ($categories as $name) {
                $fooder[] = $name->food_categories;
            }
            if (in_array( $value , $fooder)) {
                return true;
            }
            return false;
        }, ':attribute is not valid');
    }
}

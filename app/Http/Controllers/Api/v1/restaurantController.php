<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\restaurant\getInformationResource;
use App\Http\Resources\Api\v1\restaurant\RestaurantFoodsResource;
use App\Models\Food;
use App\Models\InformationRest;

class RestaurantController extends Controller
{
    public function show($id)
    {
        $data = InformationRest::find($id);

        return new getInformationResource($data);
    }

    public function getRestaurantFoods($id)
    {
        $foods = Food::all()->where('restaurant_id' , $id);

        // return $foods;
        return new RestaurantFoodsResource($foods);

    }
}

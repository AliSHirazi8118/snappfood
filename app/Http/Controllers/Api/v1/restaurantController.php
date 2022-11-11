<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\restaurant\getInformationResource;
use App\Models\InformationRest;
use Illuminate\Http\Request;

class restaurantController extends Controller
{
    public function getRestaurantData($id)
    {
        $data = InformationRest::find($id);

        return response($data);
        // return new getInformationResource($data);

    }
}

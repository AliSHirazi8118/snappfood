<?php

namespace App\Http\Resources\Api\v1\carts;

// use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Food;
use App\Models\InformationRest;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CartResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);


        return[
            'data' => $this->collection->map(function($cart){

                $data_restaurant = InformationRest::where('id' , $cart->restaurant_id)->get();
                foreach ($data_restaurant as $key) {
                    $restaurant_name = $key->rest_name;
                    $restaurant_image = $key->image;
                }

                $data_food = Food::where('id' , $cart->orders)->get();
                foreach ($data_food as $key) {
                    $food_id = $key->id;
                    $food_name = $key->food_name;
                    $food_price = $key->price;
                }



                return [
                    'id' => $cart->id,
                    'restaurant' => [
                        'title' => $restaurant_name,
                        'image' => $restaurant_image,
                    ],
                    'foods' => [
                        'id' => $food_id,
                        'title' => $food_name,
                        // 'count' =>
                        'price' => $food_price,
                    ],
                    'created_at' => $cart->created_at,
                    'updated_at' => $cart->updated_at,
                ];
            }),
        ];
    }
}

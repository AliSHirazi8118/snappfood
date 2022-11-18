<?php

namespace App\Http\Resources\Api\v1\restaurant;

// use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RestaurantFoodsResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // foreach ($data as $key) {
        //     $address = $key->address;
        //     $latitude = $key->latitude;
        //     $longitude = $key->longitude;
        // }

        return [
            'categories'=> $this->collection->map(function($food){
                        return [
                            'id' => $food->food_cat_id,
                            'title' => $food->food_cat,
                            'food' => [
                                'id' => $food->id,
                                'title' => $food->food_name,
                                'price' => $food->price,
                                'raw_material' => $food->material,
                                'image' => $food->image
                            ]
                        ];
                    }),
        ];
    }
}

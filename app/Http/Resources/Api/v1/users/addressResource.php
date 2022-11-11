<?php

namespace App\Http\Resources\Api\v1\users;

// use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class addressResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'data' => $this->collection->map(function($address){
                return [
                    'id' => $address->id,
                    'title' => $address->title,
                    'latitude' => $address->latitude,
                ];
            }),
        ];
    }
}

<?php

namespace App\Http\Resources\Api\v1\restaurant;

use Illuminate\Http\Resources\Json\ResourceCollection;

class getInformationResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($information){
                return [
                    'id' => $information->id,
                    'title' => $information->title,
                    'latitude' => $information->latitude,
                ];
            }),
        ];
    }
}

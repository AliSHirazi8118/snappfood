<?php

namespace App\Http\Resources\Api\v1\auth;

use Illuminate\Http\Resources\Json\JsonResource;
// use Illuminate\Http\Resources\Json\ResourceCollection;

class registerResource extends JsonResource
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

            'name' => $this->name,
            'email' => $this->email,
            

            // 'data' => $this->collection->map(function($user){
            //     return [
            //         'id' => $user->id,
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         // 'token' => $token,
            //     ];
            // }),
        ];
    }
}

<?php

namespace App\Http\Resources\Api\v1\restaurant;

use App\Models\Address;
use Illuminate\Http\Resources\Json\JsonResource;
// use Illuminate\Http\Resources\Json\ResourceCollection;

class getInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $data = Address::where('user_id' , $this->seller_id)->get();
        foreach ($data as $key) {
            $address = $key->address;
            $latitude = $key->latitude;
            $longitude = $key->longitude;
        }

        $times = explode( ' ' , $this->work_times);
        
        return [

            'id' => $this->id,
            'title' => $this->rest_name,
            'type' => $this->rest_type,
            'address' => [
                'address' => $address,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ],
            'is_open' => ($this->state == 'open') ? true : false ,
            'image' => $this->image,
            'score' => 4.1,
            'comments_count' => 125,
            "schedule" => [
                "saturday" => [
                  "start" => $times[0],
                  "end" => $times[1]
                ],
                "sunday"=> [
                  "start" => $times[2],
                  "end" => $times[3]
                ],
                "monday" => [
                  "start" => $times[4],
                  "end" => $times[5]
                ],
                "thusday" => [
                  "start" => $times[6],
                  "end" => $times[7]
                ],
                "wednesday" => [
                  "start" => $times[8],
                  "end" => $times[9]
                ],
                "thursday" => [
                  "start" => $times[10],
                  "end" => $times[11]
                ],
                "friday"=> [
                    "start" => $times[12],
                    "end" => $times[13]
                  ],
            ]
        ];
    }
}

<?php

namespace App\Resources\Events;
use Illuminate\Http\Resources\Json\JsonResource;

class ListEventsLocationsResource extends JsonResource
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

            'location_name' => $this->location_name,
//            'date_time' => $this->date_time,

//            'weather' => (is_null($this->weather)) ? [] : json_decode($this->weather)
        ];
    }



}

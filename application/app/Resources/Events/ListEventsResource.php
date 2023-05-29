<?php

namespace App\Resources\Events;

use Illuminate\Http\Resources\Json\JsonResource;

class ListEventsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [];
    }


}

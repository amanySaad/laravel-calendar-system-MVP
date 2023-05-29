<?php

namespace App\Resources\Events;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $basic = [
            'id' => $this->id,
            'location_name' => $this->location_name,
            'date_time' => $this->date_time,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'invitees' => (is_null($this->invitees)) ? [] : json_decode($this->invitees),
        ];
        $extra = (is_null($this->extra_fields)) ? [] : json_decode($this->extra_fields);
        return array_merge($basic,(array) $extra);
    }


}

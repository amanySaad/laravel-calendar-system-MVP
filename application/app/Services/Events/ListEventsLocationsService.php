<?php

namespace App\Services\Events;

use App\Resources\Events\ListEventsLocationsResource;
use App\Traits\Response;
use Carbon\Carbon;

class ListEventsLocationsService
{
    use Response;

    public function handle($request, $model)
    {

        try {
            $filters = [];
            $specific_date = null;
            if($request->has('date')){
                $specific_date = Carbon::parse($request->date)->format('Y-m-d');
            }
            $events = $model->getLocations('location_name', $specific_date);
            return $this->success(ListEventsLocationsResource::collection($events))->updated();

        } catch (\Exception $exception) {
            return $this->error()->server();
        }


    }


}

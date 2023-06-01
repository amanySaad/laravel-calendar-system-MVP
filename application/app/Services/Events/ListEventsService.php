<?php

namespace App\Services\Events;

use App\Resources\Events\ListEventsResource;
use App\Traits\Response;
use Carbon\Carbon;

class ListEventsService
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
            $events = $model->paginateByCriteria($filters,['*'],['user'],'id', $specific_date);
            return $this->success(ListEventsResource::collection($events))->pagination($events);

        } catch (\Exception $exception) {
            return $this->error()->server();
        }


    }


}

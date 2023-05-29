<?php

namespace App\Services\Events;

use App\Resources\Events\ListEventsResource;
use App\Traits\Response;

class StoreEventService
{
    use Response;

    public function handle($request, $model){
        try{
            $event = $model->create($request->all());
            return $this->success(ListEventsResource::collection($event));
        }catch (\Exception $exception){
            return $this->error()->server();
        }

    }

}

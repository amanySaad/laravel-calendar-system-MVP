<?php

namespace App\Services\Events;

use App\Resources\Events\ShowEventResource;
use App\Traits\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowEventService
{
    use Response;

    public function handle($event)
    {
        if($this->checkAuthorization($event)){
//            try {
                return $this->success(new ShowEventResource($event))->updated();
//            } catch (\Exception $exception) {
//                DB::rollBack();
//                return $this->error()->server();
//            }
        }else{
            return $this->error()->forbidden();
        }

    }

    public function checkAuthorization($event){
        if($event->user_id != Auth::user()->id){
            return false;
        }
        return true;
    }

}

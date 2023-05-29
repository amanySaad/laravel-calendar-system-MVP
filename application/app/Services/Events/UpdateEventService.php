<?php

namespace App\Services\Events;

use App\Resources\Events\ShowEventResource;
use App\Traits\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateEventService
{
    use Response;

    public function handle($request, $event)
    {
        if($this->checkAuthorization($event)){
            DB::beginTransaction();
            try {
                $inputs = $this->prepareRequestInputs($request);
                $event->update($inputs);
                DB::commit();
                return $this->success(new ShowEventResource($event))->updated();
            } catch (\Exception $exception) {
                DB::rollBack();
                return $this->error()->server();
            }
        }else{
            return $this->error()->forbidden();
        }

    }

    public function prepareRequestInputs($request)
    {
        $inputs = $request->only(["location_name", "latitude", "longitude"]);
        $inputs['date_time'] = Carbon::parse($request->date_time)->format('Y-m-d H:i');;
        $inputs['invitees'] = $request->has('invitees') ? json_encode($request->invitees) : null;
        $inputs['extra_fields'] = json_encode($request->except(["date_time", "location_name", "latitude", "longitude", "invitees"]));
        return $inputs;
    }

    public function checkAuthorization($event){
        if($event->user_id != Auth::user()->id){
            return false;
        }
        return true;
    }

}

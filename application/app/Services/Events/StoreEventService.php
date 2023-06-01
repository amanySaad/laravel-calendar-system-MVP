<?php

namespace App\Services\Events;

use App\Adapters\Weather\WeatherProviderInterface;
use App\Resources\Events\ListEventsResource;
use App\Resources\Events\ShowEventResource;
use App\Traits\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreEventService
{
    use Response;
    protected WeatherProviderInterface $weather;

    public function __construct( WeatherProviderInterface $weather){
        $this->weather=$weather;
    }

    public function handle($request, $model)
    {
        DB::beginTransaction();
        try {
            $inputs = $this->prepareRequestInputs($request);

            $event = $model->create($inputs);
            DB::commit();
            return $this->success(new ListEventsResource($event))->created();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->error()->server();
        }

    }

    public function prepareRequestInputs($request)
    {
        $inputs = $request->only(["location_name", "latitude", "longitude"]);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['date_time'] = Carbon::parse($request->date_time)->format('Y-m-d H:i');
        $inputs['invitees'] = $request->has('invitees') ? json_encode($request->invitees) : null;
        $inputs['extra_fields'] = json_encode($request->except(["date_time", "location_name", "latitude", "longitude", "invitees"]));
        $weather_data = $this->weather->currentWeather($request->latitude,$request->longitude,strtotime($request->date_time));
        $inputs['weather']= (!is_null($weather_data))?json_encode($weather_data->allToArray()) : null;
        return $inputs;
    }

}

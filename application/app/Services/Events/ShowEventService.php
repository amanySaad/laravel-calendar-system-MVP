<?php

namespace App\Services\Events;

use App\Adapters\Weather\WeatherProviderInterface;
use App\Resources\Events\ShowEventResource;
use App\Traits\Response;
use Illuminate\Support\Facades\Auth;

class ShowEventService
{
    use Response;
    protected WeatherProviderInterface $weather;

    public function __construct( WeatherProviderInterface $weather){
        $this->weather=$weather;
    }


    public function handle($event)
    {
        if($this->checkAuthorization($event)){
            try {
               $event['weather']=$this->weather->currentWeather($event->latitude,$event->longitude,strtotime($event->date_time));
                return $this->success(new ShowEventResource($event))->updated();
            } catch (\Exception $exception) {
                return $this->error()->server();
            }
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

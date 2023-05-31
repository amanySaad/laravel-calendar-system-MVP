<?php

namespace App\Services\Weather;

use App\Adapters\Weather\WeatherProviderInterface;

class FetchWeatherService
{
    protected WeatherProviderInterface $weather;

    public function __construct( WeatherProviderInterface $weather){
        $this->weather=$weather;
    }


    public function handle($lat, $long){
      return $this->weather->currentWeather($lat, $long);
    }


}

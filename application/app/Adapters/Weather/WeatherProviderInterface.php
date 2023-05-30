<?php

namespace App\Adapters\Weather;

use InvalidArgumentException;

interface WeatherProviderInterface
{
    /**
     * @param float $lat
     * @param float $lon
     * @return WeatherDataDTO|null
     * @throws InvalidArgumentException
     */
    public function currentWeather(float $lat, float $lon): ?WeatherDataDTO;
}

<?php

namespace App\Helpers;

use App\Models\Employee;
use Illuminate\Support\Arr;
use App\Enums\AssessmentType;
use Illuminate\Support\Facades\Auth;
use Dnsimmons\OpenWeather\OpenWeather;

class Util {
   static public function get_weather_condition()
    {
        $user = Auth::user();
        $weather = new OpenWeather();
        $current = $weather->getCurrentWeatherByCityName($user->city);

        $weather = NULL;
        $weather['condition'] = Arr::get($current, 'condition.name');
        $weather['condition_desc'] = Arr::get($current, 'condition.desc');
        $weather['condition_icon'] = Arr::get($current, 'condition.icon');
        $weather['temperature'] = Arr::get($current, 'forecast.temp');
        $weather['pressure'] = Arr::get($current, 'forecast.pressure');
        $weather['humidity'] = Arr::get($current, 'forecast.humidity');
        return $weather;
    }
       
    
}
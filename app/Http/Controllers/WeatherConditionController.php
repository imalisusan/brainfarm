<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dnsimmons\OpenWeather\OpenWeather;

class WeatherConditionController extends Controller
{
    public function index(Request $request)
    {
        $weather = new OpenWeather();
        $current = $weather->getCurrentWeatherByCityName('Nairobi');

        $weather = NULL;
        $weather['condition'] = Arr::get($current, 'condition.name');
        $weather['condition_desc'] = Arr::get($current, 'condition.desc');
        $weather['condition_icon'] = Arr::get($current, 'condition.icon');
        $weather['temperature'] = Arr::get($current, 'forecast.temp');
        $weather['pressure'] = Arr::get($current, 'forecast.pressure');
        $weather['humidity'] = Arr::get($current, 'forecast.humidity');
        dd($weather);

        return view('dashboard');
    }
}

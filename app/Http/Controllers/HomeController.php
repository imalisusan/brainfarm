<?php

namespace App\Http\Controllers;

use App\Helpers\Util;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Dnsimmons\OpenWeather\OpenWeather;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $weather = Util::get_weather_condition();
        $weather = (object)$weather;
        $url = $weather->condition_icon;
      //  dd($weather);
        return view('dashboard', compact('weather', 'url') );
    }
}

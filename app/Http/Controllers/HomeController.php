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
        Util::get_weather_condition();
        return view('dashboard');
    }
}

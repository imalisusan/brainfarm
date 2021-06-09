<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dnsimmons\OpenWeather\OpenWeather;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $weather = new OpenWeather();
        $current = $weather->getCurrentWeatherByPostal('02111');
        print_r($current);
        return view('dashboard');
    }
}

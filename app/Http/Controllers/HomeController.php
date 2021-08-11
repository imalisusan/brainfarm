<?php

namespace App\Http\Controllers;

use App\Helpers\Util;
use App\Models\Farmer;
use App\Models\Income;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dnsimmons\OpenWeather\OpenWeather;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $weather = Util::get_weather_condition();
        $weather = (object)$weather;
        $url = $weather->condition_icon;

        $farmer = Farmer::where('user_id', 1)->first();
        dd($farmer);

        $income = Income::where('farmer_id', $farmer->id)->latest('created_at')->first();

        dd($income);

        return view('dashboard', compact('weather', 'url') );
    }
}

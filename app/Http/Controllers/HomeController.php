<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use App\Helpers\Util;
use App\Models\Farmer;
use App\Models\Income;
use App\Models\Expenditure;
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

        $farmer = Farmer::where('user_id', Auth::user()->id)->first();
 
        $latest_income = Income::where('farmer_id', $farmer->id)->latest()->first();
        $latest_expenditure = Expenditure::where('farmer_id', $farmer->id)->latest()->first();

        $income_sum = Income::where('farmer_id', $farmer->id)->sum('amount');
        $expenditure_sum = Expenditure::where('farmer_id', $farmer->id)->sum('amount');

        $difference = $income_sum - $expenditure_sum;
        if($difference > 0)
        {
            $profit = $difference;
            $loss = NULL;
        }
        else
        {
            $loss = $difference;
            $profit = NULL;
        }
        if($difference)
        {
            $margin = ($difference/($income_sum + $expenditure_sum)) *100;
            $margin = round($margin, 2);
        }
        else
        {
            $margin = NULL;
        }

        $tip = Tip::all()->random();

        if($farmer->status == "Pending" || $farmer->status == "Suspended" )
        {
            return view('errors.pending');
        }
        else
        {
            return view('dashboard', compact('weather', 'url', 'latest_income', 'latest_expenditure', 'profit', 'loss', 'margin', 'tip') );
        }
       
    }
}

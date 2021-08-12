<?php

namespace App\Helpers;

use App\Models\Farmer;
use App\Models\Income;
use App\Models\Employee;
use App\Models\Expenditure;
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
        //dd($weather);
        return $weather;
    }
      
    
    static public function get_stats_analysis(Farmer $farmer)
    {
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
    }
    
}
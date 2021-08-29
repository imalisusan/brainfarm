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
        $user = Auth::user();
        if ($user->hasRole(['admin'])) 
        {
        
            $weather = Util::get_weather_condition();
            $weather = (object)$weather;
            $url = $weather->condition_icon;
            $weather->temperature =  ($weather->temperature - 32) * .5556;
            $weather->temperature =  round( $weather->temperature, 2);

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
    else
    {
        $weather = Util::get_weather_condition();
        $weather = (object)$weather;
        $url = $weather->condition_icon;
        $weather->temperature =  ($weather->temperature - 32) * .5556;
        $weather->temperature =  round( $weather->temperature, 2);

        $tip = Tip::all()->random();

        $farmers = Farmer::all();
        $total_farmers = count($farmers);

        $pending_farmers = Farmer::where('status', "Pending")->count();
        //$total_pending_farmers = count($pending_farmers);

        $suspended_accounts = Farmer::where('status', "Suspended")->count();
       // $total_suspended_accounts = count($suspended_accounts);

        return view('admin-dashboard', compact('weather', 'url', 'tip', 'total_farmers', 'pending_farmers', 'suspended_accounts'));
    }
}

}
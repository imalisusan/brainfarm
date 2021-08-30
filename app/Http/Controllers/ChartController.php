<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\User;
use App\Models\Farmer;
use App\Models\Income;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function users(Request $request)
    {
        $users = User::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');

        return view('charts.users', compact('users'));
    }
    
    public function crops(Request $request)
    {
        $crop_prices = Crop::all()->pluck('average_market_price');
        $crop_kgs = Crop::all()->pluck('amount_in_kgs');

        $names = Crop::all()->pluck('name');

        return view('charts.crops', compact('crop_prices', 'names', 'crop_kgs'));
    }

    public function income(Request $request)
    {
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();

        $incomes = Income::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();
        
        $amount = Income::where('farmer_id', $farmer->id)->pluck('amount');
     //   $names = Income::where('farmer_id', $farmer->id)->pluck('name');

        return view('charts.income', compact('amount', 'incomes'));
    }

    public function expenditure(Request $request)
    {
        $expenditures = Expenditure::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');

        $farmer = Farmer::where('user_id', Auth::user()->id)->first();

        $amount = Expenditure::where('farmer_id', $farmer->id)->pluck('amount');
       // $names = Expenditure::where('farmer_id', $farmer->id)->pluck('name');

        return view('charts.expenditure', compact('amount', 'expenditures'));
    }

    public function profit(Request $request)
    {
        $incomes = Income::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');

        $expenditures = Expenditure::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');

        $farmer = Farmer::where('user_id', Auth::user()->id)->first();

        $income_amount = Income::where('farmer_id', $farmer->id)->pluck('amount');
        $income_date = Income::where('farmer_id', $farmer->id)->pluck('date');

        $expenditure_amount = Expenditure::where('farmer_id', $farmer->id)->pluck('amount');
        $expenditure_date = Expenditure::where('farmer_id', $farmer->id)->pluck('date');

        return view('charts.profit', compact('income_amount', 'expenditure_amount', 'incomes', 'income_date', 'expenditure_date'));
    }

    /*
       
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
     **/

}

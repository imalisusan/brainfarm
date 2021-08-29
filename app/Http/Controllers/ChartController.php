<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\User;
use App\Models\Income;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $names = Crop::all()->pluck('name');

        return view('charts.crops', compact('crop_prices', 'names'));
    }

    public function income(Request $request)
    {
        $incomes = Income::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');
        
        $amount = Income::all()->pluck('amount');
        $names = Income::all()->pluck('name');

        return view('charts.income', compact('amount', 'names', 'incomes'));
    }

    public function expenditure(Request $request)
    {
        $expenditures = Income::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');

        $amount = Expenditure::all()->pluck('amount');
        $names = Expenditure::all()->pluck('name');

        return view('charts.expenditure', compact('amount', 'names', 'expenditures'));
    }

}

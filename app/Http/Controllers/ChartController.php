<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\User;
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
        $crops = Crop::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');

        $crop_names = Crop::all()->pluck('name');
        $crop_names = (array)$crop_names;
        //dd($crop_names);


        return view('charts.crops', compact('crops', 'crop_names'));
    }

}

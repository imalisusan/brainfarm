<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Helpers\Util;
use App\Models\Farmer;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\CropSuggestion;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Dnsimmons\OpenWeather\OpenWeather;


class CropSuggestionController extends Controller
{
    public function index(Request $request)
    {
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();
        $weather = Util::get_weather_condition();
        $weather = (object)$weather;
        $weather->temperature =  ($weather->temperature - 32) * .5556;
        $weather->temperature =  round( $weather->temperature, 2);
        
        $farmer->temperature = $weather->temperature;
        $farmer->pressure = $weather->pressure;
        $farmer->humidity = $weather->humidity;
        $crops = Crop::all();
        foreach($crops as  $crop)
        {
            //check if temp is in range
            if(($crop->lowest_temperature <= $farmer->temperature)  && ($farmer->temperature <= $crop->highest_temperature))
            {
                $temperature = 0;
            }
            else
            {
                $temperature = 1;
            }
             //check if humidity is in range
             if(($crop->lowest_humidity <= $farmer->humidity)  && ($farmer->humidity <= $crop->highest_humidity))
             {
                $humidity = 0;
             }
             else
             {
                $humidity = 1;
             }
              // if all conditions are satisifed, save the suggestion
              if($humidity== 0 && $temperature == 0)
              {
                  $crop_suggestion = CropSuggestion::where([
                      'farmer_id' => $farmer->id,
                      'crop_id' => $crop->id
                      ])->first();
                      if($crop_suggestion == NULL)
                      {
                        $suggestion = new CropSuggestion();  
                        $suggestion->farmer_id = $farmer->id;
                        $suggestion->crop_id = $crop->id;
                        $suggestion->save();
                      }
              }
              else
              {
                  
              }
        }
        $cropsuggestions = CropSuggestion::where('farmer_id', $farmer->id)->get();
       // dd($cropsuggestions);

        return view('cropsuggestions.index', compact('cropsuggestions'));
    }

}

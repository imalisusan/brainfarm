<?php

namespace App\Http\Controllers;
use App\Models\Crop;
use Dnsimmons\OpenWeather\OpenWeather;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class FarmerSuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $weather = new OpenWeather();
        $current = $weather->getCurrentWeatherByCityName('Nairobi');

        $weather = NULL;
        $temperature = $weather['temperature'] = Arr::get($current, 'forecast.temp');
        foreach (Crop::all() as $crops) 
        {
            if ($temperature >= $crops->lowest_temperarure && $temperature <= $crops->highest_temperature)
            {
                $crops = Crop::all();
                
            }
            else
            {
                
            }
            
        }
        return view('farmersuggestions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

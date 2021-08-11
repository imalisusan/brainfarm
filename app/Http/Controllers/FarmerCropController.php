<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Farmer;
use App\Models\FarmerCrop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFarmerCropRequest;

class FarmerCropController extends Controller
{
    public function index(Request $request)
    {
        $farmercrops = FarmerCrop::latest()->paginate(20);

        return view('farmercrops.index', compact('farmercrops'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $crops = Crop::all();
        return view('farmercrops.create', compact('crops'));
    }

    public function store(StoreFarmerCropRequest $request)
    {
        $validated = $request->validated();
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();
        $validated['farmer_id'] = $farmer->id;
        FarmerCrop::create($validated);

        return redirect()->route('farmercrops.index')->with('success','FarmerCrop created successfully.');
    }

    public function show(Request $request, FarmerCrop $farmercrop)
    {
        return view('farmercrops.show', compact('farmercrop'));
    } 
     
    public function edit(FarmerCrop $farmercrop)
    {
        return view('farmercrops.edit',compact('farmercrop'));
    }


    public function update(StoreFarmerCropRequest $request, FarmerCrop $farmercrop)
    {
        $farmercrop->update($request->validated());
        return redirect()->route('farmercrops.show', $farmercrop->id)->with('success','FarmerCrop updated successfully');
    }

    public function destroy(FarmerCrop $farmercrop)
    {
        $farmercrop->delete();

        return redirect()->route('farmercrops.index')->with('success','FarmerCrop deleted successfully');
    }
}

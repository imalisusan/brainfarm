<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCropRequest;

class CropController extends Controller
{
    public function index(Request $request)
    {
        $crops = Crop::latest()->paginate(20);

        return view('crops.index', compact('crops'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('crops.create');
    }

    public function store(StoreCropRequest $request)
    {
        $validated = $request->validated();
        Crop::create($validated);

        return redirect()->route('crops.index')->with('success','Crop created successfully.');
    }

    public function show(Request $request, Crop $crop)
    {
        return view('crops.show', compact('crop'));
    } 
     
    public function edit(Crop $crop)
    {
        return view('crops.edit',compact('crop'));
    }


    public function update(StoreCropRequest $request, Crop $crop)
    {
        $crop->update($request->validated());
        return redirect()->route('crops.show', $crop->id)->with('success','Crop updated successfully');
    }

    public function destroy(Crop $crop)
    {
        $crop->delete();

        return redirect()->route('crops.index')->with('success','Crop deleted successfully');
    }
}

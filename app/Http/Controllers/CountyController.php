<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountyRequest;

class CountyController extends Controller
{
    public function index(Request $request)
    {
        $counties = County::latest()->paginate(20);
        return view('counties.index', compact('counties'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('counties.create');
    }

    public function store(StoreCountyRequest $request)
    {
        $validated = $request->validated();
     
        County::create($validated);

        return redirect()->route('counties.index')->with('success','County created successfully.');
    }

    public function show(Request $request, County $county)
    {
        return view('counties.show', compact('county'));
    } 
     
    public function edit(County $county)
    {
        return view('counties.edit',compact('county'));
    }


    public function update(StoreCountyRequest $request, County $county)
    {
        $county->update($request->validated());
        return redirect()->route('counties.show', $county->id)->with('success','County updated successfully');
    }

    public function destroy(County $county)
    {
        $county->delete();
        return redirect()->route('counties.index')->with('success','County deleted successfully');
    }
}

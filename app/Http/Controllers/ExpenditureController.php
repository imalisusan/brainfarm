<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreExpenditureRequest;

class ExpenditureController extends Controller
{
    public function index(Request $request)
    {
        $expenditures = Expenditure::latest()->paginate(20);

        return view('expenditures.index', compact('expenditures'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('expenditures.create');
    }

    public function store(StoreExpenditureRequest $request)
    {
        $validated = $request->validated();
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();
        $validated['farmer_id'] = $farmer->id;
        Expenditure::create($validated);

        return redirect()->route('incomes.index')->with('success','Expenditure created successfully.');
    }

    public function show(Request $request, Expenditure $expenditure)
    {
        return view('expenditures.show', compact('expenditure'));
    } 
     
    public function edit(Expenditure $expenditure)
    {
        return view('expenditures.edit',compact('expenditure'));
    }


    public function update(StoreExpenditureRequest $request, Expenditure $expenditure)
    {
        $expenditure->update($request->validated());
        return redirect()->route('expenditures.show', $expenditure->id)->with('success','Expenditure updated successfully');
    }

    public function destroy(Expenditure $expenditure)
    {
        $expenditure->delete();

        return redirect()->route('expenditures.index')->with('success','Expenditure deleted successfully');
    }
}

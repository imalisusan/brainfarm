<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIncomeRequest;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $incomes = Income::latest()->paginate(20);

        return view('incomes.index', compact('incomes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(StoreIncomeRequest $request)
    {
        $validated = $request->validated();
        $farmer = Farmer::where('user_id', Auth::user()->id)->first();
        $validated['farmer_id'] = $farmer->id;
        Income::create($validated);

        return redirect()->route('incomes.index')->with('success','Income created successfully.');
    }

    public function show(Request $request, Income $income)
    {
        return view('incomes.show', compact('income'));
    } 
     
    public function edit(Income $income)
    {
        return view('incomes.edit',compact('income'));
    }


    public function update(StoreIncomeRequest $request, Income $income)
    {
        $income->update($request->validated());
        return redirect()->route('incomes.show', $income->id)->with('success','Income updated successfully');
    }

    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()->route('incomes.index')->with('success','Income deleted successfully');
    }
}

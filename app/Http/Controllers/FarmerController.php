<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Farmer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreFarmerRequest;
use Illuminate\Auth\Notifications\ResetPassword;

class FarmerController extends Controller
{
    public function index(Request $request)
    {
        $farmers = Farmer::latest()->paginate(20);

        return view('farmers.index', compact('farmers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function pending_accounts(Request $request)
    {
        $farmers = Farmer::latest()->paginate(20);

        return view('farmers.pending', compact('farmers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('farmers.create');
    }

    public function store(StoreFarmerRequest $request)
    {
        $validated = $request->validated();
        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;

        $saved = User::where('email', $validated['email'])->first();
        if ($saved != null) {
            $validated['user_id'] = $saved->id;
            $farmer = Farmer::create($validated);
            $saved->attachRole('farmer');
        } else {
            $validated['password'] = Hash::make(Str::random());
            $user = User::create($validated);
            $user->attachRole('farmer');

            $validated['user_id'] = $user->id;
            Farmer::create($validated);

           // Mail::to($user->email)->send(new ResetPassword($user));
        }


        return redirect()->route('farmers.index')->with('success','Farmer created successfully.');
    }

    public function show(Request $request, Farmer $farmer)
    {
        return view('farmers.show', compact('farmer'));
    } 
     
    public function edit(Farmer $farmer)
    {
        return view('farmers.edit',compact('farmer'));
    }


    public function update(StoreFarmerRequest $request, Farmer $farmer)
    {
        $farmer->update($request->validated());
        return redirect()->route('farmers.show', $farmer->id)->with('success','Farmer updated successfully');
    }

    public function destroy(Farmer $farmer)
    {
        $farmer->delete();

        return redirect()->route('farmers.index')->with('success','Farmer deleted successfully');
    }

    public function approve_farmer(Request $request, Farmer $farmer)
    {
        $validated = $farmer;
        $validated['status'] = "Approved";
        $farmer->update((array) $validated);

        return redirect()->route('farmers.pending',compact('farmer'))->with('success','Farmer approved successfully');
    }
}

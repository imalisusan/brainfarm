<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Farmer;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\AccountApproved;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewResetPasswordRequest;
use App\Http\Requests\StoreFarmerRequest;

class FarmerController extends Controller
{
    public function index(Request $request)
    {
        $farmers = Farmer::latest()->paginate(20);

        return view('farmers.index', compact('farmers'));
    }

    public function pending_accounts(Request $request)
    {
        return view('farmers.pending');
    }

    public function suspended_accounts(Request $request)
    {
        return view('farmers.suspended');
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

            Mail::to($user->email)->send(new ResetPassword($user));
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

        $user = User::find($farmer->user_id);
        Mail::to($user->email)->send(new AccountApproved($user));

        return redirect()->route('farmers.pending',compact('farmer'))->with('success','Farmer approved successfully');
    }

    public function suspend_farmer(Request $request, Farmer $farmer)
    {
        $validated = $farmer;
        $validated['status'] = "Suspended";
        $farmer->update((array) $validated);

        return redirect()->route('farmers.index',compact('farmer'))->with('success','Farmer account suspended successfully');
    }

    public function reset_password_farmer(Request $request, Farmer $farmer)
    {
        $validated = $farmer;

        $user = User::find($farmer->user_id);

        Mail::to($user->email)->send(new NewResetPasswordRequest($user));

        return redirect()->route('farmers.index')->with('success','Password reset email sent successfully');
    }
}

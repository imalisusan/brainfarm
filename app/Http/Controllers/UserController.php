<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->paginate(20);

        return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;

        $saved = User::where('email', $validated['email'])->first();
        if ($saved != null) {
            $validated['user_id'] = $saved->id;
            $user = User::create($validated);
            $saved->attachRole('farmer');
        } else {
            $validated['password'] = Hash::make(Str::random());
            $user = User::create($validated);
            $user->attachRole('farmer');

            Mail::to($user->email)->send(new ResetPassword($user));
        }


        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    public function show(Request $request, User $user)
    {
        return view('users.show', compact('user'));
    } 
     
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }


    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.show', $user->id)->with('success','User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}

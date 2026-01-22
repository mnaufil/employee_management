<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }


    public function update(Request $request){
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => [
                'required','string','max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => ['required','email',
                    Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($validatedData);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function changePasswordForm(Request $request){
        return view('profile.change-password');
    }

    public function changePassword(Request $request){

        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        //here we are checking by hash::check whether the password entered are same or not
        if(!Hash::check($request->current_password, $user->password)){
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/profile')->with('success', 'Passord updated successfully');

    }


}

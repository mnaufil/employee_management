<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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

}

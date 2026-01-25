<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:4|max:255|unique:users,name',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ],
            [
                // Custom messages
                'name.required' => 'Name is required.',
                'name.min' => 'Name must be at least 5 characters.',
                'name.unique' => 'Name already taken.',

                'email.required' => 'Email is required.',
                'email.email' => 'Enter a valid email address.',
                'email.unique' => 'Email already registered.',

                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 6 characters.',
                'password.confirmed' => 'Passwords do not match.',
            ]
        );

        //check if this name, email already exists
        $existingUser = User::where('email', $request->email)->first();
        
        if ($existingUser) {
            return back()->withErrors(['email' => 'Email already in use'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        // Send verification email
        $user->sendEmailVerificationNotification();

        return redirect('/dashboard');
    }

}

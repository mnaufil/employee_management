<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(Request $request){

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if(Auth::attempt($credentials)){
                
                // Regenerate session ID after login to prevent session fixation attacks
                $request->session()->regenerate();

                //intended means to redirect to the page the 
                //user wanted to access before being redirected to login
                return redirect()->intended('/dashboard')->with('success', 'You are logged in!');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
    }
}

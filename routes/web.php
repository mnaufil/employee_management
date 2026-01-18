<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;

Route::middleware('web')->group(function () {
    
    Route::get('/test-session', function () {
        session()->flash('success', 'Session is working!');
        return redirect('/');
    });
    
    Route::get('/', function () {
        return view('welcome');
    });

    Route::view('/login', 'auth.login')->name('login');
    Route::get('/login', [LoginController::class, 'show'])->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

    Route::view('/register', 'auth.register')->name('register');
    Route::get('/register', [RegisterController::class, 'show'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');

    Route::middleware('auth')->group(function () {
        Route::view('/dashboard', 'dashboard')->middleware('auth');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


    });

    Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');
});
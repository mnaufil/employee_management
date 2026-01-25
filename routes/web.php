<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    Route::post('/login', [LoginController::class, 'login'])
            ->middleware(['guest', 'throttle:5,1'])
            ->name('login');

    Route::view('/register', 'auth.register')->name('register');
    Route::get('/register', [RegisterController::class, 'show'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');
    Route::get('/email/verify', function(){
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
        $request->fulfill();
        
        return redirect('/dashboard')->with('success', 'Email verified successfully');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    // Resend verification email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification email sent');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    Route::middleware('auth')->group(function () {
        Route::view('/dashboard', 'dashboard')->middleware('auth');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/change-password', [ProfileController::class, 'changePasswordForm']);
        Route::post('/profile/change-password', [ProfileController::class, 'changePassword']);
        Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto']);
    });

    Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');
});
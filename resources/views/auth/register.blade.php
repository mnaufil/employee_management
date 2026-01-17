@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h2 class="text-xl font-bold mb-4">Register</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-4">
        <label>Name</label>
        <input type="text" name="name" class="w-full border p-2 rounded @error('name') border-red-500 @enderror" value="{{ old('name') }}">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label>Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded @error('email') border-red-500 @enderror" value="{{ old('email') }}">

        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label>Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded @error('password') border-red-500 @enderror">

        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
    </div>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            Please fix the errors above and try again.
        </div>
    @endif
    
    <button class="w-full bg-green-600 text-white py-2 rounded">
        Register
    </button>
</form>
@endsection

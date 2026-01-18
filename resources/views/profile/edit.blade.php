@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Profile</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-4">
        Please fix the errors below.
    </div>
@endif

<form method="POST" action="/profile/update">
    @csrf

    <div class="mb-4">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
        @error('name')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        @error('email')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">
        Update Profile
    </button>
</form>
@endsection
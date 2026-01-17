@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h2 class="text-xl font-bold mb-4">Register</h2>

<form method="POST">
    @csrf

    <div class="mb-4">
        <label>Name</label>
        <input type="text" class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label>Email</label>
        <input type="email" class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label>Password</label>
        <input type="password" class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label>Confirm Password</label>
        <input type="password" class="w-full border p-2 rounded">
    </div>

    <button class="w-full bg-green-600 text-white py-2 rounded">
        Register
    </button>
</form>
@endsection

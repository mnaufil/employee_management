@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-6">Change Password</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        Please fix the errors below.
    </div>
@endif

<form method="POST" action="/profile/change-password" class="space-y-6">
    @csrf

    {{-- Current Password --}}
    <div>
        <label class="block text-sm font-medium mb-1">Current Password</label>
        <input
            type="password"
            name="current_password"
            class="w-full border rounded-md px-3 py-2
                   @error('current_password') border-red-500 @enderror"
        >
        @error('current_password')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- New Password --}}
    <div>
        <label class="block text-sm font-medium mb-1">New Password</label>
        <input
            type="password"
            name="password"
            class="w-full border rounded-md px-3 py-2
                   @error('password') border-red-500 @enderror"
        >
        @error('password')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Confirm Password --}}
    <div>
        <label class="block text-sm font-medium mb-1">Confirm New Password</label>
        <input
            type="password"
            name="password_confirmation"
            class="w-full border rounded-md px-3 py-2"
        >
    </div>

    <button
        type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md
               hover:bg-blue-700 transition"
    >
        Update Password
    </button>
</form>
@endsection

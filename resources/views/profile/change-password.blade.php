@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<h2 class="text-2xl font-semibold text-slate-900 mb-6">
    Change Password
</h2>

@if ($errors->any())
    <div class="mb-4 rounded-md bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
        Please fix the errors below.
    </div>
@endif

<form method="POST" action="/profile/change-password" class="space-y-6">
    @csrf

    {{-- Current Password --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Current Password
        </label>
        <input
            type="password"
            name="current_password"
            class="w-full rounded-md border border-slate-300 px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500
                   focus:border-blue-500
                   @error('current_password') border-red-500 focus:ring-red-500 @enderror"
            placeholder="••••••••"
        >
        @error('current_password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- New Password --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            New Password
        </label>
        <input
            type="password"
            name="password"
            class="w-full rounded-md border border-slate-300 px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500
                   focus:border-blue-500
                   @error('password') border-red-500 focus:ring-red-500 @enderror"
            placeholder="••••••••"
        >
        @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Confirm Password --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Confirm New Password
        </label>
        <input
            type="password"
            name="password_confirmation"
            class="w-full rounded-md border border-slate-300 px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500
                   focus:border-blue-500"
            placeholder="••••••••"
        >
    </div>

    {{-- Actions --}}
    <div class="flex flex-col sm:flex-row gap-3 pt-2">
        <button
            type="submit"
            class="inline-flex justify-center rounded-md bg-blue-600 px-4 py-2.5
                   text-sm font-medium text-white hover:bg-blue-700 transition"
        >
            Update Password
        </button>

        <a
            href="/profile"
            class="inline-flex justify-center rounded-md bg-slate-200 px-4 py-2.5
                   text-sm font-medium text-slate-700 hover:bg-slate-300 transition"
        >
            Cancel
        </a>
    </div>
</form>

@endsection

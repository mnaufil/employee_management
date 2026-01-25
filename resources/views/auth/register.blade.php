@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h2 class="text-2xl font-semibold text-slate-800 mb-6">
    Create your account
</h2>

<form method="POST" action="{{ route('register') }}" class="space-y-5">
    @csrf

    {{-- Name --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Name
        </label>
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500
                   focus:border-blue-500
                   @error('name') border-red-500 focus:ring-red-500 @enderror"
            placeholder="Your full name"
        >
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Email
        </label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="w-full rounded-md border border-slate-300 px-3 py-2
                   focus:outline-none focus:ring-2 focus:ring-blue-500
                   focus:border-blue-500
                   @error('email') border-red-500 focus:ring-red-500 @enderror"
            placeholder="you@example.com"
        >
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Password --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Password
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
            Confirm Password
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

    {{-- Global error hint --}}
    @if($errors->any())
        <div class="rounded-md bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
            Please fix the errors above and try again.
        </div>
    @endif

    {{-- Submit --}}
    <button
        type="submit"
        class="w-full rounded-md bg-blue-600 py-2.5 text-white font-medium
               hover:bg-blue-700 transition"
    >
        Create Account
    </button>
</form>

<div class="mt-6 text-center text-sm text-slate-600">
    Already have an account?
    <a href="/login" class="text-blue-600 hover:text-blue-700 font-medium">
        Sign in
    </a>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h2 class="text-2xl font-semibold text-slate-800 mb-6">
    Sign in to your account
</h2>

@if ($errors->any())
    <div class="mb-4 rounded-md bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf

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
                   focus:border-blue-500"
            placeholder="you@example.com"
        >
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
                   focus:border-blue-500"
            placeholder="••••••••"
        >
    </div>

    {{-- Submit --}}
    <button
        type="submit"
        class="w-full rounded-md bg-blue-600 py-2.5 text-white font-medium
               hover:bg-blue-700 transition"
    >
        Sign In
    </button>
</form>

<div class="mt-6 text-center text-sm text-slate-600">
    Don’t have an account?
    <a href="/register" class="text-blue-600 hover:text-blue-700 font-medium">
        Create one
    </a>
</div>
@endsection

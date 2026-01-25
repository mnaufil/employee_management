@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h2 class="text-2xl font-semibold text-slate-900">
    Welcome back, {{ auth()->user()->name }}
</h2>

<p class="mt-2 text-sm text-slate-600">
    Here’s a quick overview of your account.
</p>

<div class="mt-8 grid gap-4">
    <div class="rounded-xl border border-slate-200 bg-white p-5">
        <p class="text-sm font-medium text-slate-700">
            Account Status
        </p>
        <p class="mt-1 text-slate-900">
            Active
        </p>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-5">
        <p class="text-sm font-medium text-slate-700">
            Email
        </p>
        <p class="mt-1 text-slate-900">
            {{ auth()->user()->email }}
        </p>
    </div>
</div>

<div class="mt-8 flex gap-3">
    <a
        href="/profile"
        class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2
               text-sm font-medium text-white hover:bg-blue-700 transition"
    >
        View Profile
    </a>

    <a
        href="/profile/edit"
        class="inline-flex items-center rounded-md bg-slate-200 px-4 py-2
               text-sm font-medium text-slate-700 hover:bg-slate-300 transition"
    >
        Edit Profile
    </a>
</div>

@endsection

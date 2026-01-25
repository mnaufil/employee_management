@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Verify Your Email</h2>

<p class="mb-4">
    Thanks for signing up! Please verify your email address by clicking
    the link we sent to your email.
</p>

@if (session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-4">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded-md
               hover:bg-blue-700 transition"
    >
        Resend Verification Email
    </button>
</form>
@endsection

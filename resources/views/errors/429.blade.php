@extends('layouts.app')

@section('title', 'Too Many Requests')

@section('content')

<div class="bg-white shadow-lg rounded-lg p-8 max-w-md text-center">
    <h1 class="text-5xl font-bold text-red-600 mb-4">
        429
    </h1>

    <h2 class="text-xl font-semibold text-gray-800 mb-2">
        Too Many Requests
    </h2>

    <p class="text-gray-600 mb-6">
        You’ve made too many requests in a short period of time.
        Please slow down and try again after a minute.
    </p>

    <div class="flex justify-center gap-3">
        <a
            href="{{ url()->previous() }}"
            class="px-4 py-2 bg-gray-200 text-gray-700 rounded
                    hover:bg-gray-300 transition"
        >
            Go Back
        </a>

        <a
            href="/login"
            class="px-4 py-2 bg-blue-600 text-white rounded
                    hover:bg-blue-700 transition"
        >
            Login
        </a>
    </div>
</div>
@endsection

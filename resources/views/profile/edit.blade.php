@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Profile</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-4">
        Please fix the errors below.
    </div>
@endif

<form method="POST" action="/profile/update" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <div>
        <label class="block text-sm font-medium mb-1">
            Profile Photo
        </label>

        <input
            type="file"
            name="profile_photo"
            class="w-full border rounded-md px-3 py-2
                @error('profile_photo') border-red-500 @enderror"
        >

        @error('profile_photo')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Name --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            class="w-full rounded-md border px-3 py-2
                focus:outline-none focus:ring-2 focus:ring-blue-500
                @error('name') border-red-500 @enderror"
        >

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Email --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            class="w-full rounded-md border px-3 py-2
                focus:outline-none focus:ring-2 focus:ring-blue-500
                @error('email') border-red-500 @enderror"
        >

        @error('email')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    {{-- Submit --}}
    <div>
        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md
                   hover:bg-blue-700 transition"
        >
            Update Profile
        </button>
    </div>
</form>

@endsection
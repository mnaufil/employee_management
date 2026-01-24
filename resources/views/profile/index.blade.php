@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 ">
            Profile 
            
            @if ($user->profile_photo)
                <img
                    src="{{ asset('storage/' . $user->profile_photo) }}"
                    class="w-24 h-24 rounded-full object-cover mb-4 mx-auto"
                    alt="Profile Photo"
                >

                 <form method="POST" action="/profile/photo" class="mt-2" onsubmit="return confirm('Are you sure you want to remove your profile photo?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition">
                        Remove Photo
                    </button>
                </form>
            @else
                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center mb-4 mx-auto">
                    <span class="text-gray-600">No Photo</span>
                </div>
            @endif

        </h2>
    </div>

<div class="bg-white shadow rounded-lg p-6 space-y-4">

    <div class="flex justify-between border-b pb-2">
        <span class="text-sm font-medium text-gray-600">Name</span>
        <span class="text-gray-800">{{ $user->name }}</span>
    </div>

    <div class="flex justify-between border-b pb-2">
        <span class="text-sm font-medium text-gray-600">Email</span>
        <span class="text-gray-800">{{ $user->email }}</span>
    </div>

    <div class="pt-4">
        <a
            href="/profile/edit"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md
                   hover:bg-blue-700 transition"
        >
            Edit Profile
        </a>
        <a
            href="/profile/change-password"
            class="inline-block mt-3 bg-gray-600 text-white px-4 py-2 rounded-md
           hover:bg-gray-700 transition"
        >
    Change Password
</a>
    </div>

</div>

@endsection

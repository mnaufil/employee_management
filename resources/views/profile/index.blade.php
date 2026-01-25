@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

{{-- Header --}}
<div class="text-center mb-8">
    <h2 class="text-2xl font-semibold text-slate-900 mb-4">
        My Profile
    </h2>

    {{-- Profile Photo --}}
    @if ($user->profile_photo)
        <img
            src="{{ asset('storage/' . $user->profile_photo) }}"
            class="w-24 h-24 rounded-full object-cover mx-auto mb-3 border border-slate-200"
            alt="Profile Photo"
        >

        <form
            method="POST"
            action="/profile/photo"
            class="inline-block"
            onsubmit="return confirm('Are you sure you want to remove your profile photo?')"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="text-sm text-red-600 hover:text-red-700 transition"
            >
                Remove photo
            </button>
        </form>
    @else
        <div class="w-24 h-24 rounded-full bg-slate-200 flex items-center justify-center mx-auto mb-3">
            <span class="text-slate-500 text-sm">No photo</span>
        </div>
    @endif
</div>

{{-- Profile Details Card --}}
<div class="bg-white border border-slate-200 rounded-xl p-6 space-y-4">

    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
        <span class="text-sm font-medium text-slate-600">Name</span>
        <span class="text-slate-900">{{ $user->name }}</span>
    </div>

    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
        <span class="text-sm font-medium text-slate-600">Email</span>
        <span class="text-slate-900">{{ $user->email }}</span>
    </div>

    {{-- Actions --}}
    <div class="pt-4 flex flex-col sm:flex-row gap-3">
        <a
            href="/profile/edit"
            class="inline-flex justify-center rounded-md bg-blue-600 px-4 py-2
                   text-sm font-medium text-white hover:bg-blue-700 transition"
        >
            Edit Profile
        </a>

        <a
            href="/profile/change-password"
            class="inline-flex justify-center rounded-md bg-slate-600 px-4 py-2
                   text-sm font-medium text-white hover:bg-slate-700 transition"
        >
            Change Password
        </a>
    </div>

</div>

@endsection

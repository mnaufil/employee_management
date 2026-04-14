@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Edit Profile</h2>
        <p class="text-slate-500 text-sm">Update your personal information and profile picture.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 flex items-center p-4 text-red-800 border-t-4 border-red-300 bg-red-50 rounded-lg" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ml-3 text-sm font-medium">
                Please check the form for errors and try again.
            </div>
        </div>
    @endif

    <form method="POST" action="/profile/update" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 sm:p-8">
            
            <div class="space-y-6">
                <div class="flex items-center gap-6 pb-6 border-b border-slate-100">
                    <div class="relative group">
                        @if ($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" class="w-20 h-20 rounded-xl object-cover ring-2 ring-slate-100 shadow-md">
                        @else
                            <div class="w-20 h-20 rounded-xl bg-slate-100 flex items-center justify-center ring-2 ring-slate-100">
                                <span class="text-slate-400 text-xl font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex-1">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Profile Photo</label>
                        <input
                            type="file"
                            name="profile_photo"
                            class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100 transition"
                        >
                        @error('profile_photo')
                            <p class="text-xs text-red-600 mt-2 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Full Name
                        </label>
                        <input
                            type="text"
                            name="name"
                            placeholder="John Doe"
                            value="{{ old('name', $user->name) }}"
                            class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-900 transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 
                                @error('name') border-red-400 ring-4 ring-red-500/10 @enderror"
                        >
                        @error('name')
                            <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            placeholder="john@example.com"
                            value="{{ old('email', $user->email) }}"
                            class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-900 transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10
                                @error('email') border-red-400 ring-4 ring-red-500/10 @enderror"
                        >
                        @error('email')
                            <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="/profile" class="px-6 py-2.5 text-sm font-semibold text-slate-600 hover:text-slate-800 transition">
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-8 py-2.5 rounded-xl font-bold text-sm hover:bg-blue-700 shadow-md shadow-blue-200 active:scale-95 transition-all"
                >
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-10">
    
    <div class="mb-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-50 rounded-full mb-4">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-slate-900">Security Settings</h2>
        <p class="text-slate-500 text-sm mt-1">Ensure your account is using a long, random password to stay secure.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 flex items-center p-4 text-red-800 border-l-4 border-red-400 bg-red-50 rounded-r-lg shadow-sm" role="alert">
            <div class="ml-3 text-sm font-medium">
                There were some issues with your submission. Please check the fields below.
            </div>
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <form method="POST" action="/profile/change-password" class="p-6 sm:p-8 space-y-6">
            @csrf

            {{-- Current Password --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Current Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        name="current_password"
                        placeholder="••••••••"
                        class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-900 transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10
                        @error('current_password') border-red-400 ring-4 ring-red-500/10 @enderror"
                    >
                </div>
                @error('current_password')
                    <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <hr class="border-slate-100">

            {{-- New Password Group --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- New Password --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        New Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-900 transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10
                        @error('password') border-red-400 ring-4 ring-red-500/10 @enderror"
                    >
                    @error('password')
                        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Confirm New Password
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="••••••••"
                        class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-900 transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10"
                    >
                </div>
            </div>

            {{-- Actions --}}
            <div class="pt-4 flex items-center justify-end gap-3">
                <a href="/profile" class="text-sm font-semibold text-slate-600 hover:text-slate-800 transition px-4">
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-slate-900 text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-slate-800 shadow-md active:scale-95 transition-all"
                >
                    Update Password
                </button>
            </div>
        </form>
        
        <div class="bg-slate-50 px-8 py-4 border-t border-slate-100">
            <p class="text-xs text-slate-500 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                Logged in devices will remain active after password change.
            </p>
        </div>
    </div>
</div>
@endsection
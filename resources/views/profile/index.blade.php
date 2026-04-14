@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1">
            <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center shadow-sm">
                <div class="relative inline-block">
                    @if ($user->profile_photo)
                        <img 
                            src="{{ asset('storage/' . $user->profile_photo) }}" 
                            class="w-32 h-32 rounded-2xl object-cover border-4 border-white shadow-lg ring-1 ring-slate-200"
                            alt="Profile Photo"
                        >
                        <form 
                            method="POST" 
                            action="/profile/photo" 
                            class="mt-4"
                            onsubmit="return confirm('Remove your profile photo?')"
                        >
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs font-semibold text-red-500 hover:text-red-600 transition uppercase tracking-wider">
                                Remove Photo
                            </button>
                        </form>
                    @else
                        <div class="w-32 h-32 rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center border-4 border-white shadow-lg ring-1 ring-slate-200">
                            <span class="text-slate-400 text-3xl font-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        </div>
                        <p class="mt-4 text-xs text-slate-400 italic">No photo uploaded</p>
                    @endif
                </div>

                <h2 class="mt-6 text-xl font-bold text-slate-900">{{ $user->name }}</h2>
                <p class="text-sm text-slate-500">{{ $user->email }}</p>
                
                <div class="mt-8 pt-6 border-t border-slate-100 flex justify-center gap-2">
                     <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Active Account
                    </span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800">Account Information</h3>
                </div>
                
                <div class="p-6 divide-y divide-slate-100">
                    <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <span class="text-sm font-semibold text-slate-500 uppercase tracking-tight">Full Name</span>
                        <span class="text-slate-900 font-medium">{{ $user->name }}</span>
                    </div>

                    <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <span class="text-sm font-semibold text-slate-500 uppercase tracking-tight">Email Address</span>
                        <div class="flex items-center gap-2">
                             <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                             <span class="text-slate-900 font-medium">{{ $user->email }}</span>
                        </div>
                    </div>

                    <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <span class="text-sm font-semibold text-slate-500 uppercase tracking-tight">Account Created</span>
                        <span class="text-slate-900 font-medium">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-4">
                <a href="/profile/edit" 
                   class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold text-sm hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-200 transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Profile
                </a>

                <a href="/profile/change-password" 
                   class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 rounded-xl bg-white border border-slate-200 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition-all">
                    <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Security Settings
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    
    <div class="relative overflow-hidden rounded-3xl bg-blue-600 p-8 shadow-lg shadow-blue-200 mb-10">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-3xl font-bold text-white tracking-tight">
                    Welcome back, {{ auth()->user()->name }} 👋
                </h2>
                <p class="mt-2 text-blue-100 font-medium">
                    It's a great day to manage your team and projects.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="/profile" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-5 py-2.5 rounded-xl font-semibold text-sm transition backdrop-blur-md">
                    My Account
                </a>
                <a href="/employees" class="bg-white text-blue-600 px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-blue-50 transition shadow-sm">
                    Manage Employees
                </a>
            </div>
        </div>
        
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-64 h-64 bg-blue-500 rounded-full opacity-20 blur-3xl"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Account Status</p>
                    <p class="text-lg font-bold text-slate-900">Active</p>
                </div>
            </div>
        </div>

        <div class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Verified Email</p>
                    <p class="text-lg font-bold text-slate-900 truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="group bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Employees</p>
                    <p class="text-lg font-bold text-slate-900">Go to List →</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></div>
            <p class="text-sm font-medium text-slate-600">Need to update your security settings?</p>
        </div>
        <div class="flex gap-4 w-full md:w-auto">
            <a href="/profile/edit" class="flex-1 text-center text-sm font-bold text-slate-700 hover:text-slate-900 transition">Edit Settings</a>
            <a href="/profile/change-password" class="flex-1 text-center text-sm font-bold text-blue-600 hover:text-blue-700 transition">Security Setup</a>
        </div>
    </div>

</div>
@endsection
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Login | Employee Management</title> --}}
    <title>@yield('title', 'Employee Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full">

    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            {{-- Logo --}}
            <div class="flex justify-center mb-6">
                <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
            
            <h2 class="text-center text-3xl font-extrabold text-slate-900 tracking-tight">
                Welcome back
            </h2>
            <p class="mt-2 text-center text-sm text-slate-500">
                Sign in to manage your employees
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow-xl shadow-slate-200/50 border border-slate-100 sm:rounded-2xl sm:px-10">
                
                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="mb-6 flex items-center p-3 text-sm text-red-700 bg-red-50 border-l-4 border-red-400 rounded">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1.5">
                            Email address
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-900 transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 placeholder:text-slate-400 outline-none"
                            placeholder="name@company.com"
                        >
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-sm font-bold text-slate-700">
                                Password
                            </label>
                            <a href="#" class="text-xs font-semibold text-blue-600 hover:text-blue-500">
                                Forgot password?
                            </a>
                        </div>
                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-4 py-3 text-slate-900 transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 placeholder:text-slate-400 outline-none"
                            placeholder="••••••••"
                        >
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded transition cursor-pointer">
                        <label for="remember_me" class="ml-2 block text-sm text-slate-600 cursor-pointer select-none">
                            Remember this device
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md shadow-blue-200 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active:scale-[0.98] transition-all"
                    >
                        Sign in
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-slate-600">
                    Don’t have an account yet?
                    <a href="/register" class="font-bold text-blue-600 hover:text-blue-500 transition">
                        Create an account
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
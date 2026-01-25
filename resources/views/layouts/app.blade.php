<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Auth Profile App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800 antialiased">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            
            <h1 class="text-lg font-semibold tracking-tight text-slate-900">
                Auth Profile App
            </h1>

            @if(auth()->check())
                <div class="flex items-center gap-4">
                    <a
                        href="/profile"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition"
                    >
                        My Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="text-sm font-medium text-red-500 hover:text-red-600 transition"
                        >
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="flex items-center gap-4">
                    <a
                        href="/login"
                        class="text-sm font-medium text-slate-600 hover:text-blue-600 transition"
                    >
                        Login
                    </a>
                    <a
                        href="/register"
                        class="text-sm font-medium text-blue-600 hover:text-blue-700 transition"
                    >
                        Register
                    </a>
                </div>
            @endif

        </div>
    </nav>

    {{-- Page Content --}}
    <main class="max-w-md mx-auto mt-12 px-4">
        <div class="bg-white border border-slate-200 rounded-xl p-6">

            @if (session('success'))
                <div class="mb-4 rounded-md bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </div>
    </main>

</body>
</html>

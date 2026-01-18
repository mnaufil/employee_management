<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Auth Profile App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
     <nav class="bg-white shadow p-4 flex justify-between">
        <h1 class="font-bold text-lg">Auth Profile App</h1>
        @if(auth()->check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button>Logout</button>
        </form>
        @else
            <div>
                <a href="/login" class="mr-4">Login</a>
                <a href="/register">Register</a>
            </div>
        @endif
    </nav>

    <main class="max-w-md mx-auto mt-10 bg-white p-6 shadow rounded">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
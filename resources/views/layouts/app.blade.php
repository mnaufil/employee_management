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
        <div>
            <a href="/login" class="mr-4">Login</a>
            <a href="/register">Register</a>
        </div>
    </nav>

    <main class="max-w-md mx-auto mt-10 bg-white p-6 shadow rounded">
        @yield('content')
    </main>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="bg-blue-600 text-white p-6 text-2xl">
        IF THIS IS BLUE, CSS IS LOADING
    </div>

    @if (session('success'))
        <div style="background:#d1fae5;color:#065f46;padding:10px;margin-bottom:10px;">
            {{ session('success') }}
        </div>
    @endif

</body>
</html>

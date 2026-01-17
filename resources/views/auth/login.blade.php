 @extends('layouts.app')

@section('title', 'Login')

@section('content')
<h2 class="text-xl font-bold mb-4">Login</h2>

<form method="POST">
    @csrf

    <div class="mb-4">
        <label>Email</label>
        <input type="email" class="w-full border p-2 rounded">
    </div>

    <div class="mb-4">
        <label>Password</label>
        <input type="password" class="w-full border p-2 rounded">
    </div>

    <button class="w-full bg-blue-600 text-white py-2 rounded">
        Login
    </button>
</form>
@endsection




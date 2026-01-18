@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">My Profile</h2>

<div class="mb-4">
    <strong>Name:</strong> {{ $user->name }}
</div>

<div class="mb-4">
    <strong>Email:</strong> {{ $user->email }}
</div>

<a href="/profile/edit" class="text-blue-600 btn btn-primary">
    Edit Profile
</a>
@endsection

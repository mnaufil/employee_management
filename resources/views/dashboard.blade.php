@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold">Welcome, {{ auth()->user()->name }}</h2>
<p class="mt-4">This is your dashboard.</p>
@endsection
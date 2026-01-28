@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            Add Employee
        </h1>
        <p class="text-gray-500">
            Fill in the employee details below
        </p>
    </div>

    <!-- Card -->
    <div class="bg-white shadow rounded-lg p-6">
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    placeholder="Employee name"
                >
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    placeholder="employee@email.com"
                >
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Phone</label>
                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    placeholder="Optional"
                >
            </div>

            <!-- Designation -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Designation</label>
                <input
                    type="text"
                    name="designation"
                    value="{{ old('designation') }}"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                    placeholder="Developer, Manager, etc."
                >
            </div>

            <!-- Actions -->
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Save Employee
                </button>

                <a href="{{ route('employees.index') }}"
                   class="px-6 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</div>
@endsection

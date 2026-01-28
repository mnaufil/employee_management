@extends('layouts.app')

@section('content')
{{-- {{ dd($employee) }} --}}
<div class="max-w-4xl mx-auto px-6 py-8">

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            Edit Employee
        </h1>
        <p class="text-gray-500">
            Update employee details
        </p>
    </div>

    <div class="bg-white shadow rounded-lg p-6">

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $employee->name) }}"
                    class="w-full border rounded-lg px-4 py-2"
                >
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $employee->email) }}"
                    class="w-full border rounded-lg px-4 py-2"
                >
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Phone</label>
                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $employee->phone) }}"
                    class="w-full border rounded-lg px-4 py-2"
                >
            </div>

            <!-- Designation -->
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Designation</label>
                <input
                    type="text"
                    name="designation"
                    value="{{ old('designation', $employee->designation) }}"
                    class="w-full border rounded-lg px-4 py-2"
                >
            </div>

            <div class="flex gap-3">
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Update Employee
                </button>

                <a href="{{ route('employees.index') }}"
                   class="px-6 py-2 border rounded-lg text-gray-600">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</div>
@endsection

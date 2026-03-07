@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Deleted Employees</h1>
            <p class="text-gray-500">Manage employees that were soft deleted</p>
        </div>

        <a href="{{ route('employees.index') }}"
           class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900">
            Back to Employees
        </a>
    </div>

    <!-- Success message -->
    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="w-full">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Designation</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($employees as $employee)
                <tr class="hover:bg-gray-50">

                    <td class="px-4 py-3">{{ $employee->name }}</td>
                    <td class="px-4 py-3">{{ $employee->email }}</td>
                    <td class="px-4 py-3">{{ $employee->phone }}</td>
                    <td class="px-4 py-3">{{ $employee->designation }}</td>

                    <td class="px-4 py-3 text-center flex justify-center gap-3">

                        <!-- Restore -->
                        <form action="{{ route('employees.restore', $employee->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                Restore
                            </button>
                        </form>

                        <!-- Permanent delete -->
                        <form action="{{ route('employees.forceDelete', $employee->id) }}"
                              method="POST"
                              onsubmit="return confirm('This will permanently delete the employee. Continue?')">

                            @csrf
                            @method('DELETE')

                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete Permanently
                            </button>
                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-8 text-gray-500">
                        No deleted employees found.
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>

</div>
@endsection
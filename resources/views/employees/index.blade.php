@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">
                Employee Management
            </h1>

            <a href="{{ route('employees.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                + Add Employee
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white shadow rounded-lg p-6">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <form method="GET" action="{{ route('employees.index') }}" class="mb-6 flex gap-3">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search employees..."
                    class="w-1/3 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                >

                <button
                    class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-lg">
                button Search
                </button>

                @if(request('search'))
                    <a href="{{ route('employees.index') }}"
                    class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
                        Clear
                    </a>
                @endif
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
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
                                <td class="px-4 py-3">{{ $employee->phone ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $employee->designation ?? '-' }}</td>
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="text-blue-600 hover:underline mr-3">
                                        Edit
                                    </a>

                                    <form action="{{ route('employees.destroy', $employee) }}"
                                        method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Are you sure?')"
                                            class="text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                    No employees found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{ $employees->links() }}
            </div>
        </div>

    </div>
@endsection

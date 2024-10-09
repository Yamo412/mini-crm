@extends('layouts.app')

@section('content')
    <h1>Employee List</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Company Logo</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->company ? $employee->company->name : 'N/A' }}</td>
                    <td>
                        @if($employee->company && $employee->company->logo)
                            <img src="{{ asset('storage/' . $employee->company->logo) }}" alt="Company Logo" style="width: 50px; height: auto;">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->role }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $employees->links() }} <!-- Pagination links -->
@endsection

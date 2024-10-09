@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
    <a href="{{ route('employees.index') }}" class="btn btn-primary">← Back to Employee List</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="{{ $employee->first_name }}" required>
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="{{ $employee->last_name }}" required>
        </div>
        <div>
            <label for="company_id">Company</label>
            <select name="company_id" required>
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $employee->email }}" required>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ $employee->phone }}" required>
        </div>
        <div>
            <label for="role">Role</label>
            <input type="text" name="role" value="{{ $employee->role }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
@endsection

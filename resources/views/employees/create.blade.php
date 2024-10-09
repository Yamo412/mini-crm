@extends('layouts.app')

@section('content')
    <h1>Add New Employee</h1>
    <a href="{{ route('employees.index') }}" class="btn btn-primary">← Back to Employee List</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" required placeholder="First Name">
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" required placeholder="Last Name">
        </div>
        <div>
            <label for="company_id">Company</label>
            <select name="company_id" required>
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required placeholder="Email">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" required placeholder="Phone">
        </div>
        <div>
            <label for="role">Role</label>
            <input type="text" name="role" required placeholder="Role">
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
@endsection

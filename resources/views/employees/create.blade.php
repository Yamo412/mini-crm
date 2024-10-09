@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4 w-50">
        <h1 class="text-center mb-4">Add New Employee</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('employees.index') }}" class="btn btn-primary">← Back to Employee List</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
        </div>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <!-- First Name -->
            <div class="row mb-3">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" name="first_name" class="form-control" required placeholder="First Name">
                </div>
            </div>

            <!-- Last Name -->
            <div class="row mb-3">
                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" name="last_name" class="form-control" required placeholder="Last Name">
                </div>
            </div>

            <!-- Company -->
            <div class="row mb-3">
                <label for="company_id" class="col-sm-3 col-form-label">Company</label>
                <div class="col-sm-9">
                    <select name="company_id" class="form-select" required>
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Email -->
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" required placeholder="Email">
                </div>
            </div>

            <!-- Phone -->
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input type="text" name="phone" class="form-control" required placeholder="Phone">
                </div>
            </div>

            <!-- Role -->
            <div class="row mb-4">
                <label for="role" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                    <input type="text" name="role" class="form-control" required placeholder="Role">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>
        </form>
    </div>
</div>
@endsection

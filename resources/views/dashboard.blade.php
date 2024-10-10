@extends('layouts.app')

@section('content')
<div class="container my-4">
    <!-- Dashboard Title -->
    <div class="text-center mb-4">
        <h1 class="h2">Admin Dashboard</h1>
        <p class="text-muted">Manage your resources from here.</p>
    </div>

    <!-- Statistics Section -->
    <div class="row text-center mb-4">
        <!-- Total Companies Card -->
        <div class="col-md-6 mb-3">
            <div class="card bg-primary text-white shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Companies</h5>
                    <h2>{{ $totalCompanies }}</h2>
                </div>
            </div>
        </div>

        <!-- Total Employees Card -->
        <div class="col-md-6 mb-3">
            <div class="card bg-success text-white shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <h2>{{ $totalEmployees }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="row text-center mb-4">
        <!-- View Companies Button -->
        <div class="col-md-6 mb-3">
            <a href="{{ route('companies.index') }}" class="btn btn-outline-primary btn-block py-2">
                View Companies
            </a>
        </div>
        <!-- View Employees Button -->
        <div class="col-md-6 mb-3">
            <a href="{{ route('employees.index') }}" class="btn btn-outline-success btn-block py-2">
                View Employees
            </a>
        </div>
    </div>

    <!-- Logout Section -->
    <div class="text-center">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-lg px-4">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection

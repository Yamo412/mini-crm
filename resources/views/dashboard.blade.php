@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Dashboard Title -->
    <div class="text-center mb-5">
        <h1 class="display-4">Admin Dashboard</h1>
        <p class="lead">Welcome to your dashboard. Use the navigation below to manage your resources.</p>
    </div>

    <!-- Statistics Section -->
    <div class="row text-center">
        <!-- Total Companies Card -->
        <div class="col-md-6 mb-4">
            <div class="card bg-primary text-white shadow-lg h-100">
                <div class="card-body">
                    <h3 class="card-title">Total Companies</h3>
                    <p class="display-4">{{ $totalCompanies }}</p>
                </div>
            </div>
        </div>

        <!-- Total Employees Card -->
        <div class="col-md-6 mb-4">
            <div class="card bg-success text-white shadow-lg h-100">
                <div class="card-body">
                    <h3 class="card-title">Total Employees</h3>
                    <p class="display-4">{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons (Switched Places) -->
    <div class="row text-center mb-5">
        <!-- View Companies Button -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('companies.index') }}" class="btn btn-outline-primary btn-lg w-100 py-3">
                View Companies
            </a>
        </div>
        <!-- View Employees Button -->
        <div class="col-md-6 mb-4">
            <a href="{{ route('employees.index') }}" class="btn btn-outline-success btn-lg w-100 py-3">
                View Employees
            </a>
        </div>
    </div>

    <!-- Logout Section -->
    <div class="row text-center">
        <div class="col-md-12">
            <div class="card border-danger text-danger shadow-lg">
                <div class="card-body">
                    <h3 class="card-title">Logout</h3>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg w-50">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

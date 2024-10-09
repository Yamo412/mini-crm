@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <h1>Dashboard</h1>
        <p>Total Companies: {{ $totalCompanies }}</p>
        <p>Total Employees: {{ $totalEmployees }}</p>
        
        <div class="button-group">
            <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employees</a>
            <a href="{{ route('companies.index') }}" class="btn btn-primary">View Companies</a>
        </div>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
@endsection

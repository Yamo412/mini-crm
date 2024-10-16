@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4 w-50">
        <h1 class="text-center">Add New Company</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('companies.index') }}" class="btn btn-primary">← Back to Company List</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
        </div>
        
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" required placeholder="Company Name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="logo" class="col-sm-3 col-form-label">Company Logo</label>
                <div class="col-sm-9">
                    <input type="file" name="logo" class="form-control" accept="image/*">
                    @error('logo')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Company</button>
            </div>
        </form>
    </div>
</div>
@endsection

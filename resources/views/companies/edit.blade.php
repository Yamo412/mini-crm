@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4 w-50">
        <h1 class="text-center mb-4">Edit Company</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('companies.index') }}" class="btn btn-primary">← Back to Company List</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
        </div>

        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Company Name -->
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
                </div>
            </div>

            <!-- Company Logo -->
            <div class="row mb-4">
                <label for="logo" class="col-sm-3 col-form-label">Company Logo</label>
                <div class="col-sm-9">
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Company</button>
            </div>
        </form>
    </div>
</div>
@endsection

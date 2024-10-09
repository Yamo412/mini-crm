@extends('layouts.app')

@section('content')
    <h1>Edit Company</h1>
    <a href="{{ route('companies.index') }}" class="btn btn-primary">← Back to Company List</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    
    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Company Name</label>
            <input type="text" name="name" value="{{ $company->name }}" required>
        </div>
        <div>
            <label for="logo">Company Logo</label>
            <input type="file" name="logo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Add New Company</h1>
    <a href="{{ route('companies.index') }}" class="btn btn-primary">← Back to Company List</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Company Name</label>
            <input type="text" name="name" required placeholder="Company Name">
        </div>
        <div>
            <label for="logo">Company Logo</label>
            <input type="file" name="logo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Add Company</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Company List</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- DataTable Styles and Scripts -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <table id="companyTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" style="width: 50px; height: auto;">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#companyTable').DataTable({
                "paging": true,
                "pageLength": 10, // Set pagination to display 10 records per page
                "lengthChange": false, // Disable changing the number of records displayed
                "searching": true, // Enable searching
                "ordering": true, // Enable column ordering
                "info": true, // Show table information
                "autoWidth": false, // Disable auto width adjustment
                "responsive": true, // Make the table responsive
                "language": {
                    "paginate": {
                        "previous": "Previous",
                        "next": "Next"
                    }
                }
            });
        });
    </script>
@endsection

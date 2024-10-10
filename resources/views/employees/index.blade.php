@extends('layouts.app')

@section('content')
<h1>Employee List</h1>
<a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>
<a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- DataTable Styles and Scripts -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<table id="employeeTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Company Logo</th> <!-- New column for Company Logo -->
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function() {
        $('#employeeTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('employees.index') }}",
            "columns": [
                { "data": "id" },
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "company" },
                { "data": "company_logo", "orderable": false, "searchable": false }, // New company logo column
                { "data": "email" },
                { "data": "phone" },
                { "data": "role" },
                { "data": "actions", "orderable": false, "searchable": false }
            ],
            "paging": true,
            "pageLength": 10, // Display 10 records per page
            "lengthChange": false, // Disable length changing
            "searching": true, // Enable searching
            "ordering": true, // Enable ordering
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

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
</table>

<script>
    $(document).ready(function() {
        $('#companyTable').DataTable({
            "processing": true, // Enable processing indicator
            "serverSide": true, // Enable server-side processing
            "ajax": "{{ route('companies.index') }}", // Set AJAX data source URL
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "logo", "orderable": false, "searchable": false }, // Logo is not sortable or searchable
                { "data": "actions", "orderable": false, "searchable": false } // Actions are not sortable or searchable
            ],
            "paging": true,
            "pageLength": 10, // Display 10 records per page
            "lengthChange": false, // Disable length changing
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

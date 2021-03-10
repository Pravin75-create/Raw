@extends('layouts/app')
@section('content')
    <a href="{{ url('/home') }}" class="btn btn-success   ">Go Back</a>
    <div class="card">
        <div class="card-header bg-info">
            User Profile
        </div>
        <div class="card-body ">
            <h5 class="card-title ">View Your Profile</h5>
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">First</th>
                        <th scope="col">email</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $profiles->name }}</td>
                        <td>{{ $profiles->email }}</td>
                        <td>{{ $profiles->usertype }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('datatablescript')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });

    </script>
@endsection

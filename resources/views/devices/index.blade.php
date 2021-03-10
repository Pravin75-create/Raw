@extends('layouts/app')
@section('datatable')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endsection
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('devices.create') }}" class="btn btn-success">Add Devices</a>
    </div>
    <div class="card">
        <div class="card-header bg-info">
            <h4>Devices</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title ">View Your Profile</h5>
            <table class="table table-bordered" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">Device Model Name</th>
                        <th scope="col">Device Taken Date</th>
                        <th scope="col">Device Return Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($devices as $device)
                    <tbody>

                        <td>{{ $device->name }}</td>
                        <td>{{ $device->date }}</td>
                        <td>{{ $device->return_date }}</td>
                        <td>
                            <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm"
                                onclick="handleDelete({{ $device->id }})">Delete</button>

                            @if ($device->return_date == 'Not Return')
                                <button class="btn btn-success btn-sm" onclick="handleDelete1({{ $device->id }})">Return
                                    Device </button>
                            @else

                            @endif
                        </td>

                    </tbody>
                    @endforeach

            </table>
            <!-- Modal -->
            <div class="modal fade" id="DeleteModel" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="deleteform">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="DeleteModalLabel">Pending</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are You Sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="ReturnModel1" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="ReturnDate">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="returnModalLabel">Return Device</h5>
                                <input type="hidden" class="form-control" name="name" value="{{isset($device)?$device->name:''}}">
                                <input type="hidden" class="form-control" name="date" value="{{isset($device)?$device->name:''}}">
                                <input type="hidden" class="form-control" name="return_date"
                                    value="{{ date('Y-m-d H:i:s') }}">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Do you Want To return the devices?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection

    @section('scripts')

        <script>
            function handleDelete(id) {
                var form = document.getElementById('deleteform');
                form.action = '/devices/' + id
                $('#DeleteModel').modal('show')
            }

        </script>
        <script>
            function handleDelete1(id) {
                var form = document.getElementById('ReturnDate');
                form.action = '/devices/return_date/updateme/' + id
                $('#ReturnModel1').modal('show')
            }

        </script>

    @endsection
    @section('datatablescript')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        </script>

        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });

        </script>
    @endsection

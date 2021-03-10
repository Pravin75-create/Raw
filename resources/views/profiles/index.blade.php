@section('datatable')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@extends('layouts.app')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('userprofile.create') }}" class="btn btn-success">Add New Users</a>
    </div>
    <div class="card">
        <div class="card-header bg-info">
            <h4>List Of Users</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profile as $profiles)
                        <tr>
                            <td>{{ $profiles->name }}</td>
                            <td>{{ $profiles->email }}</td>

                            <td>
                                <a href="{{ url('userprofile/view/' . $profiles->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-eye"></i> View</a>
                                <a href="{{ route('userprofile.edit', $profiles->id) }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-user-edit"> </i>Edit</a>
                                @if ($profiles->id == 1)

                                @else
                                    @if ($profiles->isban == '0')
                                        <button class="btn btn-info btn-sm" onclick="handleDelete({{ $profiles->id }})"><i
                                                class="fas fa-universal-access"></i> Not
                                            Banned</button>
                                    @elseif($profiles->isban=='1')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="handleDelete1({{ $profiles->id }})"><i class="fas fa-ban"></i>
                                            Banned</button>

                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="ban" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="ban">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ban">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="name" id="" value="{{ $profiles->name }}">
                                <input type="hidden" name="email" id="" value="{{ $profiles->email }}">
                                <input type="hidden" name="password" id="" value="{{ $profiles->password }}">
                                <input type="hidden" name="usertype" id="" value="{{ $profiles->usertype }}">
                                <input type="hidden" name="isban" id="" value=1>
                                You Want to ban The User

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="showModal1" tabindex="-1" role="dialog" aria-labelledby="Notban" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="Notban">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Notban">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="name" id="" value="{{ $profiles->name }}">
                                <input type="hidden" name="email" id="" value="{{ $profiles->email }}">
                                <input type="hidden" name="password" id="" value="{{ $profiles->password }}">
                                <input type="hidden" name="usertype" id="" value="{{ $profiles->usertype }}">
                                <input type="hidden" name="isban" id="" value=0>
                                You want UnBanned This User

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
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
                var form = document.getElementById('ban');
                form.action = '/userprofile/ban/' + id
                $('#showModal').modal('show')
            }

        </script>

        <script>
            function handleDelete1(id) {
                var form = document.getElementById('Notban');
                form.action = '/userprofile/ban/' + id
                $('#showModal1').modal('show')
            }

        </script>

    @endsection
    @section('datatablescript')
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });

        </script>
    @endsection

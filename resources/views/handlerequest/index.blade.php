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
    @hasrole('admin Per')
    <div class="justify-content">
        <a href="{{ route('requestMan.create') }}" class="btn btn-success">Add Request</a>
    </div>
    @endhasrole


    <br>
    <div class="card ">
        <div class="card-header bg-info">Request</div>
        <div class="card-body">

            <table class="table table-bordered" id="table_id">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>subject</th>
                        <th>image</th>
                        <th>location</th>
                        <th>status</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($handlereq as $handlereq)
                    <tbody>
                        <tr>
                            @foreach ($handlereq1 as $handlereq2)
                                @if ($handlereq->user_id == $handlereq2->id)
                                    <td scope="row">{{ $handlereq2->name }}</td>
                                @endif
                            @endforeach

                            <td scope="row">{{ $handlereq->subject }}</td>

                            <td><img src="{{ asset('storage/' . $handlereq->image) }}" alt="image" height='50' width="50">
                            </td>
                            <td>{{ $handlereq->location }}</td>
                            <td>

                                @if ($handlereq->status == 'Pending')
                                    <button class="btn btn-primary btn-sm"
                                        onclick="handleDelete1({{ $handlereq->id }})"><i
                                            class="fas fa-circle-notch fa-spin"> </i> Processing</button>
                                @elseif($handlereq->status=='Processing')
                                    <button class="btn btn-success btn-sm"
                                        onclick="handleDelete2({{ $handlereq->id }})"><i class="fas fa-tasks"></i>
                                        Completed</button>
                                @endif
                            </td>
                            <td>
                                @if (empty($handlereq->remarks))
                                    <button href="" class="btn btn-secondary btn-sm"
                                        onclick="handleDelete3({{ $handlereq->id }})">Send
                                        Remarks</button>

                                @else

                                @endif
                            </td>
                            <td><a href="{{ url('HandleRequest/view/' . $handlereq->id) }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-eye"></i> View</a></td>
                        </tr>

                    </tbody>
                @endforeach
            </table>

            <!-- Modal -->
            <div class="modal fade" id="pending" tabindex="-1" aria-labelledby="pendingModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="pendingform">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pendingModalLabel">Pending</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you Sure?
                                <input type="hidden" name="subject" value="@if (empty($handlereq->subject)) @else{{ $handlereq->subject }} @endif">
                                <input type="hidden" name="description" value="@if (empty($handlereq->description)) @else{{ $handlereq->description }} @endif">
                                <input type="hidden" name="image" value="@if (empty($handlereq->image)) @else{{ $handlereq->image }} @endif">
                                <input type="hidden" name="location" value="@if (empty($handlereq->location)) @else{{ $handlereq->location }} @endif">
                                <input type="hidden" name="status" value="Pending">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal fade" id="processing" tabindex="-1" aria-labelledby="processingModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="processingform">
                        @csrf
                        <!-- @method('PUT') -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="processingModalLabel">Processing</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you Sure?
                                <input type="hidden" name="subject" value="@if (empty($handlereq->subject)) @else{{ $handlereq->subject }} @endif">
                                <input type="hidden" name="description" value="@if (empty($handlereq->description)) @else{{ $handlereq->description }} @endif">
                                <input type="hidden" name="image" value="@if (empty($handlereq->image)) @else{{ $handlereq->image }} @endif">
                                <input type="hidden" name="location" value="@if (empty($handlereq->location)) @else{{ $handlereq->location }} @endif">
                                <input type="hidden" name="status" value="Processing">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal fade" id="completed" tabindex="-1" aria-labelledby="completedModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="completedform">
                        @csrf
                        <!-- @method('PUT') -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="completedModalLabel">Completed</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you Sure?
                                <input type="hidden" name="subject" value="@if (empty($handlereq->subject)) @else{{ $handlereq->subject }} @endif">
                                <input type="hidden" name="description" value="@if (empty($handlereq->description)) @else{{ $handlereq->description }} @endif">
                                <input type="hidden" name="image" value="@if (empty($handlereq->image)) @else{{ $handlereq->image }} @endif">
                                <input type="hidden" name="location" value="@if (empty($handlereq->location)) @else{{ $handlereq->location }} @endif">
                                <input type="hidden" name="status" value="Completed">
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
            <div class="modal fade" id="remarks" tabindex="-1" aria-labelledby="remarksModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="remarksform">
                        @csrf

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="remarksModalLabel">Remarks</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="subject" value="@if (empty($handlereq->subject)) @else{{ $handlereq->subject }} @endif">
                                <input type="hidden" name="description" value="@if (empty($handlereq->description)) @else{{ $handlereq->description }} @endif">
                                <input type="hidden" name="image" value="@if (empty($handlereq->image)) @else{{ $handlereq->image }} @endif">
                                <input type="hidden" name="location" value="@if (empty($handlereq->location)) @else{{ $handlereq->location }} @endif">
                                <div class="form-group">
                                    <label for="remarks"><b> remarks </b></label>
                                    <input type="text" class="form-control" name="remarks" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter Remarks">
                                </div>
                                <input type="hidden" name="status" value="@if (empty($handlereq->status)) @else{{ $handlereq->status }} @endif">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        @endsection

        @section('scripts')

            <script>
                function handleDelete(id) {
                    var form = document.getElementById('pendingform');
                    form.action = '/HandleRequest/updatefirst/' + id
                    $('#pending').modal('show')
                }

            </script>
            <script>
                function handleDelete1(id) {
                    var form = document.getElementById('processingform');
                    form.action = '/HandleRequest/updatesecond/' + id
                    $('#processing').modal('show')
                }

            </script>
            <script>
                function handleDelete2(id) {
                    var form = document.getElementById('completedform');
                    form.action = '/HandleRequest/updatethird/' + id
                    $('#completed').modal('show')
                }

            </script>
            <script>
                function handleDelete3(id) {
                    var form = document.getElementById('remarksform');
                    form.action = '/HandleRequest/remarks/' + id
                    $('#remarks').modal('show')
                }

            </script>
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

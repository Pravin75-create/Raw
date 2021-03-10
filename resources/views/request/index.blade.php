@extends('layouts/app')
@section('content')
    <div class="justify-content">
        <a href="{{ route('requestMan.create') }}" class="btn btn-success">Add Request</a>
    </div>
    <br>
    <div class="card-default">
        <div class="card-header">Request</div>
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">subject</th>
                        <th scope="col">description</th>
                        <th scope="col">image</th>
                        <th scope="col">location</th>
                        <th scope="col">status</th>
                        <th scope="col">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reqMantinance as $requestMa)

                        <tr>
                            <td scope="row">{{ $requestMa->subject }}</th>
                            <td>{{ $requestMa->description }}</td>
                            <td><img src="{{ asset('storage/' . $requestMa->image) }}" alt="" height="50" width="50"></td>
                            <td>{{ $requestMa->location }}</td>
                            @if ($requestMa->status == 'Pending')
                                <td><button class="btn btn-danger" disabled>Pending</button></td>
                            @elseif($requestMa->status=='Processing')
                                <td><button class="btn btn-primary" disabled>Processing</button></td>
                            @else
                                <td><button class="btn btn-success" disabled>Completed</button></td>
                            @endif
                            <td>{{ $requestMa->remarks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

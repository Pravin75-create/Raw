@extends('layouts/app')
@section('content')

    <div class="card-card-default">
        <div class="card-header">
            <h4>date_return</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <ul class="list-group">
                            <li class="list group-item">
                                {{ $error }}
                            </li>
                        </ul>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('devices/return_date/' . $devices->id . '/update') }}" method="post">
                @csrf

                <input type="hidden" class="form-control" name="name" value="{{ $devices->name }}">
                <input type="hidden" class="form-control" name="date" value="{{ $devices->name }}">
                <input type="text" class="form-control" name="return_date" value="{{ date('Y-m-d H:i:s') }}">
                <br>

                <div class="form-group">
                    <button type="hidden" class="btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js">
@endsection

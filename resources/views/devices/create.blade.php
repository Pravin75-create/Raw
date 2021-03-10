@extends('layouts/app')
@section('content')

    <div class="card-card-default">
        <div class="card-header">
            <h4>{{ isset($device) ? 'Edit Devices' : 'Create Devices' }}</h4>
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

            <form action="{{ isset($device) ? route('devices.update', $device->id) : route('devices.store') }}"
                method="post">
                @csrf
                @if (isset($device))
                    @method('PUT')
                @endif
                {{-- <input type="text" class="form-control" name="name" value="{{ isset($devices) ? $devices->name:auth()->user()->id }}" > --}}
                <div class="form-group">
                    <label for="name">device model name</label>
                    <input type="text" class="form-control" name="name"
                        value="{{ isset($device) ? $device->name : '' }}">
                </div>
                <div class="form-group date" data-provide="datepicker">
                    <label for="date">Device taken date</label>
                    <input type="number" id="datepicker" class="form-control" name="date"
                        value="{{ isset($device) ? $device->date : '' }}">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="return_date" value="Not Return">

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-success">{{ isset($device) ? 'Update device' : 'Add devices' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr('#datepicker')

    </script>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

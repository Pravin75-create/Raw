@extends('layouts/app')
@section('content')

    <div class="card-card-default">
        <div class="card-header">Add Request</h4>
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

            <form action="{{ route('requestMan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" value="{{ isset($handlereq) ? $handlereq->subject : '' }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="" cols="20" rows="5">{{isset($handlereqs) ? $handlereqs->description: ''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" class="form-control" name="image" value="">
                </div>

                <div class="form-group">
                    <label for="location">location</label>
                    <input type="text" class="form-control" name="location" value="">
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" class="form-control" name="location" value="Pending">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Request</button>
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

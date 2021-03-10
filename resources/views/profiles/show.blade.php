@extends('layouts.app')
@section('content')
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $show->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Email</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                disabled>{{ $show->email }}</textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">User Type</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                value="{{ $show->usertype }}" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Join Date</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                value="{{ $show->created_at }}" disabled>
        </div>
    </form>
@endsection

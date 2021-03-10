@extends('layouts.app')
@section('content')
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Subject</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                value="{{ $show->subject }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $show->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Image</label>
            <br>
            <img src=" {{ asset('storage/' . $show->image) }}" height="800px" width="800px" alt="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Location</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                value="{{ $show->location }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Remarks Send</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                value="{{ $show->remarks }}">
        </div>
    </form>
@endsection

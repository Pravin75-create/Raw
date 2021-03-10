@extends('layouts/app')
@section('content')

    <div class="card-card-default">
        <div class="card-header">
            <h4>{{ isset($devices) ? 'Edit Users' : 'Create New Users' }}</h4>
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

            <form action="{{ route('userprofile.store') }}" method="post">
                @csrf
                @if (isset($profiles))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="name" name="name" class="form-control" id="name" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <input type="hidden" name="usertype" id="" value="user">
                <input type="hidden" name="isban" id="" value="0">
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endsection

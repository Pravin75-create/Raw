@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4>{{ __('Dashboard') }}</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
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

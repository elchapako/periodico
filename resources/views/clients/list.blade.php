@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of clients
                        <a href="{{url('clients/create')}}" class="btn-xs btn-primary pull-right" role="button">Add a client</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                    @include('clients.partials.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

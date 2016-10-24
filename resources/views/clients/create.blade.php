@extends('layouts.app')

@section('htmlheader_title')
    Add Client
@endsection

@section('contentheader_title')
    Add Client
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Client
                        @include('partials/errors')
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}
                        @include('clients.partials.fields')
                        <button type="submit" class="btn btn-primary">Create client</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('htmlheader_title')
    Add Area
@endsection

@section('contentheader_title')
    Add Area
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Area
                        @include('partials/errors')
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'areas.store', 'method' => 'POST']) !!}
                        @include('areas.partials.fields')
                        <button type="submit" class="btn btn-primary">Create area</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

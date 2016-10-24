@extends('layouts.app')

@section('htmlheader_title')
    Add Ad
@endsection

@section('contentheader_title')
    Add Ad
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Ad
                        @include('partials/errors')
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'ads.store', 'method' => 'POST']) !!}
                        @include('ads.partials.fields')
                        <button type="submit" class="btn btn-primary">Create ad</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

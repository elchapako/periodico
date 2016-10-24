@extends('layouts.app')

@section('htmlheader_title')
    Edit Client
@endsection

@section('contentheader_title')
    Edit Client
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Client
                        @include('partials/errors')
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT']) !!}
                        @include('clients.partials.fields')
                        <button type="submit" class="btn btn-primary">Update client</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

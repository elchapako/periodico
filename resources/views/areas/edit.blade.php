@extends('layouts.app')

@section('htmlheader_title')
    Edit Area
@endsection

@section('contentheader_title')
    Edit Area
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Area
                        @include('partials/errors')
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::model($area, ['route' => ['areas.update', $area->id], 'method' => 'PUT']) !!}
                        @include('areas.partials.fields')
                        <button type="submit" class="btn btn-primary">Update area</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('htmlheader_title')
    Edit Size
@endsection

@section('contentheader_title')
    Edit Size
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Size
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    </div>
                    <div class="panel-body">
                    {!! Form::model($size, ['route' => ['sizes.update', $size->id], 'method' => 'PUT']) !!}
                    @include('sizes.partials.fields')
                    <button type="submit" class="btn btn-primary">Update size</button>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

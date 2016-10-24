@extends('layouts.app')

@section('htmlheader_title')
    Edit Model
@endsection

@section('contentheader_title')
    Edit Model
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Model
                        @include('partials/errors')
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::model($model, ['route' => ['models.update', $model->id], 'method' => 'PUT', 'files' => 'true'] ) !!}
                        <div class="form-group">
                            {!! Form::label('name','Name')!!}
                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="/storage/{{$model->image}}" alt="{{$model->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('image','Imagen')!!}
                            {!! Form::file('image',null,['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Update model</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

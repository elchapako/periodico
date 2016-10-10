@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Update a model</h1>
            @include('partials/errors')
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
@endsection
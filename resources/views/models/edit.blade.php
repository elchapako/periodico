@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.edit_model') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.edit_model') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.edit_model') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::model($model, ['route' => ['models.update', $model->id], 'method' => 'PUT', 'files' => 'true'] ) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('validation.attributes.model_name'))!!}
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
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.update_model') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('models.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

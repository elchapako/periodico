@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_photo') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_photo') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_photo') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'photos.store', 'method' => 'POST', 'files' => 'true']) !!}
                        <div class="form-group">
                            {!! Form::label('name','Name')!!}
                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image','Imagen')!!}
                            {!! Form::file('image',null,['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-default">{{ trans('validation.attributes.create_photo') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('photos.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

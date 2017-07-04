@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_album') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_album') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_album') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'albums.store', 'method' => 'POST', 'files' => 'true']) !!}
                        <div class="form-group">
                            {!! Form::label('name','Name')!!}
                            {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Album Name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description','description')!!}
                            {!! Form::text('description',null,['class' => 'form-control', 'placeholder' => 'Album Description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cover_image','Select a Cover Imagen')!!}
                            {!! Form::file('cover_image',null,['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-default">{{ trans('validation.attributes.create_album') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('albums.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

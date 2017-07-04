@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_photo_to') }} {{$album->name}}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_photo_to') }} {{$album->name}}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_photo_to') }} {{$album->name}}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'images.store', 'method' => 'POST', 'files' => 'true']) !!}
                        <input type="hidden" name="album_id"value="{{$album->id}}" />
                        <div class="form-group">
                            {!! Form::label('description','Descripción')!!}
                            {!! Form::text('description',null,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image','Imagen')!!}
                            {!! Form::file('image',null,['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-default">{{ trans('validation.attributes.add_photo') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('albums.show', $album->id)}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

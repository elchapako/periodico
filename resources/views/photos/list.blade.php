@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_photos') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_photos') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_photos') }}
                        <a href="{{route('photos.create')}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.add_photo') }}</a>
                    </div>
                    {!! Alert::render() !!}
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="row">
                                @foreach($photos as $photo)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                @include('photos.partials.table')
                                            </div>
                                            <img src="/photos/{{$photo->image}}" alt="{{$photo->name}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {!! $photos->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

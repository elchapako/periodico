@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.albums') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.albums') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.albums') }}
                        <a href="{{route('albums.create')}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.add_album') }}</a>
                    </div>
                    {!! Alert::render() !!}
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="row">
                                @foreach($albums as $album)
                                    <div class="col-lg-3">
                                        <div class="thumbnail" style="min-height: 514px;">
                                            <img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}">
                                            <div class="caption">
                                                @include('albums.partials.table')
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

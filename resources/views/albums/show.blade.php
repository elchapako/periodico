@extends('layouts.app')

@section('htmlheader_title')
    {{$album->name}}
@endsection

@section('contentheader_title')
    {{$album->name}}
@endsection

@section('main-content')
    <div class="container">
        <div class="starter-template">
            <div class="media">
                <img class="media-object pull-left"alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" width="350px">
                <div class="media-body">
                    <h2 class="media-heading" style="font-size: 26px;">Album Name:</h2>
                    <p>{{$album->name}}</p>
                    <div class="media">
                        <h2 class="media-heading" style="font-size: 26px;">AlbumDescription :</h2>
                        <p>{{$album->description}}<p>
                            <a href="{{route('images.create', $album->id)}}" class="btn btn-primary" role="button">{{ trans('validation.attributes.add_imagen_to_album') }}</a>
                            {!! Form::open(['route' => ['albums.destroy', $album->id], 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-danger btn-large">{{ trans('validation.attributes.delete') }}</button>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
            @include('partials/errors')
            <div class="panel panel-default">
                {!! Alert::render() !!}
                <div class="panel-body">
                    <div class="row">
                        @foreach($album->Photos as $photo)
                            <div class="col-lg-3">
                                <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
                                    <img alt="{{$album->name}}" src="/albums/{{$photo->image}}">
                                    <div class="caption">
                                        <p>{{$photo->description}}</p>
                                        <p><p>Created date:  {{ date("d F Y",strtotime($photo->created_at)) }} at {{ date("g:ha",strtotime($photo->created_at)) }}</p></p>
                                        <a href="{{route('images.destroy',array('id'=>$photo->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btnbtn-danger btn-small">Delete Image </button></a>
                                        <p>Move image to another Album :</p>
                                        {!! Form::open(['route' => 'images.postMove', 'method' => 'POST']) !!}
                                            <select name="new_album">
                                                @foreach($albums as $others)
                                                    <option value="{{$others->id}}">{{$others->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="photo"value="{{$photo->id}}" />
                                            <button type="submit" class="btn btn-smallbtn-info" onclick="return confirm('Are you sure?')">Move Image</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
@endsection

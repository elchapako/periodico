@extends('layouts.app')

@section('htmlheader_title')
    List of Models
@endsection

@section('contentheader_title')
    List of Models
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of Models
                        <a href="{{url('models/create')}}" class="btn-xs btn-primary pull-right" role="button">Agregar</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="row">
                                @foreach($models as $model)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                <table>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td><h4>{{$model->name}} : </h4></td>
                                                        <td><a href="{{route('models.edit', $model->id)}}" class="btn btn-primary">Edit</a></td>
                                                        <td>{!! Form::open(['route' => ['models.destroy', $model->id], 'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            {!! Form::close() !!}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <img src="/storage/{{$model->image}}" alt="{{$model->name}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {!! $models->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

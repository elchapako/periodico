@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_models') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_models') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_models') }}
                        <a href="{{url('models/create')}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.add_model') }}</a>
                    </div>
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
                                                        <td><a href="{{route('models.edit', $model->id)}}" class="btn btn-primary">{{ trans('validation.attributes.edit') }}</a></td>
                                                        <td>{!! Form::open(['route' => ['models.destroy', $model->id], 'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-danger">{{ trans('validation.attributes.delete') }}</button>
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

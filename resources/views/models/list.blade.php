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
                        <a href="{{route('models.create')}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.add_model') }}</a>
                    </div>
                    {!! Alert::render() !!}
                    <div class="panel-body">
                        <div class="panel-body">
                            <div class="row">
                                @foreach($models as $model)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                @include('models.partials.table')
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

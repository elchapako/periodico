@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado
                        <a href="{{url('models/create')}}" class="btn-xs btn-primary pull-right" role="button">Agregar</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($models as $model)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="storage/{{$model->image}}" alt="{{$model->name}}">
                                        <div class="caption">
                                            <h3>{{$model->name}}</h3>
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
@endsection

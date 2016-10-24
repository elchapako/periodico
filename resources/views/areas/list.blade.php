@extends('layouts.app')

@section('htmlheader_title')
    List of Areas
@endsection

@section('contentheader_title')
    List of Areas
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of Areas
                        <a href="{{url('areas/create')}}" class="btn-xs btn-primary pull-right" role="button">Add an area</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>Hay {{ $areas->total() }} areas</p>
                        @include('areas.partials.table')
                        {!! $areas->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

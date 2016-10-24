@extends('layouts.app')

@section('htmlheader_title')
    List of Publicities
@endsection

@section('contentheader_title')
    List of Publicities
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of Publicities
                        <a href="{{url('ads/create')}}" class="btn-xs btn-primary pull-right" role="button">Add ad</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>Hay {{ $ads->total() }} ads</p>
                        @include('ads.partials.table')
                        {!! $ads->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


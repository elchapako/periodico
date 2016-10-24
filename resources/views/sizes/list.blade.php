@extends('layouts.app')

@section('htmlheader_title')
    List of Sizes
@endsection

@section('contentheader_title')
    List of Sizes
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of Sizes
                        <a href="{{url('sizes/create')}}" class="btn-xs btn-primary pull-right" role="button">Add size</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>Hay {{ $sizes->total() }} sizes</p>
                        @include('sizes.partials.table')
                        {!! $sizes->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

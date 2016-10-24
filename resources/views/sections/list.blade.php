@extends('layouts.app')

@section('htmlheader_title')
    List of Sections
@endsection

@section('contentheader_title')
    List of Sections
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of Sections
                        <a href="{{route('sections.create')}}" class="btn-xs btn-primary pull-right" role="button">Add a section</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>Hay {{ $sections->total() }} sections</p>
                        @include('sections.partials.table')
                        {!! $sections->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

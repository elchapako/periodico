@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_sections') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_sections') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_sections') }}
                        <a href="{{route('sections.create')}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.add_section') }}</a>
                    </div>
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

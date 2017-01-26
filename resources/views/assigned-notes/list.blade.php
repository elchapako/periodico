@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_notes') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_notes') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_notes') }}
                        <a href="{{url('assigned-notes/create')}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.add_ad') }}</a>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <p>Hay {{ $notes->total() }} notas</p>
                        @include('assigned-notes.partials.table')
                        {!! $notes->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


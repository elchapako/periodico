@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_note') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_note') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_note') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'notes.store', 'method' => 'POST']) !!}
                        @include('notes.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.create_note') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('notes.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_area') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_area') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_area') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'areas.store', 'method' => 'POST']) !!}
                        @include('areas.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.create_area') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('areas.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

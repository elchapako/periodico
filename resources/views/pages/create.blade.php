@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_page') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_page') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_page') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'pages.store', 'method' => 'POST']) !!}
                        @include('pages.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.create_page') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('pages.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

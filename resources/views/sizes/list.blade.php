@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_sizes') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_sizes') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_sizes') }}
                        <a href="{{route('sizes.create')}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.add_size') }}</a>
                    </div>
                    {!! Alert::render() !!}
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

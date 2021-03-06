@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_edition') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_edition') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_edition') }}
                    </div>
                    {!! Alert::render() !!}
                    <div class="panel-body">
                        @include('editions.partials.table')
                                {!! Form::open(['route' => 'editions.store', 'method' => 'POST']) !!}
                                <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.create_edition') }}</button>
                                {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


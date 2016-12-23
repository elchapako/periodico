@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.edit_size') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.edit_size') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.edit_size') }}
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    </div>
                    <div class="panel-body">
                    {!! Form::model($size, ['route' => ['sizes.update', $size->id], 'method' => 'PUT']) !!}
                    @include('sizes.partials.fields')
                    <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.update_size') }}</button>
                    {!! Form::close() !!}
                    <a href="{{route('sizes.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

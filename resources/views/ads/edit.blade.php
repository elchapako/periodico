@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.edit_ad') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.edit_ad') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.edit_ad') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::model($ad, ['route' => ['ads.update', $ad->id], 'method' => 'PUT']) !!}
                        @include('ads.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.update_ad') }}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

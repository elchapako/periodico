@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.assign_ad_to_active_page') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.assign_ad_to_active_page') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.assign_ad_to_active_page') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        {!! Form::model($ad, ['route' => ['active-ads.update', $ad->id], 'method' => 'post']) !!}
                        @include('active-ads.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.assign_ad') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('active-ads.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.assign_note') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.assign_note') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.assign_note') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        {!! Form::model($page, ['route' => ['active-pages.update-notes', $page->id], 'method' => 'post']) !!}
                        @include('active-pages.partials.notes')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.assign_note') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('active-pages.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
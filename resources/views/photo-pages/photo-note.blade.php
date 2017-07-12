@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_photo_to_note') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_photo_to_note') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_photo_to_note') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($note)
                            @include('photo-pages.partials.add-photo')
                        @endif
                        <a href="{{url()->previous()}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

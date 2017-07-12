@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.designig_page') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.designig_page') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.designig_page') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($notes)
                            @include('design-pages.partials.fields')
                        @endif
                        <a href="{{url()->previous()}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

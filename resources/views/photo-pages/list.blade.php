@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_pages_that_need_photos') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_pages_that_need_photos') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_pages_that_need_photos') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($pages)
                            @include('photo-pages.partials.table')
                        @else
                            <p>No hay paginas que necesiten fotógrafias por el momento</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

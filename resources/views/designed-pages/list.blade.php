@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_pages_designed') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_pages_designed') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_pages_designed') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($pages)
                            @include('designed-pages.partials.table')
                        @else
                            <p>No hay páginas diseñadas</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

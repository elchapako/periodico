@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_pages_and_status_change_hours') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_pages_and_status_change_hours') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_pages_and_status_change_hours') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($pages && $activePages && $users)
                            @include('reports.partials.info-pages')
                        @else
                            <p>No existe Edición Activa</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

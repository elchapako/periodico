@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_pages_of_active_edition') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_pages_of_active_edition') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_pages_of_active_edition') }}
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($activeEdition)
                            <p>Número de Edicion: {{ $activeEdition->number_of_edition }} - Fecha en desarrollo: {{ $activeEdition->publish_date }} </p>
                            @include('active-pages.partials.table')
                        @else
                            <p>No existe Edición Activa</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

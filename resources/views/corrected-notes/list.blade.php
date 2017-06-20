@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_corrected_notes') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_corrected_notes') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_corrected_notes') }}

                    </div>
                    {!! Alert::render() !!}
                    <div class="panel-body">
                        <p>Hay {{ $notes->total() }} notas</p>
                        @include('corrected-notes.partials.table')
                        {!! $notes->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_notes_and_status_change_hours') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_notes_and_status_change_hours') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_notes_and_status_change_hours') }}
                        <a href="{{url()->previous()}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.back') }}</a>
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($notes && $activityNotes && $users)
                            @include('reports.partials.info-notes')
                        @else
                            <p>No existe Edición Activa</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

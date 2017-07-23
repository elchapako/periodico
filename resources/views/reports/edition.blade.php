@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.reports') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.reports') }}
@endsection

@section('main-content')
    @include('partials/errors')
    @if($activeEdition && $notes && $ads && $reporters)
        @include('reports.partials.small-box')
    <div class="row">
        @include('reports.partials.page-status')
        @include('reports.partials.notes-status')
    </div>
        @else
        <h2>No hay Edición Activa</h2>
    @endif
@endsection

@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.reports') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.reports') }}
@endsection

@section('main-content')
    @include('partials/errors')
    @if($activeEdition && $notes && $ads)
        @include('reports.partials.small-box')
    <div class="row">
        @include('reports.partials.page-status')
        @include('reports.partials.notes-status')
    </div>
    @endif
@endsection

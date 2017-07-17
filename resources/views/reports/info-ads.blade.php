@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.list_of_ads_for_this_edition') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.list_of_ads_for_this_edition') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.list_of_ads_for_this_edition') }}
                        <a href="{{url()->previous()}}" class="btn-xs btn-primary pull-right" role="button">{{ trans('validation.attributes.back') }}</a>
                        {!! Alert::render() !!}
                    </div>
                    <div class="panel-body">
                        @if($ads)
                            <p>Hay {{ $ads->total() }} ads</p>
                            @include('reports.partials.info-ads')
                            {!! $ads->render() !!}
                        @else
                            <p>No hay publicidades para esta Edición</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
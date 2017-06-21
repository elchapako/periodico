@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.add_ad') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.add_ad') }}
@endsection

@section('main-content')
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker.standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.add_ad') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'ads.store', 'method' => 'POST']) !!}
                        @include('ads.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.create_ad') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('ads.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            clearBtn: true,
            multidate: true,
            todayHighlight: true
        });
    </script>
@endsection

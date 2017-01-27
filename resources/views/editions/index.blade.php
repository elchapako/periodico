@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.create_new_edition') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.create_new_edition') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials/errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.create_new_edition') }}
                    </div>
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                            @foreach($fields as $ed)
                                {!! Form::open(['route' => 'editions.store', 'method' => 'POST']) !!}
                                    <input class="hidden" name="date" value="{{$ed->date}}">
                                    <input class="hidden" name="number_of_edition" value="{{$ed->number_of_edition}}">
                                <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.create_edition') }}</button>
                                {!! Form::close() !!}
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


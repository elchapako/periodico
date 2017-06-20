@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.editing_note') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.editing_note') }}
@endsection

@section('main-content')
    <script src="{!! asset('/vendors/ckeditor/ckeditor.js') !!}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.editing_note') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    {!! Alert::render() !!}
                    <div class="panel-body">
                        {!! Form::model($note, ['route' => ['corrected-notes.update', $note->id],  'method' => 'post']) !!}
                        @include('corrected-notes.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.save_note') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('corrected-notes.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

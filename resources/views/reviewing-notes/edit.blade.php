@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.reviewing_note') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.reviewing_note') }}
@endsection

@section('main-content')
    <script src="{!! asset('/vendors/ckeditor/ckeditor.js') !!}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('partials.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('validation.attributes.reviewing_note') }}
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{Session::get('message')}}</p>
                        @endif
                    </div>
                    <div class="panel-body">
                        {!! Form::model($note, ['route' => ['reviewing-notes.update', $note->id],  'method' => 'post']) !!}
                        @include('reviewing-notes.partials.fields')
                        <button type="submit" class="btn btn-primary">{{ trans('validation.attributes.save_note') }}</button>
                        {!! Form::close() !!}
                        <a href="{{route('reviewing-notes.index')}}" class="btn btn-primary">{{ trans('validation.attributes.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

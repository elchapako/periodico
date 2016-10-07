@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Update section</h1>
            @include('partials/errors')
            {!! Form::model($section, ['route' => ['sections.update', $section->id], 'method' => 'PUT']) !!}
            @include('sections.partials.fields')
            <button type="submit" class="btn btn-primary">Update section</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Create a section</h1>
            @include('partials/errors')
            {!! Form::open(['route' => 'sections.store', 'method' => 'POST']) !!}
            @include('sections.partials.fields')
            <button type="submit" class="btn btn-primary">Create section</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
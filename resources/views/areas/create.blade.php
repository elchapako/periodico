@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Create an Area</h1>
            @include('partials/errors')
            {!! Form::open(['route' => 'areas.store', 'method' => 'POST']) !!}
                @include('areas.partials.fields')
                <button type="submit" class="btn btn-primary">Create area</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
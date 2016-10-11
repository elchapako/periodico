@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Create a section</h1>
            @include('partials/errors')
            {!! Form::open(['route' => 'sizes.store', 'method' => 'POST']) !!}
            @include('sizes.partials.fields')
            <button type="submit" class="btn btn-primary">Create size</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
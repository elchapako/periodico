@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Update section</h1>
            @include('partials/errors')
            {!! Form::model($size, ['route' => ['sizes.update', $size->id], 'method' => 'PUT']) !!}
            @include('sizes.partials.fields')
            <button type="submit" class="btn btn-primary">Update size</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Update an Area</h1>
            @include('partials/errors')
            {!! Form::model($area, ['route' => ['areas.update', $area->id], 'method' => 'PUT']) !!}
                @include('areas.partials.fields')
                <button type="submit" class="btn btn-primary">Update area</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
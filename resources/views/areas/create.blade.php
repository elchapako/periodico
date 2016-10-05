@extends('layout')

@section('content')

    <h1>Create an Area</h1>
    <form method="POST" action="{{url('areas')}}" class="form">
        {!! csrf_field() !!}
        <label for="name" class="col-md-4 control-label">Area Name</label>
        <input name="name" type="text" class="form-control">

        <button type="submit" class="btn btn-primary">Create area</button>
    </form>


@endsection
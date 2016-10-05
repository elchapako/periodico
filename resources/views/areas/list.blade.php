@extends('layout')

@section('content')
    <h2>Areas</h2>
    <p>
        <a href="{{url('areas/create')}}">Add an area</a>
    </p>
    <ul>
        @foreach($areas as $area)
        <li>
            {{ $area->name }}
        </li>
        @endforeach
    </ul>
@endsection

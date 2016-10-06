@extends('layout')

@section('content')
    <h2>List of Areas</h2>
    @if(Session::has('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
    <p>
        <a href="{{route('areas.create')}}" class="btn btn-primary">Add an area</a>
    </p>
        <p>Hay {{ $areas->total() }} areas</p>
        @include('areas.partials.table')
        {!! $areas->render() !!}
@endsection

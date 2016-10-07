@extends('layout')

@section('content')
    <div>
    <h2>List of Areas</h2>
    </div>
        @if(Session::has('message'))
            <p class="alert alert-success">{{Session::get('message')}}</p>
        @endif
    <div class="container">
        <div>
            <a href="{{route('areas.create')}}" class="btn btn-primary">Add an area</a>
            <p>Hay {{ $areas->total() }} areas</p>
        </div>
        <div>
            @include('areas.partials.table')
            {!! $areas->render() !!}
        </div>
    </div>
@endsection

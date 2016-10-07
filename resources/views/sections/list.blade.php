@extends('layout')

@section('content')
    <div>
    <h2>List of Sections</h2>
    </div>
        @if(Session::has('message'))
            <p class="alert alert-success">{{Session::get('message')}}</p>
        @endif
    <div class="container">
        <div>
            <a href="{{route('sections.create')}}" class="btn btn-primary">Add a section</a>
            <p>Hay {{ $sections->total() }} sections</p>
        </div>
        <div>
            @include('sections.partials.table')
            {!! $sections->render() !!}
        </div>
    </div>
@endsection
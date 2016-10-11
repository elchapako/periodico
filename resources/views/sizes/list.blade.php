@extends('layout')

@section('content')
    <div>
        <h2>List of Sizes of publicity</h2>
    </div>
    @if(Session::has('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
    <div class="container">
        <div>
            <a href="{{route('sizes.create')}}" class="btn btn-primary">Add size</a>
            <p>Hay {{ $sizes->total() }} sizes</p>
        </div>
        <div>
            @include('sizes.partials.table')
            {!! $sizes->render() !!}
        </div>
    </div>
@endsection
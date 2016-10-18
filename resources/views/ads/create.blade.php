@extends('layout')

@section('content')
    <div class="container">
        @include('partials/errors')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Create ad</h3></div>
                        <div class="panel-body">

                            {!! Form::open(['route' => 'ads.store', 'method' => 'POST']) !!}
                            @include('ads.partials.fields')
                            <button type="submit" class="btn btn-primary">Create ad</button>
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
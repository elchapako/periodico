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
                            <div class="form-group">
                            {!! Form::label('name', 'Ad Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Write the Ad name here...']) !!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('color', 'Color') !!}
                            {!! Form::select('color', ['B&W' => 'B&W', 'Full Color' => 'Full Color']) !!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('section_id', 'Section') !!}
                            {!! Form::select('section_id', $sections) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('size_id', 'Size') !!}
                                {!! Form::select('size_id', $sizes) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('client_id', 'Client') !!}
                                {!! Form::select('client_id', $clients) !!}
                            </div>

                            <button type="submit" class="btn btn-primary">Create ad</button>
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
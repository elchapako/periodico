@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>Add a client</h2>
                <div class="panel panel-default">
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="primary">
                                        {!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}
                                        <div class="caption">
                                            {!! Form::label('full_name', 'Full Name') !!}
                                            {!! Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => 'Write the full name here...']) !!}
                                            {!! Form::label('phone', 'Phone') !!}
                                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Write the phone here...']) !!}
                                            {!! Form::label('cellphone', 'Cellphone') !!}
                                            {!! Form::text('cellphone', null, ['class' => 'form-control', 'placeholder' => 'Write the cellphone here...']) !!}
                                            {!! Form::label('ci', 'C.I.') !!}
                                            {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Write the identification card here...']) !!}
                                            {!! Form::label('email', 'email') !!}
                                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Write the email here...']) !!}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create client</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

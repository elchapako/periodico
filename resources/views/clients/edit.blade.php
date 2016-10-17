@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>Edit client</h2>
                <div class="panel panel-default">
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="primary">
                                    {!! Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT']) !!}
                                    @include('clients.partials.fields')
                                    <button type="submit" class="btn btn-primary">Update client</button>
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

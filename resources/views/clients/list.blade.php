@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of clients
                        <a href="{{url('clients/create')}}" class="btn-xs btn-primary pull-right" role="button">Add a client</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Full name</th>
                                <th>Phone</th>
                                <th>Cellphone</th>
                                <th>C.I.</th>
                                <th>Email</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->full_name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->cellphone}}</td>
                                <td>{{$client->ci}}</td>
                                <td>{{$client->email}}</td>
                                <td><a href="{{route('clients.edit', $client->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

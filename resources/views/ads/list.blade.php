@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List of publicities
                        <a href="{{url('ads/create')}}" class="btn-xs btn-primary pull-right" role="button">Add ad</a>
                    </div>
                    @include('partials/errors')
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                    <div class="panel-body">

                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Section</th>
                                <th>Size</th>
                                <th>Client</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                            @foreach($ads as $ad)
                                <tr>
                                    <td>{{$ad->id}}</td>
                                    <td>{{$ad->name}}</td>
                                    <td>{{$ad->color}}</td>
                                    <td>{{$ad->section->name}}</td>
                                    <td>{{$ad->size->size}}</td>
                                    <td>{{$ad->client->full_name}}</td>
                                    <td><a href="{{route('ads.edit', $ad->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        {!! Form::open(['route' => ['ads.destroy', $ad->id], 'method' => 'DELETE']) !!}
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

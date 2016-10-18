@extends('layout')

@section('content')
    <div class="container">
        @include('partials/errors')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Edit ad</h3></div>
                        <div class="panel-body">

                            {!! Form::model($ad, ['route' => ['ads.update', $ad->id], 'method' => 'PUT']) !!}
                            @include('ads.partials.fields')
                            <button type="submit" class="btn btn-primary">Update ad</button>
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
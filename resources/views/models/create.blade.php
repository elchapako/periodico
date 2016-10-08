@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Model</div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'models.store', 'method' => 'POST', 'files' => 'true']) !!}
                        <div class="form-group">
                            {!! Form::label('name','Name')!!}
                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image','Imagen')!!}
                            {!! Form::file('image',null,['class' => 'form-control']) !!}
                        </div>
                        <button type="submit" class="btn btn-default">Add model</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
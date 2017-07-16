@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('validation.attributes.register_user') }}
@endsection

@section('contentheader_title')
    {{ trans('validation.attributes.register_user') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                @include('partials/errors')
                <div class="panel panel-default">
                    {!! Alert::render() !!}
                    <div class="panel-heading">{{ trans('validation.attributes.register_user') }}
                    </div>
                        <div class="register-box-body">
                            <form action="{{ url('/register') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="{{ trans('message.fullname') }}" name="name" value="{{ old('name') }}"/>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="email" class="form-control" placeholder="{{ trans('message.email') }}" name="email" value="{{ old('email') }}"/>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="{{ trans('message.password') }}" name="password"/>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="{{ trans('message.retrypepassword') }}" name="password_confirmation"/>
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                </div>
                                <div class="form-group">
                                    {!! Form::select('rol_id', $roles, null, ['placeholder' =>  trans('message.select_a_rol') ]) !!}
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-xs-push-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('message.register') }}</button>
                                    </div><!-- /.col -->
                                </div>
                            </form>
                       </div><!-- /.form-box -->
                </div>
            </div>
        </div>
    </div>
@endsection




@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-6">
                <br><br>
                <img src="{{ asset('/img/logo.jpg') }}">
                <br><br><br>
            </div>
            <div class="col-lg-4 col-lg-offset-2">
                <p class="login-box-msg"> {{ trans('message.siginsession') }} </p>
                <form action="{{ url('/login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" placeholder="{{ trans('message.email') }}" name="email" value="{{ old('email') }}" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="{{ trans('message.password') }}" name="password" required/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                 <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                <!--<input type="checkbox" name="remember"> {{ trans('message.remember') }} <br> -->
                                    <a href="{{ url('/password/reset') }}">{{ trans('message.forgotpassword') }}</a><br>
                                <!-- <a href="{{ url('/register') }}" class="text-center">{{ trans('message.registermember') }}</a> -->
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('message.buttonsign') }}</button>
                        </div><!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection



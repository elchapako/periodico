<!DOCTYPE html>
<html>

@section('css')

    <style type="text/css">
        #footer{
            padding-top: 15px;
            position: absolute;
            padding-bottom: 15px;
            background-color: #fff;
            vertical-align: middle;
            text-align: center;
            bottom: 0;
            width: 100%;
            color: grey;
        }
    </style>

@endsection

@include('layouts.partials.htmlheader')

@yield('content')


<footer id="footer">
    <hr>
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Periódico El País EN</b></a>. Sistema de Gestión de procesos
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016. </strong> {{ trans('message.createdby') }} <a href="https://www.facebook.com/edwin.rimendieta">Edwin R. Ibañez M.</a> {{ trans('message.seecode') }} <a href="https://github.com/elchapako/periodico">Github</a>
    </div>
</footer>

</html>
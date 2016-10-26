<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <title>El País EN</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<section id="home" name="home"></section>
<div id="navigation">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <img src="{{ asset('/img/logo.jpg') }}" alt="">
                <h1>Sistema de <b>Gestion y administración</b></h1>
                <h1>de procesos del Periodico <b>El País EN</b></h1>
                <h3><a href="{{ url('/login') }}" class="btn btn-lg btn-success">{{ trans('adminlte_lang::message.login') }}</a></h3>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>

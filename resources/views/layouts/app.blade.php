<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("/css/custom.css")}}" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
@include('includes.header')

<!-- Sidebar -->
@include('includes.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if (Session::has('permission'))
        <div class="row">
            <div class="col-lg-12">

                        <div class="alert alert-danger">
                            <ul>
                                <li>{{Session::get('permission') }}</li>
                            </ul>
                        </div>

                </div>
            </div>
        @endif
                <!-- Your Page Content Here -->
    @yield('content')


    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('includes.footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/jQuery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/dist/js/app.min.js") }}" type="text/javascript"></script>

</body>
</html>

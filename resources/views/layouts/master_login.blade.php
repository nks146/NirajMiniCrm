<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{env('APP_NAME')}}</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link href="{{url('/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- icheck bootstrap -->
  <link href="{{url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Theme style -->
  <link href="{{url('/dist/css/adminlte.min.css')}}" rel="stylesheet" type="text/css">
</head>
@php $bodyClass = "login-page";
if(\Request::route()->getName() == "login")
    $bodyClass = "login-page";
elseif(\Request::route()->getName() == "register")
    $bodyClass = "register-page";
@endphp
<body class="hold-transition {{$bodyClass}}">
  @yield('content')
  <!-- jQuery -->
  <script type="text/javascript" src="{{URL::asset('/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script type="text/javascript" src="{{URL::asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script type="text/javascript" src="{{URL::asset('/dist/js/adminlte.min.js')}}"></script>
</body>
</html>

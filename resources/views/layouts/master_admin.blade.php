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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link href="{{url('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" type="text/css">
  <!-- iCheck -->
  <link href="{{url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <!-- JQVMap -->
  <link href="{{url('/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Theme style -->
  <link href="{{url('/dist/css/adminlte.min.css')}}" rel="stylesheet" type="text/css">
  <!-- overlayScrollbars -->
  <link href="{{url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Daterange picker -->
  <link href="{{url('/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css">
  <!-- summernote -->
  <link href="{{url('/plugins/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include("admin.includes.navbar")
    @include("admin.includes.sidebar")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content-header')

      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
    </div>
    @include("admin.includes.footer")
    @include("admin.includes.control-sidebar")
  </div>
  <!-- jQuery -->
  <script type="text/javascript" src="{{URL::asset('/plugins/jquery/jquery.min.js')}}"></script>

  <!-- jQuery UI 1.11.4 -->
  <script type="text/javascript" src="{{URL::asset('/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script type="text/javascript" src="{{URL::asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script type="text/javascript" src="{{URL::asset('/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script type="text/javascript" src="{{URL::asset('/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script type="text/javascript" src="{{URL::asset('/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script type="text/javascript" src="{{URL::asset('/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="{{URL::asset('/plugins/moment/moment.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script type="text/javascript" src="{{URL::asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script type="text/javascript" src="{{URL::asset('/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script type="text/javascript" src="{{URL::asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script type="text/javascript" src="{{URL::asset('/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script type="text/javascript" src="{{URL::asset('/dist/js/demo.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script type="text/javascript" src="{{URL::asset('/dist/js/pages/dashboard.js')}}"></script>
</body>
</html>

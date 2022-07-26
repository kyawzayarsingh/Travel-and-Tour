<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="GoldenLand Travel & Tour">
  <meta name="description" content="Admin Blade Design for GoldenLand Travel Agency">
  <meta name="keywords" content="HTML,CSS,JavaScript,PHP">

  <meta property = "og:title" content = "GoldenLand Travel & Tour" />
  <meta property = "og:type" content="website"/>
  <meta property = "og:url" content="localhost:8000"/>
  <meta property = "og:image" content="localhost:8000/public/images/logo.png"/>
  <meta property="og:site_name" content="Booking Ticket">
  <meta property = "og:descritption" content="Our website is travel angency for travelling inbound. User can be book package, look the destination, package."/>

  <title>Golden Land Travel Agency</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('sbadmin/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('sbadmin/css/update.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('goldenland/css/bootstrap4.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('goldenland/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('goldenland/css/css/dashboard.css') }}">
  <link rel="shortcut icon" href="{{asset('favicon/admin.png')}}">
  <script src="{{ asset('goldenland/js/jquery-3.5.1.min.js') }}"></script>
  {{-- <script src="{{ asset('goldenland/js/popper.min.js') }}"></script>
  <script src="{{ asset('goldenland/js/bootstrap.min.js') }}"></script> --}}
  <link rel="stylesheet" href="{{ asset('sbadmin/css/yearpicker.css') }}">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    @if (Auth::check() and Auth::user()->type==0 )

    @include('layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      @include('layouts.nav')

      <div id="content">
        @yield('content')
      </div>

      @include('layouts.footer')
    </div>
    @endif
  </div>


  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript -->
  <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sbadmin/js/sb-admin-2.min.js')}}"></script>


  <script src="{{ asset('sbadmin/js/yearpicker.js')}}"></script>
  <script src="{{ asset('sbadmin/js/multi_img.js')}}"></script>
  <script src="{{ asset('sbadmin/js/select2.min.js')}}"></script>


</body>

</html>

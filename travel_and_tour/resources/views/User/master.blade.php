<!DOCTYPE html>
<html lang="en">
<head>
  <title>Golden Land Travel & Tour Agency</title>
  <meta charset="utf-8">
  <meta name="title" content="GoldenLand Travel & Tour">
  <meta name="description" content="User Blade Design for GoldenLand Travel Agency">
  <meta name="keywords" content="HTML,CSS,JavaScript,PHP">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta property = "og:title" content = "GoldenLand Travel & Tour" />
  <meta property = "og:type" content="website"/>
  <meta property = "og:url" content="localhost:8000"/>
  <meta property = "og:image" content="localhost:8000/public/images/logo.png"/>
  <meta property="og:site_name" content="Booking Ticket">
  <meta property = "og:descritption" content="Our website is travel angency for travelling inbound. User can be book package, look the destination, package."/>

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('goldenland/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('goldenland/css/animate.css') }}">
    <link rel="shortcut icon" href="{{asset('favicon/user.png')}}">
    <link rel="stylesheet" href="{{ asset('goldenland/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('goldenland/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('goldenland/css/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('goldenland/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('goldenland/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('goldenland/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('goldenland/css/jquery.timepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('goldenland/css/jquery.timepicker.css') }}">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('goldenland/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('goldenland/css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('goldenland/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('goldenland/css/update.css') }}">
  <link rel="stylesheet" href="{{ asset('goldenland/css/show.css') }}">
  <link rel="stylesheet" href="{{ asset('goldenland/css/select2.min.css') }}">


</head>
<body>
  <!-- start nav -->
  @include('User.nav')
  <!-- END nav -->

  <!-- start MAIN start Popular Destination -->
  @yield('content')
  <!-- end MAIN End Our Destination -->

  <!-- start footer  -->
  @include('User.footer')
</body>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('goldenland/js/google-map.js') }}"></script>

<script src="{{ asset('goldenland/js/jquery.min.js') }}"></script>
<script src="{{ asset('goldenland/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('goldenland/js/popper.min.js') }}"></script>
<script src="{{ asset('goldenland/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('goldenland/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('goldenland/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('goldenland/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('goldenland/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('goldenland/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('goldenland/js/aos.js') }}"></script>
<script src="{{ asset('goldenland/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('goldenland/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('goldenland/js/scrollax.min.js') }}"></script>
<script src="{{ asset('goldenland/js/main.js') }}"></script>
<script src="{{ asset('goldenland/js/slideshow.js') }}"></script>
<script src="{{ asset('goldenland/js/yearpicker.js') }}"></script>
<script src="{{ asset('goldenland/js/select2.min.js') }}"></script>
@stack('scripts')

</body>
</html>

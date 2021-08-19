<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>R.K Hospital | For Women & Children</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('webassets/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('webassets/css/style.css') }}">

    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('webassets/css/responsive.css') }}">

    <!-- Favicon -->
    <link href="{{ asset('webassets/img/eoffice_logo.png') }}" rel="shortcut icon" type="image/png">
</head>

<body >

    <div class="preloader"></div>


    <!-- Header navbar end -->
      <!---Header Menu-->
 @include('website.layouts.header')
<!---Header Menu End-->

 

        <!--Body Content-->
               @yield('content')

        <!--End Body Content-->



<!--Footer-->
 @include('website.layouts.footer')
<!---End Footer-->


    <!-- Footer Style Thirten End -->


  
    <a href="#" class="scrollup"><i class="pe-7s-drop" aria-hidden="true"></i></a>
    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('webassets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{ asset('webassets/js/bootstrap.min.js') }}"></script>

    <!-- all plugins and JavaScript -->
    <script type="text/javascript" src="{{ asset('webassets/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webassets/js/css3-animate-it.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webassets/js/bootstrap-dropdownhover.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webassets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webassets/js/gallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webassets/js/player.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('webassets/js/comming-soon.js') }}"></script>

    <!-- Main Custom JS -->
    <script type="text/javascript" src="{{ asset('webassets/js/script.js') }}"></script>


</body>
</html>


<!-----------BIG testing ---- to make dynamique ---- MVC !!!! ----->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ __('Showcase') }}</title>
  <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
  <!-- Google Fonts -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- Vendor CSS Files -->
  <link href="{{asset('ninestars/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{asset('ninestars/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container-fluid d-flex">
            <div class="logo mr-auto">
                <h1 class="text-light"><a href="#"><span>Ghaya Project</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            @include('layouts.navbars.navs.public')
        </div>
    </header><!-- End Header -->
    @include('pages.showcase.hero')
    @include('layouts.page_templates.public')
    @include('layouts.footers.public')
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{asset('ninestars/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('ninestars/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('ninestars/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('ninestars/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('ninestars/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('ninestars/assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('ninestars/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ninestars/assets/vendor/aos/aos.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('ninestars/assets/js/main.js')}}"></script>
</body>
</html>

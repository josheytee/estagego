<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- icofont-css-link -->
    <link rel="stylesheet" href="{{ asset('asset/css/icofont.min.css') }}">
    <!-- Owl-Carosal-Style-link -->
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
    <!-- Bootstrap-Style-link -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <!-- Aos-Style-link -->
    <link rel="stylesheet" href="{{ asset('asset/css/aos.css') }}">
    <!-- Coustome-Style-link -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <!-- Responsive-Style-link -->
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}">
    {{-- boostrap select --}}
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-select.min.css') }}">
    {{-- boostrap select-country --}}
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-select-country.min.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">


</head>

<body>

    <!-- Page-wrapper-Start -->
    <div class="page_wrapper">

        <!-- Preloader -->
        <div id="preloader">
            <div id="loader"></div>
        </div>


        @yield('content')

        <div class="purple_backdrop"></div>

    </div>
    <!-- Page-wrapper-End -->

    <!-- Jquery-js-Link -->
    <script src="{{ asset('asset/js/jquery.js') }}"></script>
    <!-- owl-js-Link -->
    <script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
    <!-- bootstrap-js-Link -->
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    {{-- bootstrap select min-js --}}
    <script src="{{ asset('asset/js/bootstrap-select.min.js') }}"></script>
    {{-- bootstrap select country-min-js --}}
    <script src="{{ asset('asset/js/bootstrap-select-country.min.js') }}"></script>
    <!-- aos-js-Link -->
    <script src="{{ asset('asset/js/aos.js') }}"></script>
    <!-- main-js-Link -->
    <script src="{{ asset('asset/js/main.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}

</body>

</html>

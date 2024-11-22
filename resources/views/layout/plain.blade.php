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

        <!-- Footer-Section start -->
        <footer>
            <div class="top_footer has_bg">
                <!-- container start -->
                <div class="container">
                    <!-- row start -->
                    <div class="row">
                        <!-- footer link 1 -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="abt_side">
                                <div class="logo"> <img src="{{ asset('asset/images/footer_logo.png') }}"
                                        alt="image"></div>
                                <ul>
                                    <li><a href="#">{{ $contact->website }}</a></li>
                                    <li><a href="#">{{ $contact->phone_number }}</a></li>
                                </ul>
                                <ul class="social_media">
                                    <li><a href="{{ $contact->facebook_url }}"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <li><a href="{{ $contact->twitter_url }}"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                    {{-- <li><a href="#"><i class="icofont-tiktok"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>

                        <!-- footer link 2 -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="links">
                                <h3>Useful Links</h3>
                                <ul>
                                    @foreach ($pageWithAbout as $page)
                                        <li><a href="{{ url("$page->url") }}">{{ $page->pageName }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <!-- footer link 3 -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="links">
                                <h3>Help & Suport</h3>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="#">{{ $category->category_name }}</a></li>
                                    @endforeach
                                    <li><a href="{{ route('terms-of-use') }}">Terms of Use</a></li>
                                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- footer link 4 -->
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="try_out">
                                <h3>Let’s Try Out</h3>
                                <ul class="app_btn">
                                    <li>
                                        <a href="{{ $appdownload->url }}">
                                            <img src="{{ asset('asset/images/appstore_blue.png') }}" alt="image">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $appdownload->url2 }}">
                                            <img src="{{ asset('asset/images/googleplay_blue.png') }}"
                                                alt="image">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- container end -->
            </div>

            <!-- last footer -->
            <div class="bottom_footer">
                <!-- container start -->
                <div class="container">
                    <!-- row start -->
                    <div class="row">
                        <div class="col-md-6">
                            <p>© Copyrights
                                @php
                                    echo date('Y') . '.';
                                @endphp
                                All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="developer_text">Design by <a href="https://cloudcraves.com/" target="blank">Cloud Craves</a></p>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- container end -->
            </div>

            <!-- go top button -->
            <div class="go_top">
                <span><img src="{{ asset('asset/images/go_top.png') }}" alt="image"></span>
            </div>

        </footer>
        <!-- Footer-Section end -->

        <!-- VIDEO MODAL -->
        <div class="modal fade youtube-video" id="myModal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button id="close-video" type="button" class="button btn btn-default text-right"
                        data-dismiss="modal">
                        <i class="icofont-close-line-circled"></i>
                    </button>
                    <div class="modal-body">
                        <div id="video-container" class="video-container">
                            <iframe id="youtubevideo" src="" width="640" height="360" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

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

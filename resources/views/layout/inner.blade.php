<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact us</title>

  <!-- icofont-css-link -->
  <link rel="stylesheet" href="{{asset('asset/css/icofont.min.css')}}">
  <!-- Owl-Carosal-Style-link -->
  <link rel="stylesheet" href="{{asset('asset/css/owl.carousel.min.css')}}">
  <!-- Bootstrap-Style-link -->
  <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
  <!-- Aos-Style-link -->
  <link rel="stylesheet" href="{{asset('asset/css/aos.css')}}">
  <!-- Coustome-Style-link -->
  <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
  <!-- Responsive-Style-link -->
  <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('asset/images/favicon.png')}}" type="image/x-icon">

</head>

<body>

  <!-- Page-wrapper-Start -->
  <div class="page_wrapper">

    <!-- Preloader -->
    <div id="preloader">
      <div id="loader"></div>
    </div>

    <!-- Header Start -->
    <header>
      <!-- container start -->
      <div class="container">
      	<!-- navigation bar -->
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('asset/images/logo.png')}}" alt="image" >
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <!-- <i class="icofont-navigation-menu ico_menu"></i> -->
              <div class="toggle-wrap">
                <span class="toggle-bar"></span>
              </div>
            </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              @foreach ( $pages as $page)

              <li class="{{$page->class1}}">
                <a class="{{$page->class2}}" href="{{url("$page->url")}}">{{$page->pageName}}</a>
             
                @if(count($page->Categories))
  
                <span class="drp_btn"><i class="icofont-rounded-down"></i></span>
                <div class="sub_menu">
                  
                  <ul>
                    @foreach ( $page->Categories as $dropdown)
                   
                    <li><a href="{{url($dropdown->url.'/'.$dropdown->id)}}">{{$dropdown->category_name}}</a></li>
                    @endforeach
                  </ul>
                  
                </div>
                
                @endif
                 </li>
              @endforeach
              {{-- <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/#features')}}">Features</a>
              </li>
              
              
	 		
			<li class="nav-item">
                <a class="nav-link" href="{{url('/#how_it_work')}}">How it works</a>
              </li>
			  
             

              <!-- secondery menu start -->
              <li class="nav-item has_dropdown">
                <a class="nav-link" href="#">Help Center</a>
                <span class="drp_btn"><i class="icofont-rounded-down"></i></span>
                <div class="sub_menu">
                  <ul>
                    <li><a href="{{url('help_center')}}">Tenants</a></li>
                    <li><a href="{{url('help_center')}}">Property Owners</a></li>
					<li><a href="{{url('help_center')}}">Others</a></li>
                  </ul>
                </div>
              </li>
              <!-- secondery menu end -->
			  
			   <li class="nav-item">
                <a class="nav-link" href="{{url('blog')}}">Blog</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact')}}">Contact</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link dark_btn" href="index.html#getstarted">GET STARTED</a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- navigation end -->
      </div>
      <!-- container end -->
    </header>


    @yield('content')


    <!-- News-Letter-Section-Start -->
       @include('partials.newsletter')
    <!-- News-Letter-Section-end -->


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
                <div class="logo"> <img src="{{asset('asset/images/footer_logo.png')}}" alt="image"></div>
                <ul>
                  <li><a href="#">{{$contact->website }}</a></li>
                  <li><a href="#">{{$contact->phone_number }}</a></li>
                </ul>
                <ul class="social_media">
                  <li><a href="{{$contact->facebook_url }}"><i class="icofont-facebook"></i></a></li>
                  <li><a href="{{$contact->twitter_url }}"><i class="icofont-twitter"></i></a></li>
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
                  @foreach ($pages as $page )
                    <li><a href="index.html">{{$page->pageName}}</a></li>
                  
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
                   <li><a href="#">{{$category->category_name}}</a></li> 
                  @endforeach
              
                </ul>
              </div>
            </div>

            <!-- footer link 4 -->
            <div class="col-lg-2 col-md-6 col-12">
              <div class="try_out">
                <h3>Let’s Try Out</h3>
                <ul class="app_btn">
                  <li>
                    <a href="#">
                      <img src="{{asset('asset/images/appstore_blue.png')}}" alt="image">
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="{{asset('asset/images/googleplay_blue.png')}}" alt="image">
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
              <p>© Copyrights 2022. All rights reserved.</p>
            </div>
            <div class="col-md-6">
              <p class="developer_text">Design & developed by <a href="https://themeforest.net/user/kalanidhithemes" target="blank">Kalanidhi Themes</a></p>
            </div>
          </div>
          <!-- row end -->
        </div>
        <!-- container end -->
      </div>

      <!-- go top button -->
    <div class="go_top">
      <span><img src="{{asset('asset/images/go_top.png')}}" alt="image"></span>
    </div>

    </footer>
    <!-- Footer-Section end -->
    
  </div>
  <!-- Page-wrapper-End -->

  <!-- Jquery-js-Link -->
  <script src="{{asset('asset/js/jquery.js')}}"></script>
  <!-- owl-js-Link -->
  <script src="{{asset('asset/js/owl.carousel.min.js')}}"></script>
  <!-- bootstrap-js-Link -->
  <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
  <!-- aos-js-Link -->
  <script src="{{asset('asset/js/aos.js')}}"></script>
  <!-- main-js-Link -->
  <script src="{{asset('asset/js/main.js')}}"></script>

</body>

</html>
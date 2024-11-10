@extends('layout.main')
@section('title','about us')
@section('content')
    <!-- BredCrumb-Section -->
    <div class="bred_crumb">
      <div class="container">
        <!-- shape animation  -->
        <span class="banner_shape1"> <img src="{{asset('asset/images/banner-shape1.png')}}" alt="image" > </span>
        <span class="banner_shape2"> <img src="{{asset('asset/images/banner-shape2.pn')}}g" alt="image" > </span>
        <span class="banner_shape3"> <img src="{{asset('asset/images/banner-shape3.png')}}" alt="image" > </span>

        <div class="bred_text">
          <h1>About us</h1>
          <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><span>»</span></li>
            <li><a href="#">About us</a></li>
          </ul>
        </div>
      </div>
    </div>


    <!-- App-Solution-Section-Start -->
    <section class="row_am app_solution_section">
      <!-- container start -->
      <div class="container">
        <!-- row start -->
        <div class="row">
          <div class="col-lg-6">
            <!-- UI content -->
            <div class="app_text">
              <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <h2>{!! $about->title1 !!}</h2>
              </div>
              {{-- <p data-aos="fade-up" data-aos-duration="1500">
                Lorem Ipsum is simply dummy text of the printing and type
                setting industry lorem Ipsum has been the industrys standard dummy text ever since the when an unknown
                printer took a galley of type and scrambled it to make a type specimen book. It has survived not only
                five centuries, but also the leap into electronic typesetting, remaining to make a type speci
                men book. It has survived essentially unchanged.
              </p>
              <p data-aos="fade-up" data-aos-duration="1500">
                Standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to
                make a type specien book. It has survived not only five centuries, but also the leap into electronic
                typesetting.
              </p> --}}
              {!! $about->content1 !!}
            </div>
          </div>
          <div class="col-lg-6">
            <div class="app_images" data-aos="fade-in" data-aos-duration="1500">
              <ul>
                <li><img src="{{asset('asset/images/abt_01.png')}}" alt=""></li>
                <li>
                  <a class="popup-youtube play-button"
                    data-url="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1" data-toggle="modal"
                    data-target="#myModal" title="About Video">
                    <img src="{{asset('asset/images/abt_02.png')}}" alt="">
                    <div class="waves-block">
                      <div class="waves wave-1"></div>
                      <div class="waves wave-2"></div>
                      <div class="waves wave-3"></div>
                    </div>
                    <span class="play_icon"><img src="{{asset('asset/images/play_black.png')}}" alt="image"></span>
                  </a>
                </li>
                <li><img src="{{asset('asset/images/abt_03.png')}}" alt=""></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- row end -->
      </div>
      <!-- container end -->
    </section>
    <!-- App-Solution-Section-end -->


    <!-- Why we are section Start -->
    <section class="row_am why_we_section" data-aos="fade-in">
      <div class="why_inner">
        <div class="container">
          <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <h2><span>Why we are different</span> from others!</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe standard
              dummy.</p>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <div class="why_box" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <div class="icon">
                  <img src="{{asset('asset/images/secure.png')}}" alt="image">
                </div>
                <div class="text">
                  <h3>Secure code</h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and type
                    setting indus ideas.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="why_box" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                <div class="icon">
                  <img src="i{{asset('asset/mages/abt_functional.png')}}" alt="image">
                </div>
                <div class="text">
                  <h3>Fully functional</h3>
                  <p>Simply dummy text of the printing and typesetting indus lorem Ipsum is dummy.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="why_box" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                <div class="icon">
                  <img src="{{asset('asset/images/communication.png')}}" alt="image">
                </div>
                <div class="text">
                  <h3>Best communication</h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and type
                    setting indus ideas.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="why_box" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400">
                <div class="icon">
                  <img src="{{asset('asset/images/abt_support.png')}}" alt="image">
                </div>
                <div class="text">
                  <h3>24-7 Support</h3>
                  <p>Simply dummy text of the printing and typesetting indus lorem Ipsum is dummy.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- About-App-Section-Start -->
    <section class="row_am about_app_section about_page_sectino">
      <!-- container start -->
      <div class="container">
        <!-- row start -->
        <div class="row">
          <div class="col-lg-6">
            <!-- about images -->
            <div class="abt_img" data-aos="fade-in" data-aos-duration="1500">
                <img src="{{asset('asset/images/about_main.png')}}" alt="image">
            </div>
          </div>
          <div class="col-lg-6">
            <!-- about text -->
            <div class="about_text">
              <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <!-- h2 -->
                <h2> {!! $about->title2 !!}</h2>
                <!-- p -->
                <p>
                  {!! $about->content2 !!}
                </p>
              </div>
              <!-- UL -->
              <ul class="app_statstic" id="counter" data-aos="fade-in" data-aos-duration="1500">
                <li>
                  <div class="icon">
                    <img src="{{asset('asset/images/download.png')}}" alt="image">
                  </div>
                  <div class="text">
                    <p><span class="counter-value" data-count="{{$home->total_downloads}}">0</span><span>+</span></p>
                    <p>Download</p>
                  </div>
                </li>
                <li>
                  <div class="icon">
                    <img src="{{asset('asset/images/followers.png')}}" alt="image">
                  </div>
                  <div class="text">
                    <p><span class="counter-value" data-count="{{$home->total_users}}">0 </span><span>K+</span></p>
                    <p>Followers</p>
                  </div>
                </li>
                <li>
                  <div class="icon">
                    <img src="{{asset('asset/images/reviews.png')}}" alt="image">
                  </div>
                  <div class="text">
                    <p><span class="counter-value" data-count="{{$reviews->count()}}">1500</span><span>+</span></p>
                    <p>Reviews</p>
                  </div>
                </li>
                <li>
                  <div class="icon">
                    <img src="{{asset('asset/images/countries.png')}}" alt="image">
                  </div>
                  <div class="text">
                    <p><span class="counter-value" data-count="{{$home->total_countries}}">0</span><span>+</span></p>
                    <p>Countries</p>
                  </div>
                </li>
              </ul>
              <!-- UL end -->
            </div>
          </div>
        </div>
        <!-- row end -->
      </div>
      <!-- container end -->
    </section>
    <!-- About-App-Section-end -->


    <!--Experts Team Section Start  -->
    <section class="row_am experts_team_section">
      <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
          <!-- h2 -->
          <h2> Meet our <span> experts </span></h2>
          <!-- p -->
          <p>
            Discover the team behind our success. With expertise across various fields, our professionals are dedicated to delivering exceptional results. <br> Each expert brings a unique perspective and a wealth of knowledge to our work.
        </p>
        </div>
        <div class="row">
            @foreach ($experts as $expert)

          <div class="col-md-6 col-lg-3"  data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <div class="experts_box">
              {{-- <img src="{{asset('asset/images/experts_01.png')}}" alt="image"> --}}
              @if (count($expert->images))
                  <img src="{{asset('storage/experts/images/'.$expert->images[0]->path) }}" alt="{{$expert->images[0]->path}}">
              @endif
              <div class="text">
                <h3>{{$expert->name}}</h3>
                <span>{{$expert->title}}</span>
                <ul class="social_media">
                  {{-- <li><a href="#"><i class="icofont-facebook"></i></a></li> --}}
                  <li><a href="{{$expert->linkedin}}"><i class="icofont-linkedin"></i></a></li>
                  <li><a href="{{$expert->instagram}}"><i class="icofont-twitter"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach

          {{--
          <div class="col-md-6 col-lg-3"  data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
            <div class="experts_box">
              <img src="{{asset('asset/images/experts_01.png')}}" alt="image">
              <div class="text">
                <h3>Steav Joe</h3>
                <span>CEO & Co-Founder</span>
                <ul class="social_media">
                  <li><a href="#"><i class="icofont-facebook"></i></a></li>
                  <li><a href="#"><i class="icofont-twitter"></i></a></li>
                  <li><a href="#"><i class="icofont-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3"  data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
            <div class="experts_box">
              <img src="{{asset('asset/images/experts_02.png')}}" alt="image">
              <div class="text">
                <h3>Mark Dele</h3>
                <span>Co-Founder</span>
                <ul class="social_media">
                  <li><a href="#"><i class="icofont-facebook"></i></a></li>
                  <li><a href="#"><i class="icofont-twitter"></i></a></li>
                  <li><a href="#"><i class="icofont-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3"  data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
            <div class="experts_box">
              <img src="{{asset('asset/images/experts_03.png')}}" alt="image">
              <div class="text">
                <h3>Jolley Sihe</h3>
                <span>Business Developer</span>
                <ul class="social_media">
                  <li><a href="#"><i class="icofont-facebook"></i></a></li>
                  <li><a href="#"><i class="icofont-twitter"></i></a></li>
                  <li><a href="#"><i class="icofont-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3"  data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400">
            <div class="experts_box">
              <img src="{{asset('asset/images/experts_04.png')}}" alt="image">
              <div class="text">
                <h3>Rimy Nail</h3>
                <span>Marketing & Sales</span>
                <ul class="social_media">
                  <li><a href="#"><i class="icofont-facebook"></i></a></li>
                  <li><a href="#"><i class="icofont-twitter"></i></a></li>
                  <li><a href="#"><i class="icofont-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </section>


    <!-- Query Section Start -->
    <section class="row_am query_section">
      <div class="query_inner" data-aos="fade-in" data-aos-duration="1500">
          <div class="container">
            <!-- shape animation  -->
            <span class="banner_shape1"> <img src="{{asset('asset/images/banner-shape1.png')}}" alt="image" > </span>
            <span class="banner_shape2"> <img src="{{asset('asset/images/banner-shape2.png')}}" alt="image" > </span>
            <span class="banner_shape3"> <img src="{{asset('asset/images/banner-shape3.png')}}" alt="image" > </span>

              <div class="section_title">
                  <h2>Have any query about ?</h2>
                  <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe standard dummy.</p>
              </div>
              <a href="#" class="btn white_btn">CONTACT US NOW</a>
          </div>
      </div>
    </section>


    <!-- Trusted Section start -->
    <section class="row_am trusted_section mt-0 about_trust_section">
      <!-- container start -->
      <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
          <!-- h2 -->
          <h2>Trusted by <span>150+</span> companies</h2>
          <!-- p -->
          <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe
            standard dummy.</p>
        </div>

        <!-- logos slider start -->
        <div class="company_logos">
          <div id="company_slider" class="owl-carousel owl-theme">
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/paypal.png')}}" alt="image">
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/spoty.png')}}" alt="image">
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/shopboat.png')}}" alt="image">
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/slack.png')}}" alt="image">
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/envato.png')}}" alt="image">
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/paypal.png')}}" alt="image">
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/spoty.png')}}" alt="image">
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/shopboat.png')}}" alt="image">
              </div>
            </div>
          </div>
        </div>
        <!-- logos slider end -->
      </div>
      <!-- container end -->
    </section>
    <!-- Trusted Section ends -->


    <!-- News-Letter-Section-Start -->
   @include('partials.newsletter')
    <!-- News-Letter-Section-end -->


  @endsection

@extends('layout.main')
@section('title', 'EstateGO:: All-in-one Property and Tenant Management System')
@section('content')


    <!-- Banner-Section-Start -->
    <section class="banner_section">
        {{-- {{dd($newsletterSuccess)}} --}}

        @if (isset($_GET['newsletterSuccess']))
            <div class="container content-justify-center">
                {!! "<div class='alert alert-success'>" . $_GET['newsletterSuccess'] . '</div>' !!}
            </div>
        @endif


        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1500">
                    <!-- banner text -->
                    <div class="banner_text">
                        <!-- h1 -->
                        <h1> {{ $home->h1 }}</h1>
                        <!-- h2 -->
                        <h2>{!! $home->h2_orange !!}</h2>
                        <!-- p -->
                        {!! $home->caption !!}
                    </div>
                    <!-- app buttons -->
                    <ul class="app_btn">
                        <li>
                            <a href="{{ $home->appstore_url }}">
                                <img class="blue_img" src="{{ asset('asset/images/appstore_blue.png') }}" alt="image">
                                <img class="white_img" src="{{ asset('asset/images/appstore_white.png') }}" alt="image">
                            </a>
                        </li>
                        <li>
                            <a href="{{ $home->googleplay_url }}"">
                                <img class="blue_img" src="{{ asset('asset/images/googleplay_blue.png') }}" alt="image">
                                <img class="white_img" src="{{ asset('asset/images/googleplay_white.png') }}"
                                    alt="image"> </a>
                        </li>
                    </ul>

                    <!-- users -->
                    <div class="used_app">
                        <ul>
                            <li><img src="{{ asset('asset/images/used01.png') }}" alt="image"></li>
                            <li><img src="{{ asset('asset/images/used02.png') }}" alt="image"></li>
                            <li><img src="{{ asset('asset/images/used03.png') }}" alt="image"></li>
                            <li><img src="{{ asset('asset/images/used04.png') }}" alt="image"></li>
                        </ul>
                        <p>{{ $home->total_users }} + <br> use this app</p>
                    </div>
                </div>

                <!-- banner slides start -->
                <div class="col-lg-6 col-md-12" data-aos="fade-in" data-aos-duration="1500">
                    <div class="banner_image">
                        <img src="{{ asset('asset/images/hero-image.png') }}" alt="image">

                        <!-- video section start -->
                        <div class="yt_video">
                            <div class="thumbnil">
                                <a class="popup-youtube play-button"
                                    data-url="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1"
                                    data-toggle="modal" data-target="#myModal" title="XJj2PbenIsU">
                                    <span class="play_btn">
                                        <img src="{{ asset('asset/images/play_icon.png') }}" alt="image">
                                        <div class="waves-block">
                                            <div class="waves wave-1"></div>
                                            <div class="waves wave-2"></div>
                                            <div class="waves wave-3"></div>
                                        </div>
                                    </span> </a>
                            </div>
                        </div>
                        <!-- video section end -->
                    </div>
                </div>
                <!-- banner slides end -->
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </section>
    <!-- Banner-Section-end -->

    <!-- Trusted Section start -->
    <section class="row_am trusted_section">
        <!-- container start -->
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <!-- h2 -->
                <h2>Trusted by over<span>{{ ' ' . $clients->count() }}</span> companies</h2>
                <!-- p -->
                <p>{{ $clientHomeContent->home_content }}</p>
            </div>

            <!-- logos slider start -->



            <div class="company_logos">
                <div id="company_slider" class="owl-carousel owl-theme">

                    @foreach ($clients as $client)
                        <div class="item">
                            <div class="logo">
                                @if (count($client->images))
                                    <img src="{{ asset('storage/clients/images/' . $client->images[0]->path) }}"
                                        alt="{{ $client->images[0]->path }}"
                                        style="width: 100px; height: 50px; object-fit: cover;">
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/mendipp.png')}}" alt="image" >
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/admiraltyhomes.png')}}" alt="image" >
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/estatelinks.png')}}" alt="image" >
              </div>
            </div>
            <div class="item">
              <div class="logo">
               <img src="{{asset('asset/images/mendipp.png')}}" alt="image" >
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/admiraltyhomes.png')}}" alt="image" >
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/estatelinks.png')}}" alt="image" >
              </div>
            </div>
            <div class="item">
              <div class="logo">
                <img src="{{asset('asset/images/mendipp.png')}}" alt="image" >
              </div>
            </div> --}}
                </div>
            </div>

            <!-- logos slider end -->
        </div>
        <!-- container end -->
    </section>
    <!-- Trusted Section ends -->


    <!-- Features-Section-Start -->
    <section class="row_am features_section" id="features">
        <!-- container start -->
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <!-- h2 -->
                <h2><span>Features</span> that make EstateGO different!</h2>
                <!-- p -->
                <p>Our revolutionary app provides effective property management solutions for property owners, facility
                    managers and tenants <br>by streamlining operations, saving time and effort, and maximizing profits all
                    from the comfort of your smartphone.</p>.
            </div>
            <div class="feature_detail">
                <!-- feature box left -->
                <div class="left_data feature_box">

                    <!-- feature box -->
                    @foreach ($rightFeatures as $feature)
                        <div class="data_block" data-aos="fade-right" data-aos-duration="1500">
                            <div class="icon">
                                <!--<img src="images/secure_data.png" alt="image" >-->
                            </div>
                            <div class="text">
                                <h4>{{ $feature->title }} </h4>
                                <p>{{ $feature->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- feature box right -->
                <div class="right_data feature_box">
                    @foreach ($leftFeatures as $feature)
                        <!-- feature box -->
                        <div class="data_block" data-aos="fade-left" data-aos-duration="1500">
                            <div class="icon">
                                <!--<img src="images/live-chat.png" alt="image" >-->
                            </div>
                            <div class="text">
                                <h4>{{ $feature->title }} </h4>
                                <p>{{ $feature->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- feature image -->
                <div class="feature_img" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100"><img
                        src="{{ asset('asset/images/features_frame.png') }}" alt="image" width="350"></div>
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- Features-Section-end -->

    <!-- About-App-Section-Start -->
    <section class="row_am about_app_section">
        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-lg-6">

                    <!-- about images -->
                    <div class="about_img" data-aos="fade-in" data-aos-duration="1500">
                        <div class="frame_img">
                            <img class="moving_position_animatin" src="{{ asset('asset/images/about-frame.png') }}"
                                alt="image" height="580">
                        </div>
                        <div class="screen_img">
                            <img class="moving_animation" src="{{ asset('asset/images/about-screen.png') }}"
                                alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <!-- about text -->
                    <div class="about_text">
                        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">

                            <!-- h2 -->
                            {!! $home->h2 !!}

                            <!-- p -->
                            {!! $home->caption2 !!}
                        </div>

                        <!-- UL -->
                        <ul class="app_statstic" id="counter" data-aos="fade-in" data-aos-duration="1500">
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('asset/images/download.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <p><span class="counter-value"
                                            data-count="{{ $home->total_downloads }}">0</span>K+<span></span></p>
                                    <p>Download</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('asset/images/followers.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <p><span class="counter-value" data-count="{{ $home->total_household }}">0
                                        </span><span>K+</span></p>
                                    <p>Households</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('asset/images/city.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <p><span class="counter-value"
                                            data-count="{{ $home->total_cities }}">0</span><span>+</span></p>
                                    <p>Cities</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="{{ asset('asset/images/countries.png') }}" alt="image">
                                </div>
                                <div class="text">
                                    <p><span class="counter-value"
                                            data-count="{{ $home->total_countries }}">0</span><span></span></p>
                                    <p>Countries</p>
                                </div>
                            </li>
                        </ul>
                        <!-- UL end -->
                        <a href="#" class="btn puprple_btn" data-aos="fade-in" data-aos-duration="1500">Sign up &
                            Share</a>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </section>
    <!-- About-App-Section-end -->

    <!-- ModernUI-Section-Start -->
    <section class="row_am modern_ui_section">
        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- UI content -->
                    <div class="ui_text">
                        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                            {!! $home2->h2 !!}{!! $home2->h2_orange !!}
                            {!! $home2->description !!}
                        </div>

                        <ul class="design_block">
                            @foreach ($homePros as $pros)
                                <li data-aos="fade-up" data-aos-duration="1500">
                                    <h4>{{ $pros->h2 }}</h4>
                                    <p>{{ $pros->caption }}</p>
                                </li>
                                {{-- <li data-aos="fade-up" data-aos-duration="1500">
                  <h4>Easy to Use</h4>
                  <p>Simply dummy text of the printing and typesetting inustry lorem Ipsum has Lorem dollar summit.</p>
                </li>
                <li data-aos="fade-up" data-aos-duration="1500">
                  <h4>Convenient</h4>
                  <p>Printing and typesetting industry lorem Ipsum has been the industrys standard dummy text of type
                    setting.</p>
                </li> --}}
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- UI Image -->
                    <div class="ui_images" data-aos="fade-in" data-aos-duration="1500">
                        <div class="left_img">
                            <img class="moving_position_animatin" src="{{ asset('asset/images/modern01.png') }}"
                                alt="image">
                        </div>
                        <!-- UI Image -->
                        <div class="right_img">
                            <img class="moving_position_animatin" src="{{ asset('asset/images/secure_data.png') }}"
                                alt="image">
                            <img class="moving_position_animatin" src="{{ asset('asset/images/modern02.png') }}"
                                alt="image">
                            <img class="moving_position_animatin" src="{{ asset('asset/images/modern03.png') }}"
                                alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </section>
    <!-- ModernUI-Section-end -->

    <!-- How-It-Workes-Section-Start -->
    <section class="row_am how_it_works" id="how_it_work">
        <!-- container start -->
        <div class="container">
            <div class="how_it_inner">
                <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                    <!-- h2 -->
                    <h2><span>How it works</span> - 3 easy steps</h2>
                    <!-- p -->
                    <p> EstateGO makes property management effortless with just three simple steps. <br> Download the app,
                        manage your properties seamlessly, and enjoy a world of convenience at your fingertips.
                    </p>
                </div>
                <div class="step_block">

                    <!-- row start -->
                    <div class="row ">
                        <!-- step box -->
                        <div class="col-md-4 col-sm-12">
                            <div class="step_box">
                                <!-- icon -->
                                <div class="step_img" data-aos="fade-left" data-aos-duration="1500">
                                    <img src="{{ asset('asset/images/step1.png') }}" alt="image">
                                    <div class="step_number">
                                        <h3>01</h3>
                                    </div>
                                </div>
                                <!-- text -->
                                <div class="step_text" data-aos="fade-right" data-aos-duration="1500">
                                    <h4>Download & Sign up for Free</h4> <span></span>
                                    <div class="app_icon">
                                        <a href="#"><i class="icofont-brand-android-robot"></i></a>
                                        <a href="#"><i class="icofont-brand-apple"></i></a>
                                    </div>
                                    <p>Download EstateGO App from either Android or IOS store</p>
                                </div>
                            </div>
                        </div>

                        <!-- step box -->
                        <div class="col-md-4 col-sm-12">
                            <div class="step_box">
                                <!-- icon -->
                                <div class="step_img" data-aos="fade-left" data-aos-duration="1500">
                                    <img src="{{ asset('asset/images/step2.png') }}" alt="image">
                                    <div class="step_number">
                                        <h3>02</h3>
                                    </div>
                                </div>
                                <!-- text -->
                                <div class="step_text step2" data-aos="fade-right" data-aos-duration="1500">
                                    <h4>Create properties & Start Managing</h4>

                                    <p>Create and manage properties no matter the property location.</p>
                                </div>
                            </div>
                        </div>

                        <!-- step box -->
                        <div class="col-md-4 col-sm-12">
                            <div class="step_box">
                                <!-- icon -->
                                <div class="step_img" data-aos="fade-left" data-aos-duration="1500">
                                    <img src="{{ asset('asset/images/step3.png') }}" alt="image">
                                    <div class="step_number">
                                        <h3>03</h3>
                                    </div>
                                </div>
                                <!-- text -->
                                <div class="step_text step3" data-aos="fade-right" data-aos-duration="1500">
                                    <h4>It’s done, enjoy the app</h4>
                                    <span>Need Help? Check our <a
                                            href="{{ url('/tenant/1' . '?subcategory=GETTING STARTED') }}">Help
                                            Center</a></span>
                                    <p>Get most amazing app experience, <a href="#downloadApp">Explore and share</a> the
                                        EstateGO App</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- container end -->
    </section>
    <!-- How-It-Workes-Section-end -->

    <!-- Testimonial-Section start -->
    <section class="row_am testimonial_section">
        <!-- container start -->
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                <!-- h2 -->
                <h2>What our <span>customer say</span></h2>
                <!-- p -->
                <p>To prove the value of what EstateGO have to offer, why not let our happy customers do the talking.</p>
            </div>
            <div class="testimonial_block" data-aos="fade-in" data-aos-duration="1500">
                <div id="testimonial_slider" class="owl-carousel owl-theme">
                    <!-- user 1 -->
                    @foreach ($reviews as $review)
                        <div class="item">
                            <div class="testimonial_slide_box">
                                {{-- <div class="rating">
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                </div> --}}

                                <p class="review">
                                    {{ $review->content }}
                                </p>
                                <div class="testimonial_img">
                                    @if ($review->images->isNotEmpty())
                                        <img src="{{ asset('storage/testimonials/images/' . $review->images[0]->path) }}"
                                            alt="image">
                                    @endif
                                </div>
                                <h3>{{ $review->name }}</h3>
                                <span class="designation">{{ $review->position }}</span>

                            </div>
                        </div>
                    @endforeach
                    <!-- user 2 -->
                    {{-- <div class="item">
              <div class="testimonial_slide_box">
                <div class="rating">
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>                </div>
                <p class="review">
                  “ Lorem Ipsum is simply dummy text of the printing and typese tting us orem Ipsum has been lorem
                  beenthe standar dummy. ”                </p>
                <div class="testimonial_img">
                  <img src="{{asset('asset/images/testimonial_user2.png')}}" alt="image" >                </div>
                <h3>Willium Den</h3>
                <span class="designation">CEO, Careative inc</span>              </div>
            </div>
             --}}
                    <!-- user 3 -->
                    {{-- <div class="item">
              <div class="testimonial_slide_box">
                <div class="rating">
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>                </div>
                <p class="review">
                  “ Lorem Ipsum is simply dummy text of the printing and typese tting us orem Ipsum has been lorem
                  beenthe standar dummy. ”                </p>
                <div class="testimonial_img">
                  <img src="{{asset('asset/images/testimonial_user3.png')}}" alt="image" >                </div>
                <h3>Cyrus Stephen</h3>
                <span class="designation">CEO, Careative inc</span>              </div>
            </div> --}}
                </div>

                <!-- total review -->
                <div class="total_review">
                    {{-- <div class="rating">
              <span><i class="icofont-star"></i></span>
              <span><i class="icofont-star"></i></span>
              <span><i class="icofont-star"></i></span>
              <span><i class="icofont-star"></i></span>
              <span><i class="icofont-star"></i></span>
              <p>5.0 / 5.0</p>
            </div> --}}
                    <h3>{{ $reviews->count() }}</h3>
                    <a href="#">TOTAL USER REVIEWS <i class="icofont-arrow-right"></i></a>
                </div>

                <!-- avtar faces -->
                {{-- <div class="avtar_faces">
            <img src="{{asset('asset/images/avtar_testimonial.png')}}" alt="image" >
          </div> --}}
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- Testimonial-Section end -->

    <!-- Pricing-Section -->
    <!-- Pricing Codes Here-->
    <!-- Pricing-Section end -->

    <!-- FAQ-Section start -->
    <section class="row_am faq_section">
        <!-- container start -->
        <div class="container">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                <!-- h2 -->
                <h2><span>FAQ</span> - Frequently Asked Questions</h2>
                <!-- p -->
                <p> Find answers to the most common questions about EstateGO. <br> Whether you're a new or seasoned user,
                    we’ve got you covered.
                </p>
            </div>
            <!-- faq data -->
            <div class="faq_panel">
                <div class="accordion" id="accordionExample">
                    @foreach ($featuredFaq as $faq)
                        <div class="card" data-aos="fade-up" data-aos-duration="1500">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button type="button" class="btn btn-link active" data-toggle="collapse"
                                        data-target="#faq_{{ $faq->id }}">
                                        <i class="icon_faq icofont-plus"></i></i> {{ $faq->question }}</button>
                                </h2>
                            </div>
                            <div id="faq_{{ $faq->id }}" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="card" data-aos="fade-up" data-aos-duration="1500">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                    data-target="#collapseTwo"><i class="icon_faq icofont-plus"></i></i> How to setup account ?</button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has. been the
                    industrys standard dummy text ever since the when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five cen turies but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
              </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-duration="1500">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                    data-target="#collapseThree"><i class="icon_faq icofont-plus"></i></i>What is process to get refund
                    ?</button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has. been the
                    industrys standard dummy text ever since the when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five cen turies but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
              </div>
            </div>
            <div class="card" data-aos="fade-up" data-aos-duration="1500">
              <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                    data-target="#collapseFour"><i class="icon_faq icofont-plus"></i></i>What is process to get refund
                    ?</button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has. been the
                    industrys standard dummy text ever since the when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five cen turies but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
              </div>
            </div> --}}
                </div>
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- FAQ-Section end -->

    <!-- Beautifull-interface-Section start -->
    <section class="row_am interface_section">
        <!-- container start -->
        <div class="container-fluid">
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                <!-- h2 -->
                <h2>Beautiful <span>Interface</span></h2>
                <!-- p -->
                <p>
                    Explore a visually stunning interface that seamlessly combines functionality and elegance.
                    <br>Our design ensures an intuitive user experience, bringing your ideas to life with style and
                    efficiency.
                </p>
            </div>

            <!-- screen slider start -->
            <div class="screen_slider">
                <div id="screen_slider" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="screen_frame_img">
                            <img src="{{ asset('asset/images/screen-3.jpg') }}" alt="image">
                        </div>
                    </div>
                    <div class="item">
                        <div class="screen_frame_img">
                            <img src="{{ asset('asset/images/screen-4.jpg') }}" alt="image">
                        </div>
                    </div>
                    <div class="item">
                        <div class="screen_frame_img">
                            <img src="{{ asset('asset/images/screen-5.jpg') }}" alt="image">
                        </div>
                    </div>
                    <div class="item">
                        <div class="screen_frame_img">
                            <img src="{{ asset('asset/images/screen-4.jpg') }}" alt="image">
                        </div>
                    </div>
                    <div class="item">
                        <div class="screen_frame_img">
                            <img src="{{ asset('asset/images/screen-3.jpg') }}" alt="image">
                        </div>
                    </div>
                    <div class="item">
                        <div class="screen_frame_img">
                            <img src="{{ asset('asset/images/screen-2.jpg') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- screen slider end -->
        </div>
        <!-- container end -->
    </section>
    <!-- Beautifull-interface-Section end -->

    <!-- Download-Free-App-section-Start  -->
    <section class="row_am free_app_section" id="getstarted">
        <!-- container start -->
        <div class="container">
            <div class="free_app_inner">
                <!-- row start -->
                <div class="row">
                    <!-- content -->
                    <div class="col-md-6">
                        <div class="free_text">
                            <div class="section_title" id='downloadApp'>
                                <h2>Download EstateGO for Free</h2>
                                <p>Get instant access to the EstateGO app on both the Apple App Store and Google Play Store!
                                    Manage your properties, stay connected, and simplify your tasks—all in one app.
                                </p>
                                <p>Download now and experience seamless property management at your fingertips!
                                </p>
                            </div>
                            <ul class="app_btn">
                                <li>
                                    <a href="{{ url($appdownload->url) }}">
                                        <img src="{{ asset('asset/images/appstore_blue.png') }}" alt="image"> </a>
                                </li>
                                <li>
                                    <a href="{{ url($appdownload->url) }}">
                                        <img src="{{ asset('asset/images/googleplay_blue.png') }}" alt="image"> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- images -->
                    <div class="col-md-6">
                        <div class="free_img">
                            <img src="{{ asset('asset/images/download-screen01.png') }}" alt="image">
                            <img class="mobile_mockup" src="{{ 'asset/images/about-frame.png' }}" alt="image">
                        </div>
                    </div>
                </div>
                <!-- row end -->
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- Download-Free-App-section-end  -->

    @include('partials.latestnews')


    <!-- News-Letter-Section-Start -->
    @include('partials.newsletter')
    <!-- News-Letter-Section-end -->




@endsection

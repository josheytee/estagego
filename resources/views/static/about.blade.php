@extends('layout.plain')
@section('title','about us')
@section('content')

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
                {!! htmlspecialchars_decode($about->content1) !!}
              </div>
            </div>
            <div class="col-lg-6">
              <div class="app_images" data-aos="fade-in" data-aos-duration="1500">
                <ul>
                  <li>
                    <a class="popup-youtube play-button"
                    data-url="https://www.youtube.com/embed/4jnzf1yj48M?autoplay=1&mute=1" data-toggle="modal"
                    data-target="#myModal" title="About Video">
                    {{-- <img src="{{asset('asset/images/about/construct.jpg')}}" style="width:250px"  alt=""> --}}
                    <img src="{{asset('asset/images/about/smiling_house.avif')}}" style="width: 400px" alt="">
                    <div class="waves-block">
                      <div class="waves wave-1"></div>
                      <div class="waves wave-2"></div>
                      <div class="waves wave-3"></div>
                    </div>
                    <span class="play_icon"><img src="{{asset('asset/images/play_black.png')}}" alt="image"></span>
                  </a>
                </li>
                  <li>
                    <a class="popup-youtube play-button"
                      data-url="https://www.youtube.com/embed/4jnzf1yj48M?autoplay=1&mute=1" data-toggle="modal"
                      data-target="#myModal" title="About Video">
                      <img src="{{asset('asset/images/about/construct.jpg')}}" style="width:250px"  alt="">
                      <div class="waves-block">
                        <div class="waves wave-1"></div>
                        <div class="waves wave-2"></div>
                        <div class="waves wave-3"></div>
                      </div>
                      <span class="play_icon"><img src="{{asset('asset/images/play_black.png')}}" alt="image"></span>
                    </a>
                  </li>
                  <li>
                    <a class="popup-youtube play-button"
                    data-url="https://www.youtube.com/embed/4jnzf1yj48M?autoplay=1&mute=1" data-toggle="modal"
                    data-target="#myModal" title="About Video">
                    <img src="{{asset('asset/images/about/house_keys.avif')}}" style="width: 300px;height: 300px;object-fit: cover;" alt="">
                    {{-- <img src="{{asset('asset/images/about/construct.jpg')}}" style="width:250px"  alt=""> --}}
                    <div class="waves-block">
                      <div class="waves wave-1"></div>
                      <div class="waves wave-2"></div>
                      <div class="waves wave-3"></div>
                    </div>
                    <span class="play_icon"><img src="{{asset('asset/images/play_black.png')}}" alt="image"></span>
                  </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- row end -->
        </div>
        <!-- container end -->
      </section>
      <!-- App-Solution-Section-end -->
@endsection

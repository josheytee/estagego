@extends('layout.main')
@section('title','EstateGO: services')
@section('content')

{{-- <div class="mt-5"> --}}

    <!-- BredCrumb-Section -->
    <div class="bred_crumb">
      <div class="container">
        <!-- shape animation  -->
        <span class="banner_shape1"> <img src="{{asset('asset/images/banner-shape1.png')}}" alt="image" > </span>
        <span class="banner_shape2"> <img src="{{asset('asset/images/banner-shape2.png')}}" alt="image" > </span>
        <span class="banner_shape3"> <img src="{{asset('asset/images/banner-shape3.png')}}" alt="image" > </span>

        <div class="bred_text">
          <h1>Services</h1>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><span>»</span></li>
            <li>
                <a href="blog-list.html">
                    {{$pages->Page->pageName}}
                </a>
            </li>
          </ul>
          <div class="search_bar">
            <form action="">
                <div class="form-group">
                    <input type="text" placeholder="Search here" class="form-control">
                    <button class="btn" type="submit"><i class="icofont-search-1"></i></button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Story-Section-Start -->
   <section class="row_am latest_story" id="blog">
     <!-- container start -->
      <div class="container " >
          <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
              <h2>Our <span>Services</span></h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe standard dummy.</p>
          </div>
          <!-- row start -->
          <div class="row mt-5" style="margin-top: 10%;">
          	<!-- story -->
            @foreach($servicesPage as $services )
                @foreach ($services->ServicePage as $service )
                    
               
            <div class="col-md-4 mt-5">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                      <img src="{{asset('asset/images/'.$service->image)}}" alt="image" >
                      {{-- <img src="{{$service->image}}" alt="image" > --}}
                      
                    </div>
                    <div class="story_text">
                        <h3>{{$service->title}}</h3>
                        <p>{{Str::limit($service->content, 70)}}</p>
                        <a href="{{url('services/'.$service->id)}}">READ MORE</a>
                    </div>
                </div>
            </div>
             @endforeach
            @endforeach

            <!-- story -->
            {{-- <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                      <img src="{{asset('asset/images/banner.jpg')}}" alt="image" >
                      <span>45 min ago</span>                    </div>
                    <div class="story_text">
                          <h3>Top rated app! Yupp.</h3>
                        <p>Simply dummy text of the printing and typesetting industry lorem Ipsum has Lorem Ipsum is.</p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
            </div> --}}

            <!-- story -->
            {{-- <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                      <img src="{{asset('asset/images/banner1.png')}}" alt="image" >
                      <span>45 min ago</span>                    </div>
                    <div class="story_text">
                          <h3>Creative ideas on app.</h3>
                        <p>Printing and typesetting industry lorem Ipsum has Lorem simply dummy text of the.</p>
                        <a href="#">READ MORE</a>
                    </div>
                </div>
            </div> --}}
          </div>
          <!-- row end -->
      </div>
      <!-- container end -->
    </section>
    <!-- Story-Section-end -->
{{-- </div> --}}

@include('partials.newsletter')

@endsection
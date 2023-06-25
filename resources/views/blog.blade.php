@extends('layout.inner')
  @section('title','EstateGo:Blogs')
   @section('content')

   
    <!-- BredCrumb-Section -->
    <div class="bred_crumb">
      <div class="container">
        <!-- shape animation  -->
        <span class="banner_shape1"> <img src="{{asset('asset/images/banner-shape1.png')}}" alt="image" > </span>
        <span class="banner_shape2"> <img src="{{asset('asset/images/banner-shape2.png')}}" alt="image" > </span>
        <span class="banner_shape3"> <img src="{{asset('asset/images/banner-shape3.png')}}" alt="image" > </span>

        <div class="bred_text">
          <h1>Latest blog post</h1>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><span>»</span></li>
            <li><a href="blog-list.html">Blog list</a></li>
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


    <!-- Blog-Detail-Section-Start -->
    <section class="row_am blog_list_main">
      <!-- container start -->
      <div class="container">
        <!-- row start -->
        <div class="row">

          <div class="col-lg-6" data-aos="fade-in" data-aos-duration="1500">
            <div class="blog_img">
                {{-- <img src="{{asset('asset/images/'.$blogPost->image)}}" alt="image"> --}}
                <img src="{{$blogPost->image}}" alt="image">
                <span>
                  @php
                  $time=strtotime($blogPost->updated_at);
                  $duration=Date('h\h i\ \m\i\n',$time);
                  echo($duration);
                  @endphp
                </span>
            </div>
          </div>
          <div class="col-lg-6">
              <div class="blog_text">
                <span class="choice_badge">EDITOR CHOICE</span>
                <div class="section_title">
                  <h2>{{$blogPost->title}}</h2>
                  <p> {{Str::limit($blogPost->content,200)}}</p>
                    <a href="{{url('blog_view/'.$blogPost->id)}}">READ MORE</a>
                </div>
              </div>
          </div>
        </div>
        <!-- row end -->
      </div>
      <!-- container end -->
    </section>
    <!-- Blog-Detail-Section-end -->

    <!-- Story-Section-Start -->
    <section class="row_am latest_story blog_list_story" id="blog">
      <!-- container start -->
      <div class="container">
          <!-- row start -->
          <div class="row">

          @foreach($blogPost2 as $post)
            <!-- story -->
            <div class="col-md-4">
                <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                    <div class="story_img">
                      <img src="{{asset('asset/images/'.$post->image)}}" alt="image" >
                      {{-- <img src="{{$post->image}}" alt="image" > --}}
                      <span>
                         @php
                            $time=strtotime($post->updated_at);
                            $duration=Date('h\h i\ \m\i\n',$time);
                            echo($duration);
                         @endphp
                      </span>
                    </div>
                    <div class="story_text">
                        <h3>{{$post->title}}</h3>
                        <p>{{Str::limit($post->content, 100)}}</p>
                        <a href="{{url('blog_view/'.$post->id)}}">READ MORE</a>
                    </div>
                </div>
            </div>
          @endforeach
          <div class="pagination_block container">
            <ul>
              <li>
          {{$blogPost2->links()}}
              </li>
              <ul>

          </div>
          <!-- row end -->

          <!-- Pagination -->
          {{-- <div class="pagination_block">
            <ul>
              <li><a href="#" class="prev"><i class="icofont-arrow-left"></i> Prev</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#" class="active">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">6</a></li>
              <li><a href="#" class="next">Next <i class="icofont-arrow-right"></i></a></li>
            </ul>
          </div> --}}
      </div>
      <!-- container end -->
    </section>
    <!-- Story-Section-end -->


    @endsection
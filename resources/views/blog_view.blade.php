@extends('layout.inner')
   @section('content')


    <!-- BredCrumb-Section -->
    <div class="bred_crumb blog_detail_bredcrumb">
      <div class="container">
        <div class="bred_text">
          <h1>Blog details</h1>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><span>»</span></li>
            <li><a href="blog-detail.html"> Blog single</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Blog Details Block -->
    <section class="blog_detail_section">
      <div class="container">
        <div class="blog_inner_pannel">
            <div class="review">
              <span>Review</span>
              <span>45 min ago</span>
            </div>
            <div class="section_title">
              <h2>Top rated app of the year!</h2>
            </div>
            <div class="main_img">
              <img src="{{asset('asset/images/blog_detail_main.png')}}" alt="image">
            </div>
            <div class="info">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic Lorem Ipsum is simply dummy text of the printing and typesettingindustry lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
              <p>Printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unnown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic Lorem Ipsum is simply dummy text of the printing and typesettingindustry lorem Ipsum has been the industrys centuries, but also the leap into electronic.</p>
              <h3>Why we are best</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</p>
              <ul>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Lorem Ipsum is simply dummy text of the printing and typesetting in </p></li>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Dustry lorem Ipsum has been the industrys standard dummy text ev er since the when</p></li>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Unknown printer took a galley of type and scrambled it to make.</p></li>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Type specimen book. It has survived not only five centuries, but also the leap into electronic.</p></li>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Lorem Ipsum is simply dummy text of the printing.</p></li>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Dustry lorem Ipsum has been the industrys standard dummy text ev er since.</p></li>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Unknown printer took a galley of type and scrambled it to make.</p></li>
                <li><p> <span class="icon"><i class="icofont-check-circled"></i></span> Type specimen book. It has survived not only.</p></li>
              </ul>
            </div>
            <div class="two_img">
              <div class="row">
                <div class="col-md-6">
                  <img src="{{asset('asset/images/blog_sub_01.png')}}" alt="image">
                </div>
                <div class="col-md-6">
                  <img src="{{asset('asset/images/blog_sub_02.png')}}" alt="image">
                </div>
              </div>
            </div>
            <div class="info">
              <h3>Why we are best</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic Lorem Ipsum is simply dummy text of the printing and typesettingindustry lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
            </div>
            <div class="quote_block">
              <span class="q_icon"><img src="{{asset('asset/images/quote_icon.png')}}" alt="image"></span>
              <h2>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy.</h2>
              <p><span class="name">Mr. John Doe,</span> Apper Inc</p>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic industry.</p>
            <div class="blog_authore">
                <div class="authore_info">
                    <div class="avtar">
                      <img src="{{asset('asset/images/blog_d02.png')}}" alt="image">
                    </div>
                    <div class="text">
                      <h3>By: John Dow</h3>
                      <span>July 25, 2022</span>
                    </div>
                </div>
                <div class="social_media">
                  <ul>
                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                    <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                  </ul>
                </div>
            </div>
            <div class="blog_tags">
                <ul>
                  <li class="tags"><p>Tags:</p></li>
                  <li><span>app,</span></li>
                  <li><span>rating,</span></li>
                  <li><span>development</span></li>
                </ul>
            </div>
        </div>
      </div>
    </section>

    <!-- Comment Section -->
    <section class="row_am comment_section">
      <div class="container">
        <div class="section_title">
           <h2>3 Comments</h2>
        </div>
        <ul>
          <li>
            <div class="authore_info">
              <div class="avtar">
                <img src="{{asset('asset/images/blog_d01.png')}}" alt="image">
              </div>
              <div class="text">
                <span>30 min ago</span>
                <h4>Dolly Shell</h4>
              </div>
            </div>
            <div class="comment">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the in
                dustrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen. </p>
            </div>
          </li>
          <li class="replay_comment">
            <div class="authore_info">
              <div class="avtar">
                <img src="{{asset('asset/images/blog_d02.png')}}" alt="image">
              </div>
              <div class="text">
                <span>15 min ago</span>
                <h4>Devil Joe</h4>
              </div>
            </div>
            <div class="comment">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the when.</p>
            </div>
          </li>
          <li>
            <div class="authore_info">
              <div class="avtar">
                <img src="{{asset('asset/images/blog_d03.png')}}" alt="image">
              </div>
              <div class="text">
                <span>2 days ago</span>
                <h4>Sherly Shie</h4>
              </div>
            </div>
            <div class="comment">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the in
                dustrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen. </p>
            </div>
          </li>
        </ul>
      </div>
    </section>
    
   
    <!-- Comment Form Section -->
    <section class="row_am comment_form_section">
      <div class="container">
        <div class="section_title">
          <h2>Leave a <span>comment</span></h2>
          <p>Your email address will not be published. Required fields are marked *</p>
        </div>
        <form action="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name *">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email *">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Website  ">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea class="form-control" placeholder="Comments"></textarea>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button class="btn puprple_btn" type="submit">POST COMMENTS</button>
            </div>
          </div>
        </form>
      </div>
    </section>


    <!-- Story-Section-Start -->
    <section class="row_am latest_story" id="blog">
      <!-- container start -->
       <div class="container">
           <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
               <h2>Read latest <span>story</span></h2>
               <p>Lorem Ipsum is simply dummy text of the printing and typese tting <br> indus orem Ipsum has beenthe standard dummy.</p>
           </div>
           <!-- row start -->
           <div class="row">
             <!-- story -->
             <div class="col-md-4">
                 <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                     <div class="story_img">
                       <img src="{{asset('asset/images/story01.png')}}" alt="image" >
                       <span>45 min ago</span>
                     </div>
                     <div class="story_text">
                         <h3>Cool features added!</h3>
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting 
                           industry lorem Ipsum has.</p>
                         <a href="#">READ MORE</a>
                     </div>
                 </div>
             </div>
 
             <!-- story -->
             <div class="col-md-4">
                 <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                     <div class="story_img">
                       <img src="{{asset('asset/images/story02.png')}}" alt="image" >
                       <span>45 min ago</span>
                     </div>
                     <div class="story_text">
                           <h3>Top rated app! Yupp.</h3>
                         <p>Simply dummy text of the printing and typesetting industry lorem Ipsum has Lorem Ipsum is.</p>
                         <a href="#">READ MORE</a>
                     </div>
                 </div>
             </div>
 
             <!-- story -->
             <div class="col-md-4">
                 <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                     <div class="story_img">
                       <img src="{{asset('asset/images/story03.png')}}" alt="image" >
                       <span>45 min ago</span>
                     </div>
                     <div class="story_text">
                           <h3>Creative ideas on app.</h3>
                         <p>Printing and typesetting industry lorem Ipsum has Lorem simply dummy text of the.</p>
                         <a href="#">READ MORE</a>
                     </div>
                 </div>
             </div>
           </div>
           <!-- row end -->
       </div>
       <!-- container end -->
     </section>
     <!-- Story-Section-end -->


   

    @endsection
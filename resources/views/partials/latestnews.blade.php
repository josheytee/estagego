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
                @foreach ( $blogs as $blog )
                    <div class="col-md-4">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                            <div class="story_img">
                            <img src="{{asset('asset/images/story01.png')}}" alt="image" >
                            <span>45 min ago</span>
                            </div>
                            <div class="story_text">
                                <h3>{{$blog->title}}</h3>
                                <p>{{Str::limit($blog->content, 100)}}</p>
                                <a href="{{url('blog_view/'.$blog->id)}}">READ MORE</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            
           </div>
           <!-- row end -->
       </div>
       <!-- container end -->
     </section>
     <!-- Story-Section-end -->

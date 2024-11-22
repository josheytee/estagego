<section class="row_am latest_story" id="blog">
      <!-- container start -->
       <div class="container">
           <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
               <h2>Read latest <span>story</span></h2>
               <p>
                Discover the latest stories that inspire, inform, and captivate. <br>Dive into a world of insightful content crafted to keep you engaged and in the know.
            </p>
           </div>
           <!-- row start -->
           <div class="row">
             <!-- story -->
                @foreach ( $blogs as $blog )
                    <div class="col-md-4">
                        <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                            <div class="story_img">
                                @if ($blog->images->isNotEmpty())
                                <img src="{{asset('storage/blogs/images/'.$blog->images[0]->path)}}" style="width:100%" alt="image" >
                                @endif
                            {{-- <img src="{{asset('asset/images/story01.png')}}" alt="image" > --}}
                            <span>
                                @php

                                    $time = strtotime($blog->updated_at);

                                    $date=date('F d, Y',$time);
                                    $postDuration  = Date('h\h i\ \m\i\n',$time);
                                    echo $postDuration.' '.'ago';

                                @endphp
                            </span>
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

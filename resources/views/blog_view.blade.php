@extends('layout.inner')
   @section('content')



    <!-- BredCrumb-Section -->
    <div class="bred_crumb blog_detail_bredcrumb">
      <div class="container">
        <div class="bred_text">
          <h1>{{config('app.name').' '.$blogName->pageName}}</h1>
          <ul>
            <li><a href="{{url("$homeName->url")}}">{{$homeName->pageName}}</a></li>
            <li><span>»</span></li>
            <li><a href="{{url("$blogName->url")}}"> {{$blogName->pageName}}</a></li>
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
              <span>
                @php
                
                  $time = strtotime($singleBlog->updated_at);
                
                  $date=date('F d, Y',$time);
                  $postDuration  = Date('h\h i\ \m\i\n',$time);
                 echo $postDuration.' '.'ago';

                @endphp 
             </span>
            </div>
            <div class="section_title">
              <h2>{{$singleBlog->title}}</h2>
            </div>

            @if (Session::has('msgSuccess'))
                <div class="container content-justify-center">
                  {!! "<div class='alert alert-success'>".Session::get('msgSuccess')."</div>" !!} 
                </div>
              @elseif (Session::has('msgError'))
              <div class="container content-justify-center">
                  {!! "<div class='alert alert-warnining'>".Session::get('msgError')."</div>" !!} 
                </div>
            @endif


            <div class="main_img">
              <img class="image-fluid max-width" src="{{asset('asset/images/blog_detail_main.png')}}" alt="image">
            </div>
            <div class="info">
              <p class="">{{$singleBlog->content}}</p>
              {{-- <p>Printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unnown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic Lorem Ipsum is simply dummy text of the printing and typesettingindustry lorem Ipsum has been the industrys centuries, but also the leap into electronic.</p>
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
              </ul> --}}
            </div>
            
            {{-- two-images --}}
            {{-- <div class="two_img">
              <div class="row">
                <div class="col-md-6">
                  <img src="{{asset('asset/images/blog_sub_01.png')}}" alt="image">
                </div>
                <div class="col-md-6">
                  <img src="{{asset('asset/images/blog_sub_02.png')}}" alt="image">
                </div>
              </div>
            </div> --}}

            {{-- <div class="info">
              <h3>Why we are best</h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic Lorem Ipsum is simply dummy text of the printing and typesettingindustry lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
            </div> --}}
            <div class="quote_block">
              <span class="q_icon"><img src="{{asset('asset/images/quote_icon.png')}}" alt="image"></span>
              <h2>{{$singleBlog->caption}}</h2>
              <p><span class="name">{{$blogBelongs->Author->first_name.' '.$blogBelongs->Author->last_name}}</span> {{$blogBelongs->Author->company}}</p>
            </div>
            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting in dustry lorem Ipsum has been the industrys standard dummy text ev er since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic industry.</p> --}}
            <div class="blog_authore">
                <div class="authore_info">
                    <div class="avtar">
                      {{-- <img src="{{asset('asset/images/blog_d02.png')}}" alt="image"> --}}
                    </div>
                    <div class="text">
                      <h3>By: J{{$blogBelongs->Author->first_name.' '.$blogBelongs->Author->last_name}}</h3>
                      <span>{{$date}}</span>
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
           <h2>
              {!! $comments->count().' '.'<span>Comments</span>'!!}
           </h2>
        </div>
        <ul>
          @foreach ($comments as $comment)
            <li>
              <div class="authore_info">
                {{-- <div class="avtar">
                  <img src="{{asset('asset/images/blog_d01.png')}}" alt="image">
                </div> --}}
                <div class="text">
                  <span>
                    @php
                
                  $time = strtotime($comment->updated_at);
                
                  $date=date('F d, Y',$time);
                  $postDuration  = Date('h\h i\ \m\i\n',$time);
                 echo $postDuration.' '.'ago';

                @endphp 
                  </span>
                  <h4>{{$comment->name}}</h4>
                </div>
              </div>
              <div class="comment">
                <p>{{$comment->comment}} </p>
              </div>
            </li>
            {{-- <li class="replay_comment">
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
            </li> --}}
           @endforeach
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
        <form action="{{url('comment')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name *" name='name'>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email *" name='email'>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Phone" name='phone'>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Website" name='website'>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea class="form-control" placeholder="Comments" name='comment'></textarea>
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
    @include('partials.latestnews')

   

    @endsection
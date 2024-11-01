@extends('layout.main')
@section('title',"EstateGO Service:$product->title")
@section('content')

<div class="bred_crumb">
      <div class="container">
        <!-- shape animation  -->
        <span class="banner_shape1"> <img src="{{asset('asset/images/banner-shape1.png')}}" alt="image" > </span>
        <span class="banner_shape2"> <img src="{{asset('asset/images/banner-shape2.png')}}" alt="image" > </span>
        <span class="banner_shape3"> <img src="{{asset('asset/images/banner-shape3.png')}}" alt="image" > </span>

        <div class="bred_text">
          <h1>Services</h1>
          <ul>
            <li><a href="index.html">Service</a></li>
            <li><span>»</span></li>
            <li>
                <a href="blog-list.html">
                    {{$product->title}}
                </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

     <section class="blog_detail_section">
      <div class="container">
        <div class="blog_inner_pannel">
            <div class="review">
              {{-- <span><hr></span>
              <span>45 min ago</span> --}}
              <hr>
            </div>
            <div class="section_title">
              <h2>{{$product->title}}</h2>
            </div>
            <div class="main_img">
              <img src="{{asset('asset/images/blog_detail_main.png')}}" alt="image">
              {{-- <img src="{{$product->image}}" alt="image"> --}}
            </div>
            <div class="info">
              <p>{{$product->content}}</p>
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
        </div>
      </div>
    </section>

@include('partials.newsletter')

@endsection

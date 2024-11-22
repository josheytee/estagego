@extends('layout.inner')
   @section('content')


    <!-- BredCrumb-Section -->
    <div class="bred_crumb">
      <div class="container">
        <!-- shape animation  -->
        <span class="banner_shape1"> <img src="{{asset('asset/images/banner-shape1.png')}}" alt="image" > </span>
        <span class="banner_shape2"> <img src="{{asset('asset/images/banner-shape2.png')}}" alt="image" > </span>
        <span class="banner_shape3"> <img src="{{asset('asset/images/banner-shape3.png')}}" alt="image" > </span>

        <div class="bred_text">
          <h1>Need help? Check here</h1>
          <p>Check out some of the frequestly asked questions</p>
          <ul>
            <li><a href="/">Home</a></li>
            <li><span>»</span></li>
            <li><a href="reviews.html">Help Center - TENANTS</a></li>
          </ul>
        </div>
      </div>
    </div>

        @php
     use App\Models\Faq;
     use App\Models\SubCategory;


    $subcategoryName='GETTING STARTED';
     $faq_id=1;
     $faqs=Faq::where('subcategory_name','=',$subcategoryName)->where('category_id','=',$faq_id);
     if (!isset($_GET['subcategory'])){

    //    $subCategories=SubCategory::with(['Faq'])->where('category_id','=',$ty)->where('subcategory_name','=','GETTING STARTED ')->get();
    $faqs=Faq::get()->where('category_id','=',$ty)->where('subcategory_name','=','GETTING STARTED');
    }
     else{
        // $subCategories=SubCategory::with(['Faq'])->where('category_id','=',$ty)->where('subcategory_name','=',$_GET['subcategory'])->get();
        $faqs=Faq::get()->where('category_id','=',$ty)->where('subcategory_name','=',$_GET['subcategory']);
    }


    @endphp
{{-- {{dd( $_GET['subcategory'])}} --}}

    <!-- FAQ-Section start -->
    <section class="row_am faq_section">
      <!-- container start -->
      <div class="container">
{{-- <div class="nav-item"> <a class="dark_btn" href="#">GETTING STARTED</a> &nbsp;  &nbsp;  &nbsp; <a class="dark_btn" href="#">MANAGING PROPERTIES</a> &nbsp;  &nbsp;  &nbsp; <a class="dark_btn" href="#">GETTING REPORTS</a>
</div> --}}
  {{-- {{dd($subCategoryName)}} --}}
    <div class="nav-item">
      @foreach ($categories as $category )
        @foreach ( $category->SubCategory as $subCategory )
        {{-- <a class="{{request()->is('tenant/1') ? 'active rounded-pill p-2' : ''}}" href="{{url($subCategory->url.'/'.$subCategory->category_id.'?subcategory='.$subCategory->subcategory_name)}}"> --}}

          {{-- @php
            if($subCategoryName==$subCategory->subcategory_name){
              print ("<a class='active rounded-pill p-2' href=$subCategory->url.'/'.$subCategory->category_id.'?subcategory='.$subCategory->subcategory_name>");
            }

          @endphp --}}


          @if($subCategory->subcategory_name)
          <a class='' href="{{url($subCategory->url.'/'.$subCategory->category_id."?subcategory=".$subCategory->subcategory_name)}}">
          @endif

          @if($_GET['subcategory']=='GETTING STARTED')
            @if ($subCategory->subcategory_name=='GETTING STARTED')
              <a class='active rounded-pill p-2' href="{{url($subCategory->url.'/'.$subCategory->category_id."?subcategory=".$subCategory->subcategory_name)}}">
            @endif
          @endif


          @if($_GET['subcategory']=='MANAGING PROPERTIES')
            @if($subCategory->subcategory_name == 'MANAGING PROPERTIES')
            <a class='active rounded-pill p-2' href="{{url($subCategory->url.'/'.$subCategory->category_id."?subcategory=".$subCategory->subcategory_name)}}">
            @endif
          @endif

          @if($_GET['subcategory']=='GETTING REPORTS')
            @if($subCategory->subcategory_name == 'GETTING REPORTS')
              <a class='active rounded-pill p-2' href="{{url($subCategory->url.'/'.$subCategory->category_id."?subcategory=".$subCategory->subcategory_name)}}">
            @endif
          @endif



          {{-- href="ledgerinc.php?name='.$value['acct_name'].'&from='.$from.'&to='.$to.'&acct_code='.$value['acct_type'].'&pageName='.$pagename.'"  --}}
          {{$subCategory->subcategory_name}}</a> &nbsp;  &nbsp;  &nbsp;
        @endforeach
      @endforeach
    </div>

        <!-- faq data -->
        <div class="faq_panel">
          <div class="accordion" id="accordionExample">


            {{-- @foreach ( $subCategories as $subcategory)  --}}
                @foreach ($faqs as $faq)
                {{-- {{dd($faq->question)}} --}}
                <div class="card" data-aos="fade-up" >
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                    <button type="button" class="btn btn-link active" data-toggle="collapse" data-target="#collapseOne">
                        <i class="icon_faq icofont-plus"></i></i> {{$faq->question}}</button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                    <p>{{$faq->answer}}</p>
                    </div>
                </div>
                </div>
                @endforeach
            {{-- @endforeach --}}

{{--
            <div class="card" data-aos="fade-up" >
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

            <div class="card" data-aos="fade-up" >
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

            <div class="card" data-aos="fade-up" >
              <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                    data-target="#collapseFour"><i class="icon_faq icofont-plus"></i></i>What is process to get refund ?
                  </button>
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
            </div>

            <div class="card" data-aos="fade-up" >
              <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                    data-target="#collapseFive"><i class="icon_faq icofont-plus"></i></i>Can i get code bug support for customization ?
                  </button>
                </h2>
              </div>

              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has. been the
                    industrys standard dummy text ever since the when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five cen turies but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
              </div>
            </div>

            <div class="card" data-aos="fade-up" >
              <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                    data-target="#collapseSix"><i class="icon_faq icofont-plus"></i></i>Lorem Ipsum is simply dummy text of the printing and typesetting ?
                  </button>
                </h2>
              </div>

              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has. been the
                    industrys standard dummy text ever since the when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five cen turies but also the
                    leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
              </div>
            </div>

            <div class="card" data-aos="fade-up" >
              <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                    data-target="#collapseSeven"><i class="icon_faq icofont-plus"></i></i>Lorem Ipsum is simply dummy text of the printing and typesetting ?
                  </button>
                </h2>
              </div>

              <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
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

     <!-- Download-Free-App-section-Start  -->
      @include('partials.downloadApp')
    <!-- Download-Free-App-section-end  -->



    @endsection

   <section class="row_am free_app_section review_freeapp" id="getstarted">
    	<!-- container start -->
        <div class="container">
            <div class="free_app_inner" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
              	<!-- row start -->
                <div class="row">
                	<!-- content -->
                    <div class="col-md-6">
                        <div class="free_text">
                            <div class="section_title">
                                <h2>{{$appDownload->title}}</h2>
                                <p>{{$appDownload->content}}</p>
                            </div>
                            <ul class="app_btn">
                              <li>
                                <a href="#">
                                  {{-- <img src=> --}}
                                  <img src="{{asset('asset/images/'.$appDownload->image)}}" alt="image" >
                                </a>
                              </li>
                              <li>
                                <a href="#">
                                  <img src="{{asset('asset/images/'.$appDownload->image2)}}" alt="image" >
                                </a>
                              </li>
                            </ul>
                        </div>
                    </div>

                    <!-- images -->
                    <div class="col-md-6">
                        <div class="free_img">
                            <img src="{{asset('asset/images/download-screen01.png')}}" alt="image" >
                            <img class="mobile_mockup" src="{{asset('asset/images/download-screen02.png')}}" alt="image" >
                        </div>
                    </div>
                </div>
                <!-- row end -->
            </div>
        </div>
        <!-- container end -->
    </section>
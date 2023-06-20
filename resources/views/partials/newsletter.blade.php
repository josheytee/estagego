    <section class="newsletter_section">
      <!-- container start -->
      <div class="container">
          <div class="newsletter_box">
              <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
              	  <!-- h2 -->
                  <h2>Subscribe newsletter</h2>
                  <!-- p -->
                  <p>Be the first to recieve all latest post in your inbox</p>
              </div>
              <form action="{{url('/mail')}}" method='POST' data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                @csrf
                  <div class="form-group">
                      <input type="email" class="form-control" placeholder="Enter your email" name='emailaddress'>
                  </div>
                  <div class="form-group">
                      <button class="btn">SUBMIT</button>
                  </div>
              </form>
          </div>
      </div>
      <!-- container end -->
    </section>
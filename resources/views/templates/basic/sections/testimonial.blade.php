@php
    $testimonialCaption = getContent('testimonial.content',true);
    $testimonials = getContent('testimonial.element');
@endphp


        <!-- testimonial section start -->
    <section class="pt-5 pb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-header text-center">
              <h2 class="section-title">{{ __($testimonialCaption->data_values->heading) }}</h2>
              <p>{{ __($testimonialCaption->data_values->subheading) }}</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row">
          <div class="col-lg-12">
            <div class="testimonial-slider">
                @foreach($testimonials as $testimonial)
              <div class="single-slide">
                <div class="testimonial-card">
                  <div class="thumb"><img src="{{ get_image('assets/images/frontend/testimonial/'.$testimonial->data_values->image) }}" alt="image"></div>
                  <h5 class="name">{{ __($testimonial->data_values->name) }}</h5>
                  <span class="designation">{{ __($testimonial->data_values->designation) }}</span>
                  <p>{{ __($testimonial->data_values->comment) }}</p>
                </div>
              </div>
              @endforeach
            </div><!-- testimonial-slider end -->
          </div>
        </div>
      </div>
    </section>
    
        <section class="pb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-header text-center">
              <h2 class="section-title">Our Guaranteed Service</h2>
              <p> Our present target is serving Bangladesh people 2021 to 2025 <br><br> TK KAMAI is one of the largest advertising brand whose is doing several category service such as Educational video watching, Newspaper watching, Survey doing, Entertainment watching . We are trying to build a strong platform where unemployed and student can give their time and earn money from TK KAMAI. TK KAMAI has been proved that it is paid member any withdrawal within 30 minutes. We understand the situation of Bangladesh people's mind, we works to build Digital platform where people learn, earn and can do entertainment. For any adversting enquires You can contact us by our contact page </p>
            </div>
          </div>
		          </div><!-- row end -->
        <div class="row mb-none-30 justify-content-center">
                    </div>
      </div>
    </section>
    
    <!-- testimonial section end -->
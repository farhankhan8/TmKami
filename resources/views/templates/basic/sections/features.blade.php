@php
    $featureCaption = getContent('features.content',true);
    $features = getContent('features.element');
@endphp


            <!-- feature section start -->

                <section class="ptb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.03s">
          <h2 class="section-title mb-20">"TK KAMAI" App in Google Play store</h2>
              <p> Your have lost your money in several website. But TK KAMAI is guaranteed that it never lose your money here at least you can earn what you invest here that's guaranteed. To get more knowledge about us read faq.<br><br>Please download mobile app from your google play store. For mobile user it's easy to browse or view ads here. For you we have tried to user friendly app for you. Use and earn more. Earn money is not easy for all. But we have made the best platform which easily pay you for your time and patience with us. Never try to be oversmart here. Your ip, browser, location has been collected for our security. </p>
          </div>
          <div class="col-lg-6 mt-lg-0 mt-5 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
            <div class="section-content pl-lg-4 pl-0">
            <img src="{{ asset('assets/admin/images/app.png') }}" alt="image" class="w-100">

            </div>
          </div>
        </div>
      </div>
    </section>  
          
    <section class="pt-5 pb-5 section--bg has--img">
      <div class="section--img bg_img"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-header text-center">
              <h2 class="section-title">{{ __($featureCaption->data_values->heading) }}</h2>
              <p>{{ __($featureCaption->data_values->subheading) }}</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row mb-none-30">
            @foreach($features as $feature)
          <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp text-md-left text-center" data-wow-duration="0.3s" data-wow-delay="0.3s">
            <div class="feature-card">
              <div class="feature-card__icon">@php echo $feature->data_values->icon @endphp</div>
              <div class="feature-card__content">
                <h4 class="title">{{ __($feature->data_values->title) }}</h4>
                <p>{{ __($feature->data_values->content) }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- feature section end -->
@php
    $counterCaption = getContent('counter.content',true);
    $counters = getContent('counter.element');
@endphp
@if($counterCaption)


        <!-- overview section start -->
    <section>
      <div class="row no-gutters">
        <div class="col-xl-6 bg_img video-thumb-two min-height--block" data-background="{{ get_image('assets/images/frontend/counter/'.$counterCaption->data_values->image) }}">
        </div>
        <div class="col-xl-6 pt-5 pb-5 bg--base text-md-left text-center">
          <div class="overview-area">
            <h2 class="section-title">{{ __($counterCaption->data_values->heading) }}</h2>
            <p>{{ __($counterCaption->data_values->sub_heading) }}</p>
            <div class="row mb-none-30 mt-50">
                @foreach($counters as $counter)
              <div class="col-md-3 col-6 mb-30">
                <div class="counter-card">
                  <div class="counter-card__icon text-white">
                    @php echo $counter->data_values->icon @endphp
                  </div>
                  <div class="counter-card__content">
                    <span class="count-num text-white">{{ __($counter->data_values->number) }}</span>
                    <p class="para-white">{{ __($counter->data_values->title) }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- overview section end  -->

@endif

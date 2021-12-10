
@extends($activeTemplate .'layouts.master')
@section('content')
@include($activeTemplate.'breadcrumb') 

    <section class="ptb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
            <img src="{{ asset('assets/admin/images/payment.jpg') }}" alt="image" class="w-100">
            </div>
          <div class="col-lg-6 mt-lg-0 mt-5 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
            <div class="section-content pl-lg-4 pl-0">
              <h2 class="section-title mb-20"> Payment Method</h2>
              <p> TK Kamai provides mobile banking payment such as Bkash, Nagad, Rocket & Upay in Bangladesh from our agents who charger little to send our user. There is no agent system. So here is no problem in withdrawl sector than others company payment issue. TK KAMAI provides payment within 1-3 hours in official time 10 am to 10 pm <br><br> TK kamai provides the guaranteed payment proof regular basis, For some hacker community, we are being hard and not publish the username in this page. Some hacker is trying hack our member user and pass. For the reason we stop publishing payment proof in publically. </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    @if($sections->secs != null)
        @foreach(json_decode($sections->secs) as $sec)
            @include($activeTemplate.'sections.'.$sec)
        @endforeach
    @endif
@endsection
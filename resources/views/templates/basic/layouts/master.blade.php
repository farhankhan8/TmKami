<!DOCTYPE html>
<html lang="en">
<head>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1855956289660339"
     crossorigin="anonymous"></script>
    
    <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "8grfc1rgcq");
</script>
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1855956289660339"
     crossorigin="anonymous"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KPY4QLRB8D"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KPY4QLRB8D');
</script>

        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <title>{{ $general->sitename($page_title) }}</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">

            <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="shortcut icon" type="image/png" href="{{ asset(imagePath()['logoIcon']['path'] .'/favicon.png') }}"/>
        <!-- bootstrap 4  -->
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/vendor/bootstrap.min.css') }}">
      <!-- fontawesome 5  -->
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/all.min.css') }}">
      <!-- line-awesome webfont -->
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/line-awesome.min.css') }}">
      <!-- image and videos view on page plugin -->
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/lightcase.css') }}">
      
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/vendor/animate.min.css') }}">
      <!-- custom select css -->
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/vendor/nice-select.css') }}">
      <!-- slick slider css -->
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/vendor/slick.css') }}">
      <!-- dashdoard main css -->
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/main.css') }}">
      <link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset(asset($activeTemplateTrue).'/css/color.php?color1=$general->base_color&color2=$general->secondary_color') }}">

    @include('partials.seo')
    @stack('style-lib')
    @stack('style')


</head>
<body>
 
    
      <div class="page-wrapper">
      <!-- header-section start  -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-6">
            <div class="right text-sm-right text-center">
              @guest
              <a href="{{ route('user.login') }}"><i class="las la-sign-in-alt"></i> @lang('Login')</a>
              <a href="{{ route('user.register') }}"><i class="las la-user-plus"></i> @lang('Registration')</a>
              @else
              <a href="{{ route('user.home') }}"><i class="las la-user-plus"></i> @lang('Dashboard')</a>
              @endguest
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header__bottom">
      <div class="container">
        <nav class="navbar navbar-expand-xl p-0 align-items-center">
          <a class="site-logo site-title" href="{{ route('home') }}"><img src="{{ asset('assets/images/logoIcon/logo.png') }}" alt="site-logo"><span class="logo-icon"><i class="flaticon-fire"></i></span></a>
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu ml-auto">
              <li><a href="{{ route('home') }}">@lang('Home')</a></li>
              @foreach($pages as $page)
              @if($page->slug != 'home' && $page->slug != 'blog' && $page->slug != 'contact') 
              <li><a href="{{ route('home.pages',$page->slug) }}">{{ __($page->name) }}</a></li>
              @endif
              @endforeach
              <li><a href="{{ route('blog') }}">@lang('Blog')</a></li>
            </ul>
            <div class="nav-right">
              <a href="{{ route('contact') }}" class="cmn-btn style--three">@lang('Contact')</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- header-section end  -->
@yield('content')


<!-- footer section start -->
<footer class="footer-section">
  <div class="footer-bottom">
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-lg-8 col-md-6 text-md-left text-center">
          <p>{{ __(getContent('copyright.content',true)->data_values->copyright) }}</p>
        </div>
        <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
          @php
            $links = getContent('footer_link.element');
          @endphp
          <ul class="link-list justify-content-md-end justify-content-center">
            @foreach($links as $link)
            <li><a href="{{ route('links',[$link->id,slug($link->data_values->title)]) }}">{{ __($link->data_values->title) }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer section end -->

  </div> <!-- page-wrapper end -->
    <!-- jQuery library -->
  <script src="{{ asset($activeTemplateTrue.'/js/vendor/jquery-3.5.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset($activeTemplateTrue.'/js/vendor/bootstrap.bundle.min.js') }}"></script>
  <!-- lightcase plugin -->
  <script src="{{ asset($activeTemplateTrue.'/js/vendor/lightcase.js') }}"></script>
  <!-- custom select js -->
  <script src="{{ asset($activeTemplateTrue.'/js/vendor/jquery.nice-select.min.js') }}"></script>
  <!-- slick slider js -->
  <script src="{{ asset($activeTemplateTrue.'/js/vendor/slick.min.js') }}"></script>
  <!-- scroll animation -->
  <script src="{{ asset($activeTemplateTrue.'/js/vendor/wow.min.js') }}"></script>
  <!-- dashboard custom js -->
  <script src="{{ asset($activeTemplateTrue.'/js/app.js')}}"></script>
  </body>

@stack('script-lib')


@include('admin.partials.notify')
@include('partials.plugins')
@stack('script')
<script type="text/javascript">
  (function($,document){
        "use strict";
        $(document).on('change', '#langSel', function () {
            var code = $(this).val();
            window.location.href = "{{url('/')}}/change-lang/"+code ;
        });
            
    })(jQuery,document);
</script>




</body>
</html>
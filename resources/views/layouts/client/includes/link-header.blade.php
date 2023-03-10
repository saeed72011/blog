<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="{{assetFile($setting->favicon)}}">

@stack('styles')
@livewireStyles



<!-- Basic  -->
<link rel="stylesheet" href="{{asset('client/css/rtl/bootstrap-rtl.min.css')}}?ver=5.0.2" media="all"/>
<link rel="stylesheet" href="{{asset('client/css/video.min.css')}}?ver=7.4.1" media="all"/>
<link rel="stylesheet" href="{{asset('client/css/ck-content.css')}}"/>


<!-- Icons  -->
<link rel="stylesheet" href="{{asset('client/fonts/fontawesome/css/all.min.css')}}?ver=5.7.0">
<link rel="stylesheet" href="{{asset('client/fonts/fontawesome/css/v4-shims.min.css')}}?ver=5.7.0">



<!-- Theme  -->
<link rel="stylesheet" href="{{asset('client/dist/css/uix-kit.min.css')}}?ver=o5b9KBa9CChralGqFjuM"/>

<!-- RTL  -->
<link rel="stylesheet" href="{{asset('client/dist/css/uix-kit-rtl.min.css')}}?ver=o5b9KBa9CChralGqFjuM"/>


<!--[if lt IE 10]>
<link rel="stylesheet" href="{{asset('client/css/IE.css')}}?ver=o5b9KBa9CChralGqFjuM" />
<![endif]-->


<!-- Core & Theme CSS  end -->


<!-- Vendor
============================================= -->
<script src="{{asset('client/js/min/jquery.min.js')}}?ver=3.6.1"></script>
<script src="{{asset('client/js/min/modernizr.min.js')}}?ver=3.5.0"></script>
<!-- Vendor  end -->



<!-- Break free from CSS prefix hell!
============================================= -->
<script src="{{asset('client/js/min/prefixfree.min.js')}}?ver=1.0.7"></script>



<!-- SEO
============================================= -->

<meta name="generator" content="Saeed Valipoor" />
<meta name="author" content="https://ojalweb.ir/" />
<meta name="email" content="info@{{ url('') }}" />
<meta name="website" content="{{env('APP_URL', url(''))}}" />
<meta name="Version" content="v2.0" />



<!-- SEO  end -->


<!-- Favicons
============================================= -->
<link rel="icon" href="{{asset('client/images/favicon/favicon-32x32.png')}}" type="image/x-icon">
<link rel="shortcut icon" href="{{asset('client/images/favicon/favicon-32x32.png')}}" sizes="32x32">
<link rel="apple-touch-icon" href="{{asset('client/images/favicon/apple-touch-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('client/images/favicon/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('client/images/favicon/apple-touch-icon-114x114.png')}}">
<!-- Favicons  end -->

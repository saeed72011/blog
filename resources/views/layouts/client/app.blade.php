<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>{{$setting->name}} - {{ $title }}</title>
    <meta name="description" content="{{$meta}}" />
    @stack('metas')
    <link rel="canonical" href="{{$canonical}}" >
    @include('layouts.client.includes.link-header')
    @if(!$setting->index) <meta name="robots" content="noindex"> @endif
</head>

<body class="page rtl">

<!-- Loader
============================================= -->
<div class="uix-loader">
    <!--[if lt IE 10]>
    <span>Loading...</span>
    <![endif]-->
    <svg class="uix-loader__spinner is-hide-IE" viewBox="0 0 52 52">
        <path d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z"></path>
    </svg>
</div>
<div class="uix-loader-progress" data-txt="{progress}%"><span>0%</span></div>
<div class="uix-loader-progress__line"></div>
<!-- .uix-loader end -->



<!-- Mobile Menu Toggle Trigger
============================================= -->
<div class="uix-menu-mobile__toggle">
    <span></span>
    <span></span>
    <span></span>
</div>
<div class="uix-menu-mobile__mask"></div>
<!-- .uix-menu-mobile__toggle end -->
<div class="uix-wrapper">
    <!-- Start Navbar Area -->
    @include('layouts.client.includes.header')
    <!-- End Navbar Area -->
    <main id="uix-maincontent">
     @yield('content')
    </main>

    <!-- Footer Area -->
    @include('layouts.client.includes.footer')
    <!-- Footer Area End -->
</div>

@include('layouts.client.includes.link-footer')


</body>

</html>


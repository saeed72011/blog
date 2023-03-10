<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl" dir="rtl">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex">
    <title> پنل مدیریت {{@$setting->name}}</title>

    @include('layouts.admin.includes.link-header-admin')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns" style="font-size: 85%">

@include('layouts.admin.includes.header')


@include('layouts.admin.includes.aside')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        @yield('content')

    </div>
</div>
<!-- END: Content-->

@include('layouts.admin.includes.link-footer-admin')
</body>
<!-- END: Body-->
</html>

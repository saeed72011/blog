<!DOCTYPE html>
<html lang="fa">
    <head>
        <title>{{env('APP_NAME', 'اوجال وب')}} - @yield('title')</title>
        <meta name="robots" content="noindex">
        @include('layouts.client.includes.link-header')
    </head>
    <body>
        @yield('content')
        @include('layouts.client.includes.link-footer')
    </body>
</html>


<!DOCTYPE html>
<html lang="fa">
    <head>
        <title>{{@$seting->name}} - @yield('title')</title>
        @include('layouts.client.includes.link-header')
    </head>
    <body>
        @yield('content')
        @include('layouts.client.includes.link-footer')
    </body>
</html>


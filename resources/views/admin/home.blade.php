<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {!! HTML::style('css/bootstrap/bootstrap.min.css') !!}
    {!! HTML::style('css/fonts/css/font-awesome.min.css') !!}
    {!! HTML::style('css/main/front.css') !!}
    {!! HTML::style('css/abcxyz/admin.css') !!}
    {!! HTML::script('js/jquery-1.11.1.min.js') !!}
    {!! HTML::script('js/bootstrap/bootstrap.min.js') !!}
    {!! HTML::script('js/abcxyz.js') !!}
    {!! HTML::script('js/main.js') !!}
    <link rel="icon" href="{{url('/images/front/logo.png')}}">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
    @yield('ostyle')
    @yield('ojs')
</head>
<body>
    <div id="wrapper">
        @include('admin.menu')
        <main>
            @yield('body')
        </main>
        @include('admin.footer')
    </div>
</body>
</html>
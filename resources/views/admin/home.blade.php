<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {!! HTML::style('css/bootstrap/bootstrap.min.css') !!}
    <link rel="stylesheet" href="css/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main/front.css">
    <link rel="stylesheet" href="css/abcxyz/admin.css">
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
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
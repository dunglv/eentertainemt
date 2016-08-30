<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {!! HTML::style('css/bootstrap/bootstrap.min.css') !!}
    {!! HTML::style('css/fonts/css/font-awesome.min.css') !!}
    {!! HTML::style('css/main/front.css') !!}
    {!! HTML::script('js/jquery-1.11.1.min.js') !!}
    {!! HTML::script('js/bootstrap/bootstrap.min.js') !!}
    {!! HTML::script('js/main.js') !!}
    <link rel="icon" href="{{url('/images/front/logo.png')}}">
    <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
    @yield('ostyle')
    @yield('ojs')
</head>
<body id="front_ui">
<?php 
// function youtube($id) {
// // $id = 'YOUTUBE_ID';
// // returns a single line of JSON that contains the video title. Not a giant request.
// $videoTitle = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$id."&key=AIzaSyAJjL8TE8BQ2TwwuanBLdHixq_RCLpRvBE&part=snippet,statistics");
// // despite @ suppress, it will be false if it fails
// if ($videoTitle) {
// $json = json_decode($videoTitle, true);

// return $json['items'][0];
// } else {
// return false;
// }
// }
// echo "<pre>";
// print_r(youtube('MlndhFK0VrE')); 
// echo "</pre>";
 ?>
    <div id="wrapper">
        @include('partials.menu')
        <main>
            @yield('body')
            
        </main>
        @include('partials.footer')
    </div>
</body>
</html>
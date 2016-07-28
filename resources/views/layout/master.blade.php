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
    <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
    @yield('ostyle')
    @yield('ojs')
</head>
<body>
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
        <!-- SLIDER -->
        <section id="slider">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                              </ol>

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="images/slider/slide_01.jpg" alt="slider 01">
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 01
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/slider/slide_02.jpg" alt="slider 02">
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 02
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/slider/slide_03.jpg" alt="slider 03">
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 03
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/slider/slide_04.jpg" alt="slider 04">
                                    <div class="carousel-caption">
                                        <div class="in-caption">
                                            this is slider 04
                                        </div>
                                    </div>
                                </div>
                              </div>

                              <!-- Controls -->
                              <a class="left carousel-control slide-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control slide-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <i class="fa fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- END SLIDER -->
        <main>
            @yield('body')
            
        </main>
        @include('partials.footer')
    </div>
</body>
</html>
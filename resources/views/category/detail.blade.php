@extends('layout.master')
@section('title', $category[0]->title)
@section('body')
    <section id="cat_home_{{$category[0]->id}}" class="block cate-home-{{$category[0]->id}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="head-top" style="background: #fff url('{{$category[0]->thumbnail}}')">
                        <div class="infor-category" >
                            <div class="cap-category">
                                <h1><a href="{{route('front.detail_category', $category[0]->url)}}">{{$category[0]->title}}</a></h1>
                            </div>
                            <div class="desc-category">
                                {{$category[0]->description}}
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- BLOCK -->
                <div id="hot_cate_{{$category[0]->id}}">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="block-cap">
                            <h2><a href="{{route('front.detail_category', $category[0]->url)}}">HOT nhất</a></h2>
                        </div>
                    </div>
                    <!--begin block content-->
                    <div class="block-content">
                        @if($articles->count()==0)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">đang cập nhật dữ liệu</div>
                        @else
                             @foreach($articles as $art)
                                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    @if($art->type=='video')
                                        <div id="{{rand(100,999).'_cat_'.$art->idv}}" class="item-block item-{{$art->type}}">
                                            <div class="desc-thumb">
                                                <div class="thumb-item">
                                                     <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$art->idv}}" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <div class="title-item">
                                                <h3><a href="https://www.youtube.com/watch?v={{$art->idv}}"></a></h3>
                                            </div>
                                            <div class="desc-item" style="display:none">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore id nihil molestiae mollitia beatae, architecto similique, vitae eveniet cumque dignissimos eum laboriosam iure reiciendis veritatis, corporis facere illo eligendi reprehenderit.
                                            </div>
                                            <div class="no-item">
                                                <div class="in-no-item">
                                                    <span><i class="fa fa-eye"></i><i class="count viewCount"></i><?php// echo youtube($vId)['statistics']['viewCount'] ?></span>
                                                    <span><i class="fa fa-thumbs-o-up"></i><i class="count likeCount"></i><?php //echo youtube($vId)['statistics']['likeCount'] ?></span>
                                                    <span><i class="fa fa-thumbs-o-down"></i><i class="count dislikeCount"></i><?php //echo youtube($vId)['statistics']['dislikeCount'] ?></span>
                                                    <span><i class="fa fa-comment-o"></i><i class="count commentCount"></i><?php //echo youtube($vId)['statistics']['commentCount'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div id="{{rand(100,999).'_cat_'.$art->id}}" class="item-block item-{{$art->type}}">
                                            <div class="desc-thumb">
                                                <div class="thumb-item">
                                                    <img src="{{url($art->thumbnail)}}" alt="{{$art->title}}">
                                                </div>
                                                <div class="desc-item" style="">
                                                    {{substr($art->description, 0, 200).'...'}}
                                                </div>
                                                <div class="button-link">
                                                    <a href="{{route('front.detail_article', $art->url)}}"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                            <div class="title-item">
                                                <h3><a href="{{route('front.detail_article', $art->url)}}">{{$art->title}}</a></h3>
                                            </div>
                                            <div class="no-item">
                                                <div class="in-no-item">
                                                    <span><i class="fa fa-eye"></i><i class="count viewCount"></i>{{$art->viewcount}}</span>
                                                    <span><i class="fa fa-thumbs-o-up"></i><i class="count likeCount"></i>{{$art->viewcount}}</span>
                                                    <span><i class="fa fa-thumbs-o-down"></i><i class="count dislikeCount"></i>{{$art->viewcount}}</span>
                                                    <span><i class="fa fa-comment-o"></i><i class="count commentCount"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end item -->
                                    @endif
                                </div>
                                <!-- end of item -->
                                @endforeach
                                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    {{$articles->links()}}
                                </div> -->
                        @endif
                    </div>
                    <!--end block content-->
                    <!-- More button -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="block-more">
                            <a href="javascript:void(0);" id="{{$category[0]->id}}_{{$articles->total()}}" class="btn-more ">Xem thêm</a>
                        </div>
                    </div>
                    <!-- End More button -->
                    <!-- Loading Div -->
                    <div class="lvd-loading">
                        <span></span>
                    </div>
                    <!-- End Loading Div -->
                </div>
                <!-- END OF BLOCK -->

                <!-- BLOCK -->
                <div id="newest_cate_{{$category[0]->id}}">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="block-cap">
                            <h2><a href="{{route('front.detail_category', $category[0]->url)}}">Mới nhất</a></h2>
                        </div>
                    </div>
                    <!--begin block content-->
                    <div class="block-content">
                        @if($articles->count()==0)
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">đang cập nhật dữ liệu</div>
                        @else
                             @foreach($articles as $art)
                                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    @if($art->type=='video')
                                        <div id="{{rand(100,999).'_cat_'.$art->idv}}" class="item-block item-{{$art->type}}">
                                            <div class="desc-thumb">
                                                <div class="thumb-item">
                                                     <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$art->idv}}" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                            <div class="title-item">
                                                <h3><a href="https://www.youtube.com/watch?v={{$art->idv}}"></a></h3>
                                            </div>
                                            <div class="desc-item" style="display:none">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore id nihil molestiae mollitia beatae, architecto similique, vitae eveniet cumque dignissimos eum laboriosam iure reiciendis veritatis, corporis facere illo eligendi reprehenderit.
                                            </div>
                                            <div class="no-item">
                                                <div class="in-no-item">
                                                    <span><i class="fa fa-eye"></i><i class="count viewCount"></i><?php// echo youtube($vId)['statistics']['viewCount'] ?></span>
                                                    <span><i class="fa fa-thumbs-o-up"></i><i class="count likeCount"></i><?php //echo youtube($vId)['statistics']['likeCount'] ?></span>
                                                    <span><i class="fa fa-thumbs-o-down"></i><i class="count dislikeCount"></i><?php //echo youtube($vId)['statistics']['dislikeCount'] ?></span>
                                                    <span><i class="fa fa-comment-o"></i><i class="count commentCount"></i><?php //echo youtube($vId)['statistics']['commentCount'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div id="{{rand(100,999).'_cat_'.$art->id}}" class="item-block item-{{$art->type}}">
                                            <div class="desc-thumb">
                                                <div class="thumb-item">
                                                    <img src="{{url($art->thumbnail)}}" alt="{{$art->title}}">
                                                </div>
                                                <div class="desc-item" style="">
                                                    {{substr($art->description, 0, 200).'...'}}
                                                </div>
                                                <div class="button-link">
                                                    <a href="{{route('front.detail_article', $art->url)}}"><i class="fa fa-link"></i></a>
                                                </div>
                                            </div>
                                            <div class="title-item">
                                                <h3><a href="{{route('front.detail_article', $art->url)}}">{{$art->title}}</a></h3>
                                            </div>
                                            <div class="no-item">
                                                <div class="in-no-item">
                                                    <span><i class="fa fa-eye"></i><i class="count viewCount"></i>{{$art->viewcount}}</span>
                                                    <span><i class="fa fa-thumbs-o-up"></i><i class="count likeCount"></i>{{$art->viewcount}}</span>
                                                    <span><i class="fa fa-thumbs-o-down"></i><i class="count dislikeCount"></i>{{$art->viewcount}}</span>
                                                    <span><i class="fa fa-comment-o"></i><i class="count commentCount"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end item -->
                                    @endif
                                </div>
                                <!-- end of item -->
                                @endforeach
                                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                	{{$articles->links()}}
                                </div> -->
                        @endif
                    </div>
                    <!--end block content-->
                    <!-- More button -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    	<div class="block-more">
    	                	<a href="javascript:void(0);" id="{{$category[0]->id}}_{{$articles->total()}}" class="btn-more ">Xem thêm</a>
    	                </div>
                    </div>
                    <!-- End More button -->
                    <!-- Loading Div -->
                    <div class="lvd-loading">
                    	<span></span>
                    </div>
                    <!-- End Loading Div -->
                </div>
                <!-- END OF BLOCK -->
                

            </div>
        </div>
    </section>
<script>

</script>
<style>
    .head-top{
        display: block;
        height: 350px;
        width: 100%;
        overflow: hidden;
        position: relative;
        margin: 30px 0;
    }
    .head-top img{
        width: 100%;
        -webkit-filter: blur(3px) grayscale(20%);
        -o-filter: blur(3px) grayscale(20%);
        filter: blur(3px) grayscale(20%);
    }
    .head-top .infor-category{
        position: relative;
        bottom: 0;
        left: 0;
        height: 100%;
        width: 40%;
        background: rgba(255, 255, 255, 0.95);
        padding: 10px;
    }
    .head-top .infor-category:before{
        content: '';
        position: absolute;
        top: 0;
        right: -70px;
        height: 100%;
        opacity: 0.95;
        width: 70px;
        background: url('/images/ui/border-right-triangle.png') no-repeat left top;
        background-size: 100% 100%;
    }
    .head-top .infor-category h1{
        padding: 5px 0;
        font-size: 2em;
        font-weight: bold;
        text-shadow: 1px 1px 1px #000;
        margin: 0;
        border-bottom: 1px solid #ddd;
        text-transform: uppercase;
    }
    .head-top .infor-category a{

    }
    .head-top .infor-category .desc-category{
        padding: 10px 0;
        text-align: justify;
        max-height: 100%;
        overflow: hidden;
    }
</style>
@stop

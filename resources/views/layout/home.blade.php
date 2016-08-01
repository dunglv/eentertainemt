@extends('layout.master')
@section('title', 'Home page')
@section('body')
<!-- begin featured -->
    <section id="featured-home" class="block">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="block-cap">
                        <h2>NỔI BẬT</h2>
                    </div>
                </div>
                <div class="block-content">
                    @if($featured->count()== 0)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">dữ liệu đang được cập nhật</div>
                    @else
                        @foreach($featured as $fea)
                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            @if($fea->type=='video')
                                <div id="{{rand(100,999).'_fea_'.$fea->idv}}" class="item-block item-{{$fea->type}}">
                                    <div class="desc-thumb">
                                        <div class="thumb-item">
                                             <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$fea->idv}}" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="title-item">
                                        <h3><a href="https://www.youtube.com/watch?v={{$fea->idv}}"><?php //echo youtube($vId)['snippet']['title'] ?></a></h3>
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
                                <div id="{{rand(100,999).'_fea_'.$fea->id}}" class="item-block item-{{$fea->type}}">
                                    <div class="desc-thumb">
                                        <div class="thumb-item">
                                            <img src="{{url($fea->thumbnail)}}" alt="{{$fea->title}}">
                                        </div>
                                        <div class="desc-item" style="">
                                            {{substr($fea->description, 0, 200).'...'}}
                                        </div>
                                        <div class="button-link">
                                            <a href="{{url($fea->url.'.'.$fea->id)}}"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="title-item">
                                        <h3><a href="{{url($fea->url.'.'.$fea->id)}}">{{$fea->title}}</a></h3>
                                    </div>
                                    <div class="no-item">
                                        <div class="in-no-item">
                                            <span><i class="fa fa-eye"></i><i class="count viewCount"></i>{{$fea->viewcount}}</span>
                                            <span><i class="fa fa-thumbs-o-up"></i><i class="count likeCount"></i>{{$fea->viewcount}}</span>
                                            <span><i class="fa fa-thumbs-o-down"></i><i class="count dislikeCount"></i>{{$fea->viewcount}}</span>
                                            <span><i class="fa fa-comment-o"></i><i class="count commentCount"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end item -->
                            @endif
                        </div>
                        <!-- end of item -->
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end featured -->
    <!-- begin newest home -->
    <section id="newest-home" class="block">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="block-cap">
                        <h2>MỚI NHẤT</h2>
                    </div>
                </div>
                <div class="block-content">
                    @if($newest->count()== 0)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">dữ liệu đang được cập nhật</div>
                    @else
                        @foreach($newest as $new)
                         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            @if($new->type=='video')
                                <div id="{{rand(100,999).'_fea_'.$new->idv}}" class="item-block item-{{$new->type}}">
                                    <div class="desc-thumb">
                                        <div class="thumb-item">
                                             <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$new->idv}}" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="title-item">
                                        <h3><a href="https://www.youtube.com/watch?v={{$new->idv}}"></a></h3>
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
                                <div id="{{rand(100,999).'_new_'.$new->id}}" class="item-block item-{{$new->type}}">
                                    <div class="desc-thumb">
                                        <div class="thumb-item">
                                            <img src="{{url($new->thumbnail)}}" alt="{{$new->title}}">
                                        </div>
                                        <div class="desc-item" style="">
                                            {{substr($new->description, 0, 200).'...'}}
                                        </div>
                                        <div class="button-link">
                                            <a href="{{url($new->url.'.'.$new->id)}}"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="title-item">
                                        <h3><a href="{{url($new->url.'.'.$new->id)}}">{{$new->title}}</a></h3>
                                    </div>
                                    <div class="no-item">
                                        <div class="in-no-item">
                                            <span><i class="fa fa-eye"></i><i class="count viewCount"></i>{{$new->viewcount}}</span>
                                            <span><i class="fa fa-thumbs-o-up"></i><i class="count likeCount"></i>{{$new->viewcount}}</span>
                                            <span><i class="fa fa-thumbs-o-down"></i><i class="count dislikeCount"></i>{{$new->viewcount}}</span>
                                            <span><i class="fa fa-comment-o"></i><i class="count commentCount"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end item -->
                            @endif
                        </div>
                        <!-- end of item -->
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end newesthome -->
    @if($cate->count()>0)
        @foreach($cate as $cat)
            <!-- begin {{$cat->url}} -->
            <section id="cat_home_{{$cat->id}}" class="block cate-home-{{$cat->id}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="block-cap">
                                <h2>{{$cat->title}}</h2>
                            </div>
                        </div>
                        <div class="block-content">
                            @if($cat->articles->count()==0)
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">đang cập nhật dữ liệu</div>
                            @else
                                 @foreach($cat->articles as $art)
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
                                                        <a href="{{url($art->url.'.'.$art->id)}}"><i class="fa fa-link"></i></a>
                                                    </div>
                                                </div>
                                                <div class="title-item">
                                                    <h3><a href="{{url($art->url.'.'.$art->id)}}">{{$art->title}}</a></h3>
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
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- end movie home -->
        @endforeach
    @endif


@stop
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

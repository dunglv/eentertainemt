@extends('layout.master')
@section('title', 'Detail Post')
@section('ostyle', HTML::style('/css/partials/article.css'))

@section('body')
	<div id="detail_post" class="post_1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="wrapper-post">
						<div class="dt-top">
							<div class="dt-title">
								<h1><a href="{{$article[0]->url.'.'.$article[0]->id}}">{{$article[0]->title}}</a></h1>
							</div>
							<div class="dt-share">
								<a href="#" class="sc sc-fb"><i class="fa fa-facebook"></i></a>
	                            <a href="#" class="sc sc-yt"><i class="fa fa-youtube"></i></a>
	                            <a href="#" class="sc sc-pt"><i class="fa fa-pinterest"></i></a>
							</div>
							<div class="dt-statis">
								<span><i class="fa fa-eye"></i>{{$article[0]->viewcount}}</span>
								<span><i class="fa fa-thumbs-o-up"></i>{{$article[0]->likecount}}</span>
								<span><i class="fa fa-thumbs-o-down"></i>{{$article[0]->dislikecount}}</span>
							</div>
						</div>
						
						<div class="dt-infor">
							In <a href="#">{{$article[0]->categories->title}}</a> by <a href="{{url('/author/admin')}}">admin</a>, at 10:10 AM March 10th 2016
						</div>
						
						<div class="dt-content">
							{!!$article[0]->content!!}
						</div>
						<div class="dt-tag block">
							<div class="tag-tit block-cap">
								<h2>TAGS</h2>
							</div>
							<div class="tag-list">
								@if ($article[0]->tag != "")
	                                @foreach(explode(',', trim($article[0]->tag, ',')) as $tag) 
	                                    <a class="tag_{{rand(100,1000)}}" class="n-tg">{{$tag}}</a>
	                                @endforeach
                                @endif
							</div>
						</div>
						<div class="dt-cate block">
							<div class="cate-tit block-cap">
								<h2>Các bài viết cùng chủ đề:</h2>
							</div>
							<ul class="acate-list">
								<li><a href="#">Lorem ipsum dolor sit amet.</a></li>
								<li><a href="#">Lorem ipsum dolor sit amet.</a></li>
								<li><a href="#">Lorem ipsum dolor sit amet.</a></li>
								<li><a href="#">Lorem ipsum dolor sit amet.</a></li>
							</ul>
						</div>
						<div class="dt-comment">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
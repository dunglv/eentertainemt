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
								<h1><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, tenetur!</a></h1>
							</div>
							<div class="dt-share">
								<a href="#" class="sc sc-fb"><i class="fa fa-facebook"></i></a>
	                            <a href="#" class="sc sc-yt"><i class="fa fa-youtube"></i></a>
	                            <a href="#" class="sc sc-pt"><i class="fa fa-pinterest"></i></a>
							</div>
							<div class="dt-statis">
								<span><i class="fa fa-eye"></i>100</span>
								<span><i class="fa fa-thumbs-o-up"></i>100</span>
								<span><i class="fa fa-thumbs-o-down"></i>100</span>
							</div>
						</div>
						
						<div class="dt-infor">
							In <a href="#">Lorem ipsum dolor sit amet.</a> by <a href="#">admin</a>, at 10:10 AM March 10th 2016
						</div>
						
						<div class="dt-content">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta obcaecati quod nemo aperiam animi voluptas, asperiores voluptatibus! Unde magnam nesciunt mollitia ea possimus, error laborum eaque dicta officia est enim, eveniet asperiores, facere, in. Laboriosam veritatis exercitationem labore aliquid dolorem, dolorum, dolor, magni pariatur iste vero incidunt officiis voluptatem enim eum dicta dolore et, officia laudantium deserunt ducimus impedit harum! Obcaecati omnis distinctio quae optio odit ipsam atque suscipit molestias saepe. Nostrum porro autem, incidunt ut accusamus sed, cumque nesciunt minus fugit illum delectus necessitatibus, vel recusandae earum. Animi delectus molestiae eaque vel asperiores quibusdam culpa placeat tempora commodi. Sint!
						</div>
						<div class="dt-tag block">
							<div class="tag-tit block-cap">
								<h2>TAGS</h2>
							</div>
							<div class="tag-list">
								<a href="#">haha</a><a href="#">ahihi</a><a href="#">nono</a>
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
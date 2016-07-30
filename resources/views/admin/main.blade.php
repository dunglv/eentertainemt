@extends('admin.home')
@section('title', 'Trang chủ quản lý')
@section('body')
	<section id="main-admin">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<div class="block ablock-newest">
						<div class="block-cap">
							<h2>KIỂM DUYỆT BÀI VIẾT</h2>
						</div>
						<div class="block-content">
							@if($a_articles->count() == 0)
								<div>không có bài viết nào cần kiểm duyệt</div>
							@else
								@foreach($a_articles as $a_a)
								<div id="a_item_{{$a_a->id}}" class="aitem aitem_{{$a_a->id}}">
									<div class="aitem-wrapper">
										<div class="athumb">
											{!! HTML::image($a_a->thumbnail, $a_a->title) !!}
										</div>
										<div class="acontent">
											<div class="atit">
												<h3><a href="{{$a_a->url}}">{{$a_a->title}}</a></h3>
											</div>
											<div class="adesc">
												{{substr($a_a->description, 0, 200).'...'}}
											</div>
											<div class="astatis">
												<span><i class="fa fa-eye"></i>{{$a_a->viewcount}}</span>
												<span><i class="fa fa-thumbs-o-up"></i>{{$a_a->likecount}}</span>
												<span><i class="fa fa-thumbs-o-down"></i>{{$a_a->dislikecount}}</span>
											</div>
										</div>
									</div>
									<!-- end aitem wrapper-->
									<div class="aop aoption">
										<span id="a_bt_exp_{{$a_a->id}}" class="bt_exp"><i class="fa fa-chevron-down"></i></span>
										<ul class="_exp_dropdown">
											<li data-id="a_del_{{$a_a->id}}" class="a_del"><a href="#">Xóa</a></li>
											<li><a href="{{route('article.edit', [$a_a->url,'type'=>'post','fn'=>'edit','post'=>$a_a->id])}}">Chỉnh sửa</a></li>
											<li><a href="#">Disable</a></li>
										</ul>
									</div>
								</div>
								<!-- emd item -->
								@endforeach
							@endif
						</div>
					</div>
					
					<div class="block ablock-newest">
						<div class="block-cap">
							<h2>BÀI VIẾT MỚI NHẤT</h2>
						</div>
						<div class="block-content">
							@if($n_articles->count() == 0)
								<div>chưa có bài viết nào</div>
							@else
								@foreach($n_articles as $a_n)
								<div id="n_item_{{$a_n->id}}" class="aitem aitem_{{$a_n->id}}">
									<div class="aitem-wrapper">
										<div class="athumb">
											{!! HTML::image($a_n->thumbnail, $a_n->title) !!}
										</div>
										<div class="acontent">
											<div class="atit">
												<h3><a href="{{$a_n->url}}">{{$a_n->title}}</a></h3>
											</div>
											<div class="adesc">
												{{substr($a_n->description, 0, 200).'...'}}
											</div>
											<div class="astatis">
												<span><i class="fa fa-eye"></i>{{$a_n->viewcount}}</span>
												<span><i class="fa fa-thumbs-o-up"></i>{{$a_n->likecount}}</span>
												<span><i class="fa fa-thumbs-o-down"></i>{{$a_n->dislikecount}}</span>
											</div>
										</div>
									</div>
									<!-- end aitem wrapper-->
									<div id="new_aop_{{$a_n->id}}" class="aop aoption">
										<span id="n_bt_exp_{{$a_n->id}}" class="bt_exp"><i class="fa fa-chevron-down"></i></span>
										<ul class="_exp_dropdown">
											<li data-id="n_del_{{$a_n->id}}" class="a_del"><a href="#">Xóa</a></li>
											<li ><a href="{{route('article.edit', [$a_n->url,'type'=>'post','fn'=>'edit','post'=>$a_n->id])}}">Chỉnh sửa</a></li>
											<li><a href="#">Disable</a></li>
										</ul>
									</div>
								</div>
								<!-- emd item -->
								@endforeach
							@endif
						</div>
					</div>
					@foreach($categories as $cate)
					<div class="block ablock-newest">
						<div class="block-cap">
							<h2>{{$cate->title}}</h2>
						</div>
						<div class="block-content">
							@if(count($cate->articles)==0)
								<div style="">Chủ đề này chưa có bài viết nào</div>
							@else
								@foreach($cate->articles as $a)
								<div id="c_item_{{$a->id}}" class="aitem aitem_{{$a->id}}">
									<div class="aitem-wrapper">
										<div class="athumb">
											@if(!empty($a->thumbnail))
												{!! HTML::image($a->thumbnail, $a->title) !!}
											@else
												{!! HTML::image('/images/items/item.jpg', $a->title) !!}
											@endif
										</div>
										<div class="acontent">
											<div class="atit">
												<h3><a href="{{url($a->url.'-'.$a->id)}}">{{$a->title}}</a></h3>
											</div>
											<div class="adesc">
												{{substr($a->description,0, 200).'...'}}
											</div>
											<div class="astatis">
												<span><i class="fa fa-eye"></i>{{$a->viewcount}}</span>
												<span><i class="fa fa-thumbs-o-up"></i>{{$a->likecount}}</span>
												<span><i class="fa fa-thumbs-o-down"></i>{{$a->dislikecount}}</span>
											</div>
										</div>
									</div>
									<!-- end aitem wrapper-->
									<div class="aop aoption">
										<span id="c_bt_exp_{{$a->id}}" class="bt_exp"><i class="fa fa-chevron-down"></i></span>
										<ul id="_exp_dropdown_{{$a->id}}" class="_exp_dropdown">
											<li data-id="c_del_{{$a_n->id}}" class="a_del"><a href="#">Xóa</a></li>
											<li><a href="{{route('article.edit', [$a->url,'type'=>'post','fn'=>'edit','post'=>$a->id])}}">Chỉnh sửa</a></li>
											<li><a href="#">Disable</a></li>
										</ul>
									</div>
								</div>
								<!-- emd item -->
								@endforeach
							@endif
						</div>
					</div>
					<!-- end block -->
					@endforeach
				</div>
				<!-- ***************************END MAIN***************************** -->
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="block ablock-time">
						<div class="in-time">
							<div class="wrap-time">
								<p>Thứ 4, 10/10/2016</p>
								<p>10:10:10 AM</p>
							</div>
						</div>
					</div>
					<div class="block ablock-infor ablock-list">
						<div class="block-cap">
							<h2>INFORMATION</h2>
						</div>
						<div class="block-content">
							<div class="ahead">
								<h4>LƯƠNG VIẾT DUNG</h4>
							</div>
							<ul>
								<li>
									<p>Tên đăng nhập</p>
									<p class="txtfollow">admin</p>
								</li>
								<li>
									<p>Mật khẩu</p>
									<p class="txtfollow">*********</p>
								</li>
								<li>
									<p>Email</p>
									<p class="txtfollow">vietdungit93@gmail.com</p>
								</li>
								<li>
									<p>Đăng nhập lần cuối</p>
									<p class="txtfollow">10:10 AM, March 10th, 2016</p>
								</li>
								<li>
									<p>Điện thoại</p>
									<p class="txtfollow">01228559193</p>
								</li>
							</ul>
						</div>
					</div>
					<div class="block ablock-statis ablock-list">
						<div class="block-cap">
							<h2>STATISTICS</h2>
						</div>
						<div class="block-content">
							<ul>
								<li>
									<p>Tổng bài viết</p>
									<p class="txtfollow">10000</p>
								</li>
								<li>
									<p>Tổng thành viên</p>
									<p class="txtfollow">0</p>
								</li>
								<li>
									<p>Tổng bình luận</p>
									<p class="txtfollow">3210</p>
								</li>
								<li>
									<p>Tổng lượt ghé thăm</p>
									<p class="txtfollow">21000</p>
								</li>
								<li>
									<p>Lượt truy cập cuối</p>
									<p class="txtfollow">10:10 AM, March 10th, 2016</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
</script>
@stop
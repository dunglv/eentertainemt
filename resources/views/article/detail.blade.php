@extends('layout.master')
@section('title', $article[0]->title)
@section('ostyle', HTML::style('/css/partials/article.css'))

@section('body')
	<div id="detail_post" class="post_1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="wrapper-post">
						<div class="dt-top">
							<div class="dt-created">
								<?php  $days = [
										'Monday' => 'Thứ hai',
										'Tuesday' => 'Thứ ba',
										'Webnesday' => 'Thứ tư',
										'Thurday' => 'Thứ năm',
										'Friday' => 'Thứ sáu',
										'Saturday' => 'Thứ bảy',
										'Sunday' => 'Chủ nhật'
									];
									?>
									{{$days[$article[0]->created_at->format('l')].', tháng '.$article[0]->created_at->format('m').', năm '.$article[0]->created_at->format('Y')}}
							</div>
							<div class="dt-title">
								<h1><a href="{{$article[0]->url.'.'.$article[0]->id}}">{{$article[0]->title}}</a></h1>
							</div>
							<div class="dt-infor">
								<span>trong <a href="{{route('front.detail_category', $article[0]->categories->url)}}">{{$article[0]->categories->title}}</a></span> <span>bởi <a href="{{url('/author/admin')}}">admin</a> </span>
							</div>
							
						</div>
						
						<div class="dt-content">
							{!!$article[0]->content!!}
						</div>
						<div class="dt-top">
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
						<div class="dt-tag block">
							<div class="tag-tit block-cap">
								<h2>TAGS</h2>
							</div>
							<div class="tag-list">
	                                @foreach($tags as $tag) 
	                                    <a href="{{route('front.tag', $tag->title)}}" class="tag_{{rand(100,1000)}}" class="n-tg">{{$tag->title}}</a>
	                                @endforeach
							</div>
						</div>

						<div class="dt-cate block">
							<div class="cate-tit block-cap">
								<h2>Các bài viết cùng chủ đề:</h2>
							</div>
							<ul class="acate-list">
								@if($samecate->count()>0)
									@foreach($samecate as $sc)
									<li><a href="{{route('front.detail_article', $sc->url)}}">{{$sc->title}}</a></li>
									@endforeach
								@else
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">đang cập nhật dữ liệu</div>
								@endif
							</ul>
						</div>
						<!-- COMMENT -->
						<div class="dt-comment">
							<div class="dt-comment-tit">
								@if($comments->count() > 0)
									<h4>Nhận xét ({{$comments->count()}} nhận xét)</h4>
								@else
									<h4>hãy trở thành người xét đầu tiên</h4>
								@endif
							</div>
							<div class="dt-comment-form">
								{!!Form::open([
									'route' => 'comment.store',
									'method' => 'post',
									'class' => 'cmt-form'
								])!!}
									<textarea name="comment" id="field_comment" cols="100"  rows="5"></textarea>
									<input type="hidden" class="cmt_hide_id" value="u_{{Auth::user()->id}},a_{{$article[0]->id}}">
									<button class="btn btn-primary add-comment" type="submit">Đăng nhận xét</button>
									<button class="btn btn-primary" type="reset">Nhập lại</button>

								{!!Form::close()!!}
							</div>
							<div class="dt-comment-list">
								@if($comments->count() > 0)
								<ul class="root-comment">
									@foreach($comments as $cmt)
										@if($cmt->parent_id == 0)
										<li id="comment_{{$cmt->id}}" class="comment comment-{{$cmt->id}}">
											<div class="in-comment">
												<div class="avt-cmt">
													{!!HTML::image('/images/items/item.jpg')!!}
												</div>
												<div class="content-cmt">
													<div class="t-cmt">
														<a class="username" href="#">{{$cmt->user->name}}</a>
														<span>{{$cmt->title}}</span>
													</div>
													<div class="bt-cmt">
														<span id="cmt_created_id" class="time-created">{{$cmt->created_at->format('d/m/Y')}}</span>
														<span id="reply_{{$cmt->id}}" class="reply">trả lời</span>
													</div>
													<div id="sb_cmt_id" class="sb-cmt">
														<span><i class="fa fa-ellipsis-v"></i></span>
														<ul id="cmt_opt_{{$cmt->id}}" class="opt-cmt">
															<li><a id="cmt_d_{{$cmt->id}}" href="#">Xóa</a></li>
															<li><a id="cmt_e_{{$cmt->id}}" href="#">Edit</a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- end of content comment -->

											<!-- sub comments -->
											@if($cmt->getChildrenComments($cmt->id)->count() > 0)
											<ul id="sub_comment_{{$cmt->id}}" class="sub-comment">
												@foreach($cmt->getChildrenComments($cmt->id) as $scmt)
												<li id="comment_{{$scmt->id}}" class="comment comment-{{$scmt->id}}">
													<div class="in-comment">
														<div class="avt-cmt">
															{!!HTML::image('/images/items/item.jpg')!!}
														</div>
														<div class="content-cmt">
															<div class="t-cmt">
																<a class="username" href="#">{{$scmt->user->name}}</a>
																<span>{{$scmt->title}}</span>
															</div>
															<div class="bt-cmt">
																<span id="cmt_created_id" class="time-created">{{$scmt->created_at->format('d/m/Y')}}</span>
																<span id="reply_{{$scmt->id}}" class="reply">trả lời</span>
															</div>
															<div id="sb_cmt_{{$scmt->id}}" class="sb-cmt">
																<span><i class="fa fa-ellipsis-v"></i></span>
																<ul class="opt-cmt">
																	<li><a id="cmt_d_{{$scmt->id}}" href="#">Xóa</a></li>
																	<li><a id="cmt_e_{{$scmt->id}}" href="#">Edit</a></li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												@endforeach
											</ul>
											@endif
											<!-- End Of SubComment -->
										</li>
										@endif
									@endforeach
								</ul>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
	$(document).on('click', '.add-comment, .reply-cmt', function(event){

		if(!$(this).parents('.cmt-form').hasClass('cmt_reply')){
			var ct_cmt = $('#field_comment').val();
			var cmt_hide_id = $('.cmt_hide_id').val();

		}else{
			var ct_cmt = $('.cmt_reply #field_comment').val();
			var cmt_hide_id = $('.cmt_reply .cmt_hide_id').val();
		}
		
		var  jsonData = {};
		var $_this = $(this);
		jsonData['comment'] = ct_cmt;
		jsonData['user'] = cmt_hide_id.split(',')[0].substr(2,10); 
		jsonData['article'] = cmt_hide_id.split(',')[1].substr(2,10); 
		jsonData['_token'] = $('.dt-comment-form input[name="_token"]').val();
		if($_this.hasClass('reply-cmt')){
			jsonData['parent_id'] = cmt_hide_id.split(',')[2].substr(2,10); 
		}
		$.ajax({
			type: 'POST',
			data: jsonData,
			url: '/comment/create',
			success: function(data){
				var str ='<li id="comment_'+data['cId']+'" class="comment comment-'+data['cId']+'"><div class="in-comment"><div class="avt-cmt"><img src="" alt=""></div><div class="content-cmt"><div class="t-cmt"><a class="username" href="#">{{Auth::user()->name}}</a><span>'+ct_cmt+'</span></div><div class="bt-cmt"><span id="cmt_created_id" class="time-created">10/10/2016</span><span id="reply_'+data['cId']+'" class="reply">trả lời</span></div><div id="sb_cmt_'+data['cId']+'" class="sb-cmt"><span><i class="fa fa-ellipsis-v"></i></span><ul id="cmt_opt_'+data['cId']+'" class="opt-cmt"><li><a id="cmt_d_'+data['cId']+'" href="#">Xóa</a></li><li><a id="cmt_e_'+data['cId']+'" href="#">Edit</a></li></ul></div></div></div></li>';
				$('#field_comment').val('');
				if($_this.hasClass('reply-cmt')){
					var _id = $_this.attr('id');
					// alert(_id); 
					var $root_cmt = $('#sub_comment_'+_id+' li');
					if($root_cmt.length == 0){
						$('#comment_'+_id).append('<ul id="sub_comment_'+_id+'" class="sub-comment">'+str+'</ul>');
					}else{
						$('#comment_'+_id+' .sub-comment').prepend(str);
					}
					$('.cmt_reply #field_comment').val('');
				}else{
					var $root_cmt = $('.root-comment');
					if($root_cmt.length == 0){
						$('.dt-comment').append('<div class="dt-comment-list"><ul class="root-comment">'+str+'</ul></div>');
					}else{
						$('.root-comment').prepend(str);
					}
					$('#field_comment').val('');

				}
			},
			error: function(){
				alert('false');
			}
		});
		event.preventDefault();
		return false;
	});
	$(document).on('click', '.reply', function(event){
		var $r_this = $(this);
		var _id = $(this).attr('id').substr(6, 20);
		var _str = '<div class="dt-comment-form">{!!Form::open(["route" => "comment.store","method" => "post", "class" => "cmt-form cmt_reply", "id" => "cmt_form_'+_id+'"])!!}<textarea name="comment" id="field_comment" cols="100"  rows="5"></textarea><input type="hidden" class="cmt_hide_id" value="u_{{Auth::user()->id}},a_{{$article[0]->id}},p_'+_id+'"><button id="'+_id+'" class="btn btn-primary reply-cmt" >Đăng nhận xét</button><button class="btn btn-primary" type="reset">Nhập lại</button>{!!Form::close()!!}</div>';
		$r_this.parents('.root-comment').find('.dt-comment-form').remove();
		$('#comment_'+_id).append(_str);
		
	});
</script>
@stop

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
							<div class="aitem">
								<div class="aitem-wrapper">
									<div class="athumb">
										{!! HTML::image('/images/items/item.jpg') !!}
									</div>
									<div class="acontent">
										<div class="atit">
											<h3><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum sunt rerum reiciendis voluptas, similique dignissimos quis nobis quos nesciunt cum.</a></h3>
										</div>
										<div class="adesc">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim nesciunt necessitatibus vero expedita sit asperiores, accusamus dolorum quas nisi! Iste.
										</div>
										<div class="astatis">
											<span><i class="fa fa-eye"></i>100</span>
											<span><i class="fa fa-thumbs-o-up"></i>100</span>
											<span><i class="fa fa-thumbs-o-down"></i>100</span>
										</div>
									</div>
								</div>
								<!-- end aitem wrapper-->
								<div class="aop aoption">
									<span class="bt_exp"><i class="fa fa-chevron-down"></i></span>
									<ul class="_exp_dropdown">
										<li><a href="#">Xóa</a></li>
										<li><a href="#">Chỉnh sửa</a></li>
										<li><a href="#">Disable</a></li>
									</ul>
								</div>
							</div>
							<!-- emd item -->
						</div>
					</div>
					<div class="block ablock-newest">
						<div class="block-cap">
							<h2>BÀI VIẾT MỚI NHẤT</h2>
						</div>
						<div class="block-content">
							
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="block ablock-infor">
						<div class="block-cap">
							<h2>INFORMATION</h2>
						</div>
						<div class="block-content">
							
						</div>
					</div>
					<div class="block ablock-statis">
						<div class="block-cap">
							<h2>STATISTICS</h2>
						</div>
						<div class="block-content">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@stop
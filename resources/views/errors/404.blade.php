<!DOCTYPE html>
<html>
<head>
	<title>Không tìm thấy trang</title>
	<link rel="icon" type="icon" href="{{url('/images/front/logo.png')}}">
	{!!HTML::style('/css/main/front.css')!!}
</head>
<body>
	<div class="content">
		<div class="img-err">{!!HTML::image('/images/front/logo.png')!!}</div>
		<div class="tit-err"><h2>Lỗi 404: Không tìm thấy trang</h2></div>
		<div class="infor-err">Bạn đang truy cập vào trang không tồn tại trong website. Quay lại <a href="{{url('/')}}">trang chủ</a> để xem các trang khác</div>
	</div>
</body>
<style type="text/css">
	a{
		font-weight: bold;
	}
	.content{
		text-align: center;
	}
	.img-err{
		height: 250px;
		margin-top: 30px;
	}
	.img-err img{
		height: 100%;
		max-height: 100%;
	}
</style>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống đăng nhập | E Entertainment</title>
    {!! HTML::style('css/bootstrap/bootstrap.min.css') !!}
    <link rel="stylesheet" href="css/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main/front.css">
    <link rel="stylesheet" href="css/abcxyz/admin.css">
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
    <section id="login">
        <div class= "container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                    <div class="block block-login">
                        <div class="block-cap">
                            <h2>ĐĂNG NHẬP</h2>
                        </div>
                        <div class="form-field">
                                {!! Form::open([
                                    'route' =>['admin.postlogin'],
                                    'method' => 'POST'
                                ]) !!}
                                @if(Session::has('flash_error'))
                                    <div class="flash_notice">{{ Session::get('flash_error') }}</div>
                                    <style>
                                        .flash_notice{
                                            background: #ddd;
                                            padding: 5px;
                                            margin-bottom: 20px;
                                            font-size: 0.8em;
                                            color: #e74c3c;
                                            font-weight: bold;
                                            border-left: 4px solid #e74c3c;
                                        }
                                    </style>
                                @endif
                                    <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">Email:</span>
                                          <input type="text" name="email" class="form-control" placeholder="Nhập email..." aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">Mật khẩu:</span>
                                          <input type="password" name="password" class="form-control" placeholder="Mật khẩu" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    <a href="{{route('front.home')}}" class="btn btn-primary">Thoát</a>
                                {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>Hệ thống đăng nhập quản trị website E Entertainment</p>
        <p>Copryright &copy; 2016 - E Eentertainment Ltd.Co</p>
        <p>Xây dựng bởi <a href="#">Lương Viết Dung</a></p>
    </footer>
</body>
</html>
<style>
    #login{
        padding-top: 5%;
    }
    .block-login .form-field{
        padding: 30px 20px;
        border: 1px solid #e74c3c;
    }
    .block-login .block-cap{
        margin: 0;
    }
    .block-login h2{
        font-size: 1.3em;

    }
    .input-group{
        width: 100%;
    }
    .input-group .input-group-addon{
        width: 25% !important;
    }
    .block-login .btn{
        background: #16a085;
        border: 0;
        border-radius: 0;
    }
    .block-login .btn:hover{
        background: #ccc;
        color: #16a085; 
        -webkit-transition: all ease-in 0.2s;
        -o-transition: all ease-in 0.2s;
        transition: all ease-in 0.2s;
    }
    footer{
        background: transparent;
        text-align: center;
        padding-top: 20px;
        margin-top: 100px;
        font-size: 0.9em;
        position: relative;
    }
    footer:before{
        content: '';
        position: absolute;
        top: -20px;
        left: 0;
        width: 100%;
        height: 30px;
        background: url('/images/ui/line_footer.png') no-repeat center;
        opacity: 0.2;
    }
    footer p{
        margin: 5px 0;
    }
    footer a{
        font-weight: bold;
    }
</style>
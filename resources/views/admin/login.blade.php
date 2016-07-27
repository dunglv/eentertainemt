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
                                <form action="" method="POST" role="form">
                                    <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">Tên đăng nhập:</span>
                                          <input type="text" class="form-control" placeholder="Tên đăng nhập" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">Mật khẩu:</span>
                                          <input type="password" class="form-control" placeholder="Mật khẩu" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                    <a class="btn btn-primary">Thoát</a>
                                </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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

</style>
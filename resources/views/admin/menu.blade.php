<header>
    <nav class="navbar navbar-default menu-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo-top" href="#">{!! HTML::image('images/front/logo.png','alt="e entertainment"') !!}</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">quản lý bài viết<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">viết bài mới</a></li>
                            <li><a href="#">tất cả bài viết</a></li>
                            <li><a href="#">thống kê bài viết</a></li>
                            <li><a href="#">phân loại</a></li>
                        </ul>
                    </li>
                    <li><a href="#">quản lý thành viên</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="search key...">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="bt-logout"><a href="#" title="Đăng xuất"><i class="fa fa-reply"></i></a></li>
                    <li class="bt-setting"><a href="#" title="Cài đặt"><i class="fa fa-cog"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ngôn ngữ<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">tiếng việt</a></li>
                            <li><a href="#">tiếng anh</a></li>
                            <li><a href="#">tiếng trung</a></li>
                            <li><a href="#">tiếng pháp</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</header>
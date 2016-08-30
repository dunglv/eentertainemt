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
                <a class="navbar-brand logo-top" href="{{route('admin.home')}}">{!! HTML::image('images/front/logo.png','alt="e entertainment"') !!}</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">bài viết<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('article.create')}}">viết bài mới</a></li>
                            <li><a href="#">tất cả bài viết</a></li>
                            <li><a href="#">thống kê bài viết</a></li>
                            <li><a href="#">bài viết cần kiểm duyệt</a></li>
                            <li><a href="#">các nhận xét bài viết</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">chủ đề<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('category.create')}}">tạo chủ đề mới</a></li>
                            <li><a href="{{route('category.index')}}">tất cả chủ đề</a></li>
                            <li><a href="#">thống kê chủ đề</a></li>
                            <li><a href="#">phân loại</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">menu<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('menu.create')}}">tạo menu mới</a></li>
                            <li><a href="{{route('menu.index')}}">tất cả menu</a></li>
                            <li><a href="#">thống kê menu</a></li>
                            <li><a href="#">phân loại</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">thành viên<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('article.create')}}">thành viên phần chờ</a></li>
                            <li><a href="#">báo cáo thành viên</a></li>
                            <li><a href="#">thống kê thành viên</a></li>
                            <li><a href="#">tất cả thành viên</a></li>
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">giao diện<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('article.create')}}">đến website</a></li>
                            <li><a href="#">template có sẵn</a></li>
                            <li><a href="#">tùy chỉnh cụ thể</a></li>
                            <li><a href="#">tùy chỉnh bố cục</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="search key...">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="bt-logout"><a href="{{route('admin.logout')}}" title="Đăng xuất"><i class="fa fa-reply"></i></a></li>
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
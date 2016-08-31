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
                <a class="navbar-brand logo-top" href="{{route('front.home')}}">{!! HTML::image('images/front/logo.png','alt="e entertainment"') !!}</a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- Three Type Of Mennu: none, link, category, article -->

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('front.home')}}">{{trans('front.menu.home')}}</a></li>
                    @foreach($menu as $mn)
                        @if($mn->parent == 0)
                            @if($mn->getChildMenuActive($mn->id)->count() > 0)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$mn->title}}<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        @foreach($mn->getChildMenuActive($mn->id) as $mnc)
                                                @if($mnc->type=="none")
                                                    <li><a href="#">{{$mnc->title}}</a></li>
                                                @elseif($mnc->type=="link")
                                                    <li><a href="{{url($mnc->link)}}">{{$mnc->title}}</a></li>
                                                @elseif($mnc->type=="article")
                                                    {{--------------getUrlArticle: to get link base article value from menus table-----------}}
                                                    <li><a href="{{route('front.detail_article', $mn->getUrlArticle($mnc->article)[0]->url)}}">{{$mnc->title}}</a></li>
                                                @elseif($mnc->type=="category")
                                                    {{--------------getUrlCategory: to get link base category value from menus table-----------}}
                                                    <li><a href="{{route('front.detail_category', $mn->getUrlCategory($mnc->category)[0]->url)}}">{{$mnc->title}}</a></li>
                                                @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                @if($mn->type=="none")
                                    <li><a href="#">{{$mn->title}}</a></li>
                                @elseif($mn->type=="link")
                                    <li><a href="{{url($mn->link)}}">{{$mn->title}}</a></li>
                                @elseif($mn->type=="article")
                                    {{--------------getUrlArticle: to get link base article value from menus table-----------}}
                                    <li><a href="{{route('front.detail_article', $mn->getUrlArticle($mn->article)[0]->url)}}">{{$mn->title}}</a></li>
                                @elseif($mn->type=="category")
                                    {{--------------getUrlCategory: to get link base category value from menus table-----------}}
                                    <li><a href="{{route('front.detail_category', $mn->getUrlCategory($mn->category)[0]->url)}}">{{$mn->title}}</a></li>
                                @endif
                            @endif
                        @endif

                    @endforeach
                </ul>
                {!!Form::open([
                    'route'=> 'front.search',
                    'method' => 'GET',
                    'class' => 'navbar-form navbar-left',
                    'role' => 'search'
                ])!!}
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="{{trans('front.menu.search')}}">
                    </div>
                {!!Form::close()!!}
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('front.menu.selectlang')}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('front.lang', ['lang'=>'vi'])}}">{{trans('front.lang.vi')}}</a></li>
                            <li><a href="{{route('front.lang', ['lang'=>'en'])}}">{{trans('front.lang.en')}}</a></li>
                            <li><a href="{{route('front.lang', ['lang'=>'cn'])}}">{{trans('front.lang.cn')}}</a></li>
                            <li><a href="{{route('front.lang', ['lang'=>'fr'])}}">{{trans('front.lang.fr')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</header>
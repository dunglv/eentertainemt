@extends('admin.home')
@section('title', 'Menu Manager')
@section('body')
    <section id="menu_home">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="block block-menu-home">
                        <div class="block-cap">
                            <h2>Quản lý menu</h2>
                        </div>
                        <div class="block-content">
                            <div class="menu-guide">
                                <ul>
                                    <li>nhấp chuột vào <i class="fa fa-eye"></i> để hiện menu và <i class="fa fa-eye-slash"></i> để ẩn menu ngoài trang chủ.</li>
                                    <li>nhấp chuột vào <i class="fa fa-remove"></i> để xóa menu (hãy cẩn thận và đọc thông báo trước khi bạn muốn xóa)</li>
                                </ul>
                            </div>
                            <div class="menu-list">
                                @if($menus->count() > 0)
                                    <ul>
                                    @foreach($menus as $mn)
                                            @if($mn->parent == 0)
                                                <li class="m_root mn_{{$mn->id}}">
                                                    <a href="{{route('menu.edit', [$mn->url, 'id'=>$mn->id])}}">{{$mn->title}}</a>
                                                    <div class="m_opt_wrap">
                                                        <i id="mn_{{$mn->id}}" @if($mn->status == 1) class="m_opt m_hide fa fa-eye-slash" title="Ẩn menu này" @else class="m_opt m_show fa fa-eye" title="Hiển thị menu này" @endif ></i>
                                                        <i id="md_{{$mn->id}}" class="m_opt m_delete fa fa-remove"></i>
                                                    </div>
                                                    
                                                </li>
                                                @foreach($mn->getChildMenu($mn->id) as $mnc)
                                                    <li class="m_child mn_{{$mnc->id}}">
                                                        <a href="{{route('menu.edit', [$mnc->url, 'id'=>$mnc->id])}}">__{{$mnc->title}}</a>
                                                        <div class="m_opt_wrap">
                                                            <i id="mn_{{$mnc->id}}" @if($mnc->status == 1) class="m_opt m_hide fa fa-eye-slash" title="Ẩn menu này" @else class="m_opt m_show fa fa-eye" title="Hiển thị menu này" @endif ></i>
                                                            <i id="md_{{$mnc->id}}" class="m_opt m_delete fa fa-remove"></i>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                    @endforeach
                                    </ul>
                                @else
                                    chưa có menu nào được tạo
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
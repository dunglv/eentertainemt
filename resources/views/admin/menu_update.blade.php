@extends('admin.home')
@section('title', 'chỉnh sửa menu')
@section('body')
 <section id="update_article">
        <div class="container">
            <div class="row">
                <div class="col-expand col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="block block-create block-menu">
                        <div class="block-cap">
                            <h2>chỉnh sửa menu</h2>
                        </div>
                        @if(Session::has('notied'))
                            @if(Session::get('notied')=='ok')
                                <div class="i_tool bg-success" style="padding:5px; margin: 10px 0;background: #31bfa3;color:#fff;">Menu đã được cập nhật</div>
                            @else
                                <div class="i_tool bg-danger" style="padding:5px; margin: 10px 0;background: #e74c3c;color:#fff;">Lỗi! Không thể tạo menu mới! Vui lòng kiểm tra lại</div>
                            @endif
                        @endif
                        <div class="block-content">
                            <div id="form-menu-{{$menu[0]->id}}" class="form-create form-update form-field form-menu">
                                {!! 
                                Form::open([
                                    'method' => 'PUT',
                                    'route' => ['menu.update', $menu[0]->url, 'id'=>$menu[0]->id],
                                    'files' => true,
                                    'class' => '',
                                    'name' => 'a_form_create',
                                    'autocomplete' => 'off'
                                ]) 
                                !!}
                                    <div class="form-group form-title">
                                        <label for="">tên menu</label>
                                        <input type="text" name="a_title" class="form-control _txtT" id="a_title_id" value="{{$menu[0]->title}}" placeholder="tên menu...">
                                    </div>
                                    <div class="form-group form-url">
                                        <label for="">segment of url</label>
                                        <div class="group-btn">
                                            <input type="text" name="a_url" class="form-control _txtTr _overlay" id="a_url_id" value="{{$menu[0]->url}}" placeholder="segment hiển thị url (ten-chu-de)">
                                            <div class="getAlias" title="Refesh url title"><i class="fa fa-refresh"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="">menu cha</label>
                                        <div class="pad">
                                            <select name="a_parent" id="a_parent_id" class="form-control ">
                                                <option value="0">--Không có menu cha---</option>
                                                @foreach($menus as $mn)
                                                <option @if($menu[0]->parent == $mn->id) selected @endif value="{{$mn->id}}">{{$mn->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-type">
                                        <label for="">thể loại menu</label>
                                        <div class="pad opt_radio">
                                            <label for="a_type_none"><input type="radio" id="a_type_none" name="a_type" @if($menu[0]->type == 'none') checked @endif value="none">none</label>
                                            <label for="{{$menu[0]->link}}"><input type="radio"  id="{{$menu[0]->link}}" name="a_type" @if($menu[0]->type == 'link') checked @endif value="link">link</label>
                                            <label for="a_type_category_{{$menu[0]->category}}"><input type="radio" id="a_type_category_{{$menu[0]->category}}" name="a_type" @if($menu[0]->type == 'category') checked @endif value="category">chủ đề</label>
                                            <label for="a_type_article_{{$menu[0]->article}}"><input type="radio" id="a_type_article_{{$menu[0]->article}}" name="a_type" @if($menu[0]->type == 'article') checked @endif value="article">bài viết</label>
                                        </div>
                                    </div>
                                    @if($menu[0]->type=='link')
                                    <div class="form-group form-type-link">
                                        <label for="">đường dẫn tùy chỉnh</label>
                                        <div class="group-btn">
                                            <input type="text"  name="a_link" class="form-control" id="a_link_id" value="{{$menu[0]->link}}" placeholder="nhập đường dẫn vào đây...">
                                        </div>
                                    </div>
                                    @elseif($menu[0]->type=='category')
                                        <div class="form-group form-inline form-type-category">
                                            <label for="">chủ đề</label>
                                            <div class="pad">
                                                 <select name="a_category" id="a_category_id" class="form-control ">
                                                    @foreach($category as $cat)
                                                        <option @if($menu[0]->category==$cat->id) selected @endif value="{{$cat->id}}">{{$cat->title}}</option>
                                                    @endforeach
                                                 </select>
                                            </div>
                                         </div>
                                    @elseif($menu[0]->type=='article')
                                        <div class="form-group form-inline form-type-article">
                                            <label for="">bài viết</label>
                                            <div class="pad">
                                                <select name="a_article" id="a_article_id" class="form-control ">
                                                    @foreach($article as $art)
                                                        <option @if($menu[0]->article==$art->id) selected @endif value="{{$art->id}}">{{$art->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="">kích hoạt</label>
                                        <div class="pad opt_radio">
                                            <label for="a_status_off"><input type="radio" id="a_status_off" class="opt_off" name="a_status" value="0" @if($menu[0]->status==0) checked @endif>tắt</label>
                                            <label for="a_status_on"><input type="radio" id="a_status_on" class="opt_on" name="a_status" value="1" @if($menu[0]->status==1) checked @endif>bật</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary add-menu">cập nhật</button>
                                    <a class="btn btn-primary" href="{{url('/abcd')}}">hủy bỏ</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@stop
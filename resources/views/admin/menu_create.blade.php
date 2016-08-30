@extends('admin.home')
@section('title', 'thêm  menu mới')
@section('body')
 <section id="create_aricle">
        <div class="container">
            <div class="row">
                <div class="col-expand col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="block block-create block-menu">
                        <div class="block-cap">
                            <h2>tạo menu mới</h2>
                        </div>
                        @if(Session::has('notied'))
                            @if(Session::get('notied')=='ok')
                                <div class="i_tool bg-success" style="padding:5px; margin: 10px 0;background: #31bfa3;color:#fff;">Một menu đã được thêm vào</div>
                            @else
                                <div class="i_tool bg-danger" style="padding:5px; margin: 10px 0;background: #e74c3c;color:#fff;">Lỗi! Không thể tạo menu mới! Vui lòng kiểm tra lại</div>
                            @endif
                        @endif
                        <div class="block-content">
                            <div class="form-create form-field form-menu">
                                {!! 
                                Form::open([
                                    'method' => 'POST',
                                    'route' => ['menu.store'],
                                    'files' => true,
                                    'class' => '',
                                    'name' => 'a_form_create',
                                    'autocomplete' => 'off'
                                ]) 
                                !!}
                                    <div class="form-group form-title">
                                        <label for="">tên menu</label>
                                        <input type="text" name="a_title" class="form-control _txtT" id="a_title_id" placeholder="tên menu...">
                                    </div>
                                    <div class="form-group form-url">
                                        <label for="">segment of url</label>
                                        <div class="group-btn">
                                            <input type="text" name="a_url" class="form-control _txtTr _overlay" id="a_url_id" placeholder="segment hiển thị url (ten-chu-de)">
                                            <div class="getAlias" title="Refesh url title"><i class="fa fa-refresh"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="">menu cha</label>
                                        <div class="pad">
                                            <select name="a_parent" id="a_parent_id" class="form-control ">
                                                <option value="0">--Không có menu cha---</option>
                                                @foreach($menus as $mn)
                                                <option value="{{$mn->id}}">{{$mn->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-type">
                                        <label for="">thể loại menu</label>
                                        <div class="pad opt_radio">
                                            <label for="a_type_none"><input type="radio" id="a_type_none" name="a_type" checked="true" value="none">none</label>
                                            <label for="a_type_link"><input type="radio" id="a_type_link" name="a_type" value="link">link</label>
                                            <label for="a_type_category"><input type="radio" id="a_type_category" name="a_type" value="category">chủ đề</label>
                                            <label for="a_type_post"><input type="radio" id="a_type_post" name="a_type" value="post">bài viết</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">kích hoạt</label>
                                        <div class="pad opt_radio">
                                            <label for="a_status_off"><input type="radio" id="a_status_off" class="opt_off" name="a_status" value="0" checked="true">tắt</label>
                                            <label for="a_status_on"><input type="radio" id="a_status_on" class="opt_on" name="a_status" value="1">bật</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary add-menu">tạo mới</button>
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
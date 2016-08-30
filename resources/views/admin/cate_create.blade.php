@extends('admin.cate_index')
@section('title', 'chủ đề mới')
@section('body.category')
<div class="block block-create">
    <div class="block-cap">
        <h2>tạo chủ đề mới</h2>
    </div>
    @if(Session::has('notied'))
        @if(Session::get('notied')=='ok')
            <div class="i_tool bg-success" style="padding:5px; margin: 10px 0;background: #31bfa3;color:#fff;">Chủ đề đã được thêm vào</div>
        @else
            <div class="i_tool bg-danger" style="padding:5px; margin: 10px 0;background: #e74c3c;color:#fff;">Lỗi! Không thể tạo chủ đề mới! Vui lòng kiểm tra lại</div>
        @endif
    @endif
    <div class="block-content">
        <div class="form-create form-field form-category">
            {!! 
            Form::open([
                'method' => 'POST',
                'route' => ['category.store'],
                'files' => true,
                'class' => '',
                'name' => 'a_form_create',
                'autocomplete' => 'off'
            ]) 
            !!}
                <div class="form-group form-title">
                    <label for="">tiêu đề</label>
                    <input type="text" name="a_title" class="form-control _txtT" id="a_title_id" placeholder="tên chủ đề...">
                </div>
                <div class="form-group form-url">
                    <label for="">segment of url</label>
                    <div class="group-btn">
                        <input type="text" name="a_url" class="form-control _txtTr _overlay" id="a_url_id" placeholder="segment hiển thị url (ten-chu-de)">
                        <div class="getAlias" title="Refesh url title"><i class="fa fa-refresh"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">mô tả</label>
                    <textarea class="form-control" name="a_desc" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="">thumbnail</label>
                    <input type="file" name="a_thumbnail" class="form-control" id="a_thumbnail_id">
                </div>
                <div class="form-group">
                    <label for="">kích hoạt</label>
                    <div class="pad opt_radio">
                        <label for="a_status_off"><input type="radio" id="a_status_off" class="opt_off" name="a_status" value="0" checked="true">tắt</label>
                        <label for="a_status_on"><input type="radio" id="a_status_on" class="opt_on" name="a_status" value="1">bật</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary add-category">tạo mới</button>
                <a class="btn btn-primary" href="{{url('/abcd')}}">hủy bỏ</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
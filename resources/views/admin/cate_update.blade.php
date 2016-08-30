@extends('admin.cate_index')
@section('title', 'cập nhật chủ đề')
@section('body.category')
<div class="block block-create">
    <div class="block-cap">
        <h2>cập nhật chủ đề</h2>
    </div>
    @if(Session::has('notied'))
        @if(Session::get('notied')=='ok')
            <div class="i_tool bg-success" style="padding:5px; margin: 10px 0;background: #31bfa3;color:#fff;">Chủ đề đã được cập nhật</div>
        @else
            <div class="i_tool bg-danger" style="padding:5px; margin: 10px 0;background: #e74c3c;color:#fff;">Lỗi! Không thể cập nhật! Vui lòng kiểm tra lại</div>
        @endif
    @endif
    <div class="block-content">
        @if($category[0]->count() == 0)
            không có dữ liệu
        @else
            <div class="form-create form-field form-category form-update">
            {!! 
            Form::open([
                'method' => 'PUT',
                'route' => ['category.update', $category[0]->url, 'type'=>'category', 'fn'=>'edit', 'category'=>$category[0]->id],
                'files' => true,
                'class' => '',
                'name' => 'a_form_create',
                'autocomplete' => 'off'
            ]) 
            !!}
                <div class="form-group form-title">
                    <label for="">tiêu đề</label>
                    <input type="text" name="a_title" class="form-control _txtT" id="a_title_id" value="{{$category[0]->title}}" placeholder="tên chủ đề...">
                </div>
                <div class="form-group form-url">
                    <label for="">segment of url</label>
                    <div class="group-btn">
                        <input type="text" name="a_url" class="form-control _txtTr _overlay" id="a_url_id" value="{{$category[0]->url}}" placeholder="segment hiển thị url (ten-chu-de)">
                        <div class="getAlias" title="Refesh url title"><i class="fa fa-refresh"></i></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">mô tả</label>
                    <textarea class="form-control" name="a_desc" id="" cols="30" rows="5">{{$category[0]->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">thumbnail</label>
                    <input type="file" name="a_thumbnail" class="form-control" value="{{$category[0]->thumbnail}}" id="a_thumbnail_id">
                    <input type="hidden" name="a_h_thumbnail" value="{{$category[0]->thumbnail}}" class="">
                    <img src="{{Request::root().$category[0]->thumbnail}}" alt="{{$category[0]->title}}">
                </div>
                <div class="form-group">
                    <label for="">kích hoạt</label>
                    <div class="pad opt_radio">
                        <label for="a_status_off"><input type="radio" id="a_status_off" class="opt_off" name="a_status" value="0" @if($category[0]->status==0) checked @endif checked="true">tắt</label>
                        <label for="a_status_on"><input type="radio" id="a_status_on" class="opt_on" name="a_status" value="1" @if($category[0]->status==1) checked @endif>bật</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary add-category">cập nhật</button>
                <a class="btn btn-primary" href="{{url('/abcd')}}">hủy bỏ</a>
            {!! Form::close() !!}
        </div>
        @endif
        
    </div>
</div>
@stop
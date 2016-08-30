@extends('admin.home')
@section('title', 'viết bài mới')
@section('ojs', HTML::script('/lib/ckeditor/ckeditor.js'))
@section('ostyle', HTML::style('/css/abcxyz/ckeditor.css'))
@section('body')
    <section id="create_aricle">
        <div class="container">
            <div class="row">
                <div class="col-expand col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="block block-create">
                        <div class="block-cap">
                            <h2>tạo bài viết mới</h2>
                        </div>
                        @if(Session::has('notied'))
                            @if(Session::get('notied')=='ok')
                                <div class="i_tool bg-success" style="padding:5px; margin: 10px 0;background: #31bfa3;color:#fff;">bài viết đã được thêm vào</div>
                            @else
                                <div class="i_tool bg-danger" style="padding:5px; margin: 10px 0;background: #e74c3c;color:#fff;">Lỗi! Không thể tạo bài viết mới! Vui lòng kiểm tra lại</div>
                            @endif
                        @endif
                        <div class="block-content">
                            <div class="form-create form-field form-article">
                                {!! 
                                Form::open([
                                    'method' => 'POST',
                                    'route' => ['article.store'],
                                    'files' => true,
                                    'class' => '',
                                    'name' => 'a_form_create',
                                    'autocomplete' => 'off'
                                ]) 
                                !!}
                                    <div class="form-group form-title">
                                        <label for="">tiêu đề</label>
                                        <input type="text" name="a_title" class="form-control _txtT" id="a_title_id" placeholder="tiêu đề bài viết...">
                                    </div>
                                    <div class="form-group form-url">
                                        <label for="">segment of url</label>
                                        <div class="group-btn">
                                            <input type="text" name="a_url" class="form-control _txtTr _overlay" id="a_url_id" placeholder="segment hiển thị url (tieu-de-bai-viet)">
                                            <div class="getAlias" title="Refesh url title"><i class="fa fa-refresh"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="">chủ đề</label>
                                        <div class="pad">
                                            <select name="a_cate" id="a_cate_id" class="form-control ">
                                                @foreach($categories as $c)
                                                <option value="{{$c->id}}">{{$c->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-type">
                                        <label for="">thể loại bài viết</label>
                                        <div class="pad opt_radio">
                                            <label for="a_type_normal"><input type="radio" id="a_type_normal" name="a_type" checked="true" value="normal">thông thường</label>
                                            <label for="a_type_img"><input type="radio" id="a_type_img" name="a_type" value="image">hình ảnh</label>
                                            <label for="a_type_video"><input type="radio" id="a_type_video" name="a_type" value="video">video</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">mô tả</label>
                                        <textarea class="form-control" name="a_desc" id="" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">nội dung</label>
                                        <textarea name="a_content"class="form-control" id="a_content_id" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">thumbnail</label>
                                        <input type="file" name="a_thumbnail" class="form-control" id="a_thumbnail_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="">thẻ</label>
                                        <div class="a-tag">
                                            <div class="add-tag in-a-tag form-inline">
                                                <div class="add-wrap-tag">
                                                </div>
                                                <input type="text" class="form-control e-tag"  id="_e_tag">
                                                <input type="hidden" name="a_tag" id="a_tag_id" value="">
                                            </div>
                                            <div class="_finfor">mỗi tag cách nhau dấu phẩy</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">kích hoạt</label>
                                        <div class="pad opt_radio">
                                            <label for="a_status_off"><input type="radio" id="a_status_off" class="opt_off" name="a_status" value="0" checked="true">tắt</label>
                                            <label for="a_status_on"><input type="radio" id="a_status_on" class="opt_on" name="a_status" value="1">bật</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary add-article">tạo mới</button>
                                    <a class="btn btn-primary" href="{{url('/abcd')}}">hủy bỏ</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-collapse col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="block">
                        <div class="block-cap">
                            <h2>CHỦ ĐỀ</h2>
                        </div>
                        <div class="block-content ablock-list">
                            <ul>
                                @foreach($categories as $c)
                                    <li><a href="{{url('chu-de/'.$c->url)}}">{{$c->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'a_content_id', {
            language: 'vi',
            entities: false,
            htmlEncodeOutput: false,
            // stylesSet: window.location.host+'/css/abcxyz/ckeditor.css'
        });
    </script>
@stop
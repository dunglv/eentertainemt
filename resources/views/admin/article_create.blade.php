@extends('admin.home')
@section('title', 'viết bài mới')
@section('ojs', HTML::script('/lib/ckeditor/ckeditor.js'))
@section('body')
    <section id="create_aricle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="block block-create">
                        <div class="block-cap">
                            <h2>tạo bài viết mới</h2>
                        </div>
                        <div class="block-content">
                            <div class="form-create form-field">
                                <form action="" method="POST" role="form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="">tiêu đề</label>
                                        <input type="text" class="form-control" id="" placeholder="tiêu đề bài viết...">
                                    </div>
                                    <div class="form-group">
                                        <label for="">segment of url</label>
                                        <input type="text" class="form-control" id="" placeholder="segment hiển thị url (tieu-de-bai-viet)">
                                    </div>
                                    <div class="form-group form-inline">
                                        <label for="">chủ đề</label>
                                        <div class="pad">
                                            <select name="a_cate" id="" class="form-control ">
                                                <option value="1">phim hoạt hình</option>
                                                <option value="2">phim trung quốc</option>
                                                <option value="3">truyện cười</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">thể loại bài viết</label>
                                        <div class="pad opt_radio">
                                            <label for="a_type_normal"><input type="radio" id="a_type_normal" name="a_type" checked="true">thông thường</label>
                                            <label for="a_type_img"><input type="radio" id="a_type_img" name="a_type">hình ảnh</label>
                                            <label for="a_type_video"><input type="radio" id="a_type_video" name="a_type">video</label>
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
                                        <input type="file" class="form-control" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">thẻ</label>
                                        <div class="a-tag">
                                            <div class="in-a-tag form-inline ">
                                                <span>tag 2</span>
                                                <span>tag 1</span>
                                                <span>tag 3</span>
                                                <input type="text" class="form-control" id="a_tag_field">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">kích hoạt</label>
                                        <div class="pad opt_radio">
                                            <label for="a_status_on"><input type="radio" id="a_status_on" class="opt_on" name="a_status" checked="true">bật</label>
                                            <label for="a_status_off"><input type="radio" id="a_status_off" class="opt_off" name="a_status">tắt</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">tạo mới</button>
                                    <button type="reset" class="btn btn-primary">hủy bỏ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <span class="collapse-sidebar" title="collapse sidebar"><i class="fa fa-chevron-right"></i></span>
                    <div class="block">
                        <div class="block-cap">
                            <h2>CHỦ ĐỀ</h2>
                        </div>
                        <div class="block-content ablock-list">
                            <ul>
                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
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
        CKEDITOR.replace( 'a_content_id' );
    </script>
@stop
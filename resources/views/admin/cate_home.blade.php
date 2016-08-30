@extends('admin.cate_index')
@section('body.category')
<div class="block">
    <div class="block-cap">
        <h2>CÁC CHỦ ĐỀ</h2>
    </div>
    <div class="block-content">
        @if($categories->count()==0)
            chưa có chủ đề nào
        @else
            @foreach($categories as $cate)
                <div id="a_item_{{$cate->id}}" type='category' class="aitem aitem_{{$cate->id}}">
                    <div class="aitem-wrapper">
                        <div class="athumb">
                            {!!HTML::image($cate->thumbnail, $cate->title)!!}
                        </div>
                        <div class="acontent">
                            <div class="atit">
                                <h3><a href="{{route('front.detail_category', $cate->url)}}">{{$cate->title}}</a></h3>
                            </div>
                            <div class="adesc">
                                {{$cate->description}}
                            </div>
                            <div class="astatis">
                                <span><i class="fa fa-eye"></i>10</span>
                                <span><i class="fa fa-file-text"></i>10</span>
                                <span><i class="fa fa-thumbs-o-down"></i>10</span>
                            </div>
                        </div>
                    </div>
                    <!-- end aitem wrapper-->
                    <div class="aop aoption">
                        <span id="a_bt_exp_{{$cate->id}}" class="bt_exp"><i class="fa fa-chevron-down"></i></span>
                        <ul class="_exp_dropdown">
                            <li data-id="a_del_{{$cate->id}}" class="a_del"><a href="#">Xóa</a></li>
                            <li><a href="{{route('category.edit', [$cate->url,'type'=>'category','fn'=>'edit','category'=>$cate->id])}}">Chỉnh sửa</a></li>
                            <li><a href="#">Disable</a></li>
                        </ul>
                    </div>
                </div>
                <!-- emd item -->
            @endforeach
        @endif
        
    </div>
</div>
@stop
@extends('admin.home')
@section('title', 'Chủ đề')
@section('body')
    <section id="category_home">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    @yield('body.category')
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="block ablock-list">
                        <div class="block-cap">
                            <h2>CÁC CHỦ ĐỀ</h2>
                        </div>
                        <div class="block-content">
                            <ul>
                                <li>
                                    <p>Tổng số chủ đề</p>
                                    <p class="txtfollow">120</p>
                                </li>
                                <li>
                                    <p>Tổng số chủ đề hoạt động</p>
                                    <p class="txtfollow">10</p>
                                </li>
                                <li>
                                    <p>Chủ đề tạm ngừng</p>
                                    <p class="txtfollow">10</p>
                                </li>
                                <li>
                                    <p>Chủ đề nhiều lượt xem nhất</p>
                                    <p class="txtfollow">chủ đề 1</p>
                                </li>
                                <li>
                                    <p>Chủ đề nhiều mới tạo</p>
                                    <p class="txtfollow">chủ đề 10</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
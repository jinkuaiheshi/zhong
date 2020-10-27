@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    我的佣金

                </div>
                <div class="nav_nav">
                    <a href="{{url()->previous()}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="background:#f9f9f9; height:auto;overflow: hidden; margin-bottom: 50px;">
        @foreach( $data as $v)
            <div class="title_item" style="height: auto; overflow: hidden; margin-top: 15px;">


                <div class="title_item_title">
                    名称: {{$v->name}}
                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        订单:{{$v->order}}
                    </div>

                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        购买人:{{$v->uid}}
                    </div>

                </div>
                <div class="title_item_info">
                    
                    <div class="title_item_info_right" style="font-size: 14px;font-weight: 700;color:#f96c02 ">
                        佣金{{$v->yongjin}} 元
                    </div>
                </div>

            </div>

        @endforeach


    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop

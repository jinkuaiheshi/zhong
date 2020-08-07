@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    我的算力

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
                    名称: <p style="font-size: 14px;">{{$v->name}}</p>
                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        算力:{{$v->Product->computerPower}}
                    </div>

                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        数量:<span >{{$v->num}}</span>
                    </div>

                </div>

            </div>

        @endforeach
            <div class="title_item_info">
                <div class="title_item_info_left" style="text-align: right">
                    总算力:  <span class="red">{{$suan}}TH/s</span>
                </div>

            </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop
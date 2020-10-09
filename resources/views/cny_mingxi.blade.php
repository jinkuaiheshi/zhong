@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    CNY明细

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

        @foreach( $tibi as $v)
            <div class="title_item" style="height: auto; overflow: hidden; margin-top: 15px;">


                <div class="title_item_title">
                    提币地址: {{$v->url}}
                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        提币数量:{{$v->num}}
                    </div>

                </div>

                <div class="title_item_info">
                    <div class="title_item_info_left">
                        生效时间:{{$v->shenhe_time}}
                    </div>
                    <div class="title_item_info_right red" style="font-size: 14px;font-weight: 700; ">
                        总提币{{$v->num}} CNY
                    </div>
                </div>

            </div>

        @endforeach
            @foreach( $huazhuan as $v)
                <div class="title_item" style="height: auto; overflow: hidden; margin-top: 15px;">


                    <div class="title_item_title">
                        当时币价: {{$v->bijia}}
                    </div>
                    <div class="title_item_info">
                        <div class="title_item_info_left">
                            划转数量:{{$v->num}}
                        </div>

                    </div>

                    <div class="title_item_info">
                        <div class="title_item_info_left">
                            生效时间:{{$v->shenhe_time}}
                        </div>
                        <div class="title_item_info_right red" style="font-size: 14px;font-weight: 700; ">
                            总划转{{$v->num}} BTC
                        </div>
                    </div>

                </div>

            @endforeach
            @foreach( $data as $v)
                <div class="title_item" style="height: auto; overflow: hidden; margin-top: 15px;">


                    <div class="title_item_title">
                        名称: {{$v['name']}}
                    </div>
                    <div class="title_item_info">
                        <div class="title_item_info_left">
                            订单:{{$v['code']}}
                        </div>

                    </div>
                    <div class="title_item_info">
                        <div class="title_item_info_left">
                            金额:<span style="color: #f96c02">{{$v['TotalPrice']}}</span>
                        </div>

                    </div>
                    <div class="title_item_info">
                        <div class="title_item_info_left">
                            生效时间:{{$v['force_time']}}
                        </div>
                        <div class="title_item_info_right" style="font-size: 14px;font-weight: 700;color:#f96c02 ">
                            总收益{{$v['shouyi']}} CNY
                        </div>
                    </div>

                </div>

            @endforeach

    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop

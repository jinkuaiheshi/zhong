@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    我的团队

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
                    用户名: <span style="font-size: 14px;">{{$v['username']}}</span>
                </div>

                <div class="title_item_info">
                    <div class="title_item_info_left">
                        会员等级:<span style="color: #f96c02">@if($v['level']==1)青铜会员@elseif($v['level']==2)白银会员@elseif($v['level']==3)黄金会员@elseif($v['level']==4)铂金会员@elseif($v['level']==5)钻石会员@endif</span>
                    </div>

                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        手机号:{{$v['tel']}}
                    </div>
                    <div class="title_item_info_right success " style="font-size: 14px;font-weight: 700;">
                        @if($v['auth'] == 3)个人代理@elseif($v['auth'] == 7) 省代理@elseif($v['auth'] == 8) 市代理@elseif($v['auth'] == 9) 县代理 @endif
                    </div>
                </div>

            </div>

        @endforeach
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop

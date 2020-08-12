@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    扫码支付
                </div>
                <div class="nav_nav">
                    <a href="{{url('index')}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


        <div class="bg-success weiixn">使用微信扫一扫进行付款</div>
        <div class="saoma">
            <img src="{{asset('resources/assets/images/saoma.jpg')}}" class="wid100" />
        </div>
        <div class="bg-success weiixn">使用支付宝扫一扫进行付款</div>
        <div class="saoma">
            <img src="{{asset('resources/assets/images/saoma.jpg')}}" class="wid100" />
        </div>
        <div class="bg-success weiixn">汇款详细信息</div>
        <div class="huikuan">
            <p>卡号</p>
            <p>开户行</p>
            <p>持卡人</p>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>




@stop

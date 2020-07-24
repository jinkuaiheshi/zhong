@extends('header')

@section('content')
<div class="container">

    <div class="row">

            <div class="carousel slide" id="carousel-example-generic" data-ride="carousel" data-interval="1500">

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{asset('resources/assets/images/slide.png')}}">
                    </div>
                    <div class="item">
                        <img src="{{asset('resources/assets/images/slide11.png')}}">
                    </div>
                    <div class="item">
                        <img src="{{asset('resources/assets/images/slide22.png')}}">
                    </div>

                </div>

            </div>
    </div>
</div>
<div class="container" >
    <div class="short_wrapper">
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/libao.png')}}" alt="">
            <p>新手礼包</p>
        </div>
    </div>
</div>
<div class="line"></div>
<div class="container vip_container" >
    <div class="title-wrapper">

        <h2>
                <i class="glyphicon glyphicon-star"></i>&nbsp;新人专享-每人限购一次
        </h2>
        <p>
            <a href="{{url('index')}}" class="none" style="display: inline-block"> <span style="color: rgb(255, 59, 48);">新人五重礼</span>
            <i class="glyphicon glyphicon-chevron-right color999"></i>
            </a>
        </p>

    </div>
    <div class="vip_item">
        <div class="title">
            <h2>S17Pro算力丰水版<span>3年期</span></h2>
            <p>预计年收益回报比</p>
        </div>
        <div class="info">
          <div class="top">
            <p>25.21%<span>~78%</span></p>
          </div>
            <div class="btm">
                <span class="vag">新手专享福利</span>
                <span class="vag" style="margin-left: 5px;" >10元可投</span>
                <span class="vag" style="margin-left: 5px;">限购一次</span>
            </div>
        </div>
        <div classs="btm_wapper">
            <button class="btm_wapper_btn">10元尝鲜</button>
        </div>
    </div>
</div>
<div class="line"></div>
<div class="container vip_container" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>&nbsp;全网首发，抢File头框红利
        </h2>
    </div>
    <div class="info_item">
        <div class="info_item_top">
            <div class="float-mark">
                <span>实际合约</span>
            </div>
            <div class="info_item_top_img">
                <img src="{{asset('resources/assets/images/pdu.png')}}" />
            </div>
            <div class="info_item_top_info">
                <p>熊猫IPFS基金头矿一号</p>
                <div class="info_item_top_info_attr">
                    <span class="vag">限量1000T</span>
                    <span class="vag" style="margin-left: 5px;" >单T起购</span>
                </div>
                <div class="info_item_top_info_des">
                    <p>
                        参与400万FIL
                    </p>
                </div>
                <div class="info_item_top_info_des">
                    <p>
                        测试奖励
                    </p>
                </div>
            </div>
        </div>
        <div class="info_item_mid">
            <div class="info_item_mid_item">
                <div class="left_info_item">
                    <img src="{{asset('resources/assets/images/suan.png')}}" />
                </div>
                <div class="right_info_item">
                    <P>算力售价</P>
                    <P>￥1520/T</P>
                </div>
            </div>
            <div class="info_item_mid_item">
                <div class="left_info_item">
                    <img src="{{asset('resources/assets/images/suan.png')}}" />
                </div>
                <div class="right_info_item">
                    <P>算力售价</P>
                    <P>￥1520/T</P>
                </div>
            </div>
            <div class="info_item_mid_item">
                <div class="left_info_item">
                    <img src="{{asset('resources/assets/images/suan.png')}}" />
                </div>
                <div class="right_info_item">
                    <P>算力售价</P>
                    <P>￥1520/T</P>
                </div>
            </div>
        </div>
        <div classs="btm_wapper" style="margin-top: 20px;">
            <button class="btm_wapper_btn">立即购买</button>
        </div>
    </div>
</div>
<div class="line"></div>
    <div class="container vip_container" >
        <div class="title-wrapper">

            <h2>
                <i class="glyphicon glyphicon-star"></i>&nbsp;创新合约
            </h2>
            <p>
                 <span style="font-size: 16px;">ETH</span>
            </p>

        </div>
        @foreach($zhengji as $v)
        <div class="title_item">
            <div class="float-mark">
                <span>实际合约</span>
            </div>
            <div class="title_item_title">
                <p>{{$v->name}}</p><span class="vag" style="height: 20px;">{{$v->tagOne}}</span><span class="vag" style="height: 20px;margin-left: 5px;">{{$v->tagTwo}}</span>
            </div>
            <div class="title_item_info">
                <div class="title_item_info_left">
                    单台售价￥{{$v->price}}
                </div>
                <div class="title_item_info_right">
{{--                    单份日产币--}}
                </div>
            </div>
            <div class="title_item_info">
                <div class="title_item_info_left">
                    产品回报率
                </div>
                <div class="title_item_info_right" style="font-size: 20px;font-weight: 700;color: #f96c02;">
                    @if($v->attr == 1)24%=1260元/份
                    @elseif($v->attr == 2)25.2%=2646元/份
                    @elseif($v->attr == 3)26.4%=5544元/份
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="line"></div>

<div class="container vip_container" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>&nbsp;浮动合约
        </h2>
        <p>
            <span style="font-size: 16px;">BTC</span>
        </p>

    </div>
    <div class="float_item">
        <div class="float-mark" style="width: 50px;text-indent: 5px;">
            <span >VIP版</span>
        </div>
        <div class="float_item_title" >
            <div class="float_item_title_left">
                <p>S19Pro算力丰水版</p><span class="vag">3年期</span>
            </div>
            <div class="float_item_title_right">
                <p>预计年收益回报比</p>
            </div>
        </div>
        <div class="float_item_info">
            <div class="float_item_info_left">
                <p>1000元起投 6月生效</p>
            </div>
            <div class="float_item_info_right">
                <p>30.35%</p><span>~66%</span>
            </div>
        </div>
    </div>
    <div class="float_item">
        <div class="float-mark" style="width: 50px;text-indent: 5px;">
            <span >VIP版</span>
        </div>
        <div class="float_item_title" >
            <div class="float_item_title_left">
                <p>S19Pro算力丰水版</p><span class="vag">3年期</span>
            </div>
            <div class="float_item_title_right">
                <p>预计年收益回报比</p>
            </div>
        </div>
        <div class="float_item_info">
            <div class="float_item_info_left">
                <p>1000元起投 6月生效</p>
            </div>
            <div class="float_item_info_right">
                <p>30.35%</p><span>~66%</span>
            </div>
        </div>
    </div>
    <div class="float_item">
        <div class="float-mark" style="width: 50px;text-indent: 5px;">
            <span >VIP版</span>
        </div>
        <div class="float_item_title" >
            <div class="float_item_title_left">
                <p>S19Pro算力丰水版</p><span class="vag">3年期</span>
            </div>
            <div class="float_item_title_right">
                <p>预计年收益回报比</p>
            </div>
        </div>
        <div class="float_item_info">
            <div class="float_item_info_left">
                <p>1000元起投 6月生效</p>
            </div>
            <div class="float_item_info_right">
                <p>30.35%</p><span>~66%</span>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>
<div class="container vip_container" style="padding-bottom: 15px" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>&nbsp;保本合约
        </h2>
    </div>
    <div class="new_item">
        <div class="new_item_pro">
            <p>BTC保本合约-02</p>
            <div class="float-mark" style="width: 50px;text-indent: 5px;">
                <span >升级版</span>
            </div>
            <p><span class="vag" style="margin-right: 4px;">2年期</span>可返90%本金</p>
            <p>最高收益回报比</p>
            <p>220%</p>
        </div>
        <div class="new_item_pro">
            <p>BTC保本合约-02</p>
            <div class="float-mark" style="width: 50px;text-indent: 5px;">
                <span >升级版</span>
            </div>
            <p><span class="vag" style="margin-right: 4px;">2年期</span>可返90%本金</p>
            <p>最高收益回报比</p>
            <p>220%</p>
        </div>
    </div>
</div>
<div class="line"></div>
<div class="container vip_container" style="padding-bottom: 15px" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>&nbsp;矿场投资
        </h2>
    </div>
    <div class="invest_item">
        <div class="float-mark" style="width: 70px;text-indent: 5px;">
            <span >准东矿场</span>
        </div>
        <div class="invest_item_title" style="margin-top: 10px;">
            <p>准东矿场机位投资<span class="vag" style="font-weight: normal;margin-left: 5px;">3年期</span><span class="vag" style="font-weight: normal;margin-left: 5px;">最高年化25%</span></p>
        </div>
        <div class="invest_item_info">
            <div class="invest_item_info_left">
                <p>900元起投</p>
            </div>
            <div class="invest_item_info_right">
                <p>预计年收益回报比</p>
            </div>
        </div>
        <div class="invest_item_info">
            <div class="invest_item_info_left">
                <p>收益稳定</p>
            </div>
            <div class="invest_item_info_right">
                <p style="color: rgb(205, 146, 83);
    font-size: 18px;">31.4%~75.2%</p>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>
<div class="container" style="margin-bottom: 70px">
    <div class="us_item">
        <div class="us_item_title">
            <span>平台保障</span>
            <i class="glyphicon glyphicon-chevron-right color999"></i>
        </div>
    </div>
    <div class="safe_item">
        <div class="safe_item_info">
            牛比特成立于2014年10月，凭借着深厚的挖矿经验、极具竞争力的电费优势和迅速积累的规模效应，持续稳定的运营。牛比特一直是全球领先的顶级云算力平台。
        </div>
        <div class="safe_item_info2">
            安全运行时间(天)
        </div>
        <div class="day_item">
            <p>{{$day[0]}}</p>
            <p>{{$day[1]}}</p>
            <p>{{$day[2]}}</p>
            <p>{{$day[3]}}</p>
{{--            <p>2</p>--}}
{{--            <p>2</p>--}}
{{--            <p>2</p>--}}
        </div>
        <div class="reduce_item">
            <div class="lit_item">
                <p>累计发放收益</p>
                <p>30580.62BTC</p>
            </div>
            <div class="lit_item"><p>累计累计注册用户</p>
                <p>989898</p></div>

        </div>
    </div>
</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
@stop
@extends('header')

@section('content')
<div class="container">

    <div class="row">

            <div class="swiper-container">

                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <img src="{{asset('resources/assets/images/slide11.jpg')}}" class="wid100">
                    </div>
                    <div class="swiper-slide ">
                        <img src="{{asset('resources/assets/images/slide22.jpg')}}" class="wid100">
                    </div>

                </div>

            </div>
    </div>
</div>
<script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        autoplay:true,//等同于以下设置
        /*autoplay: {
          delay: 3000,
          stopOnLastSlide: false,
          disableOnInteraction: true,
          },*/
    });
</script>
<div class="container" >
    <div class="short_wrapper">
        <div class="item">
            <a href="{{url('zhinan')}}" style="width: 100%;text-align: center">
                <img src="{{asset('resources/assets/images/index1.png')}}" alt="">
                <p>新手指南</p>
            </a>

        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/index2.png')}}" alt="">
            <p>新人专享</p>
        </div>
        <div class="item">
            <a href="{{url('shipin')}}" style="width: 100%;text-align: center">
                <img src="{{asset('resources/assets/images/index3.png')}}" alt="">
                <p>矿场视频</p>
            </a>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/index4.png')}}" alt="">
            <p>帮助中心</p>
        </div>
        <div class="item">
            <img src="{{asset('resources/assets/images/index5.png')}}" alt="">
            <p>客服中心</p>
        </div>
    </div>
</div>
<div class="container" style="margin-bottom: 10px;" >
    <a href="{{url('invite')}}" style="width: 100%;text-align: center">
    <img src="{{asset('resources/assets/images/yq.jpg')}}" class="wid100"/>
    </a>
</div>

<div class="line"></div>
<div class="container vip_container" >
    <div class="title-wrapper">

        <h2>
                <i class="glyphicon glyphicon-star"></i>&nbsp;新人专享-每人限购一次
        </h2>
    </div>

    <div class="vip_item">
        <div class="title">
            <h2>{{$xinren->name}}<span>{{$xinren->tagOne}}</span><span>{{$xinren->tagTwo}}</span></h2>
            <p>每月享受矿机分红</p>
        </div>
        <div class="info">
          <div class="top">
            <p>100元</p>
          </div>
            <div class="btm">
                <span class="vag">新手专享福利</span>
                <span class="vag" style="margin-left: 5px;" >5000元可投</span>
                <span class="vag" style="margin-left: 5px;">限购一次</span>
            </div>
        </div>
        <div classs="btm_wapper">
            <a href="{{url('product/info/').'/'.$xinren->id}}"><button class="btm_wapper_btn">{{$xinren->price}}元尝鲜</button> </a>
        </div>
    </div>

</div>
<div class="line"></div>
<div class="container vip_container" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>全网首发，一台矿机免费矿场行
        </h2>
    </div>

    <div class="info_item">
        <div class="info_item_top">
            <div class="float-mark">
                <span>实际合约</span>
            </div>
            <div class="info_item_top_img">
                <img src="{{asset('resources/assets/images/ppp.png')}}" />
            </div>
            <div class="info_item_top_info">
                <p>{{$special->name}}</p>
                <div class="info_item_top_info_attr">
                    <span class="vag">{{$special->tagOne}}</span>
                    <span class="vag" style="margin-left: 5px;" >{{$special->tagTwo}}</span>
                </div>
                <div class="info_item_top_info_des">
                    <p>
                        四川三天两夜
                    </p>
                </div>
                <div class="info_item_top_info_des">
                    <p>
                        总部矿场行
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
                    <P>单台售价</P>
                    <P>￥21000</P>
                </div>
            </div>
            <div class="info_item_mid_item">
                <div class="left_info_item">
                    <img src="{{asset('resources/assets/images/suan.png')}}" />
                </div>
                <div class="right_info_item">
                    <P>回报率</P>
                    <P>26.4%</P>
                </div>
            </div>
            <div class="info_item_mid_item">
                <div class="left_info_item">
                    <img src="{{asset('resources/assets/images/suan.png')}}" />
                </div>
                <div class="right_info_item">
                    <P>免电费</P>
                    <P>管理费</P>
                </div>
            </div>
        </div>
        <div classs="btm_wapper" style="margin-top: 20px;">
            <a href="{{url('product/info/').'/'.$special->id}}"><button class="btm_wapper_btn">立即购买</button></a>
        </div>
    </div>

</div>
<div class="line"></div>
    <div class="container vip_container" >
        <div class="title-wrapper">

            <h2>
                <i class="glyphicon glyphicon-star"></i>&nbsp;整机购买
            </h2>


        </div>
        @foreach($zhengji as $v)
        <div class="title_item">
            <a href="{{url('/product/info/').'/'.$v->id}}" style="display: inline-block; text-decoration: none; width: 100%">
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

            </div>


            <div class="title_item_info">
                <div class="title_item_info_left">
                    回报率
                </div>
                <div class="title_item_info_right" style="font-size: 20px;font-weight: 700;color: #f96c02;">
                    @if($v->attr == 1)24%
                    @elseif($v->attr == 2)25.2%
                    @elseif($v->attr == 3)26.4%
                    @endif
                </div>
            </div>
            </a>
        </div>
        @endforeach

    </div>

    <div class="line"></div>

<div class="container vip_container" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>&nbsp;众筹购机
        </h2>


    </div>
    @foreach($zhongchou as $v)
    <div class="float_item">
        <a href="{{url('product/info/').'/'.$v->id}}">
            <div class="float-mark" >
                <span >实际合约</span>
            </div>
            <div class="float_item_title" >
                <div class="float_item_title_left">
                    <p>{{$v->name}}</p><br/>
                    <span class="vag" style="height: 20px;">{{$v->tagOne}}</span><span class="vag" style="height: 20px;margin-left: 5px;">{{$v->tagTwo}}</span>
                </div>

                <div class="float_item_title_right">
                    <p>回报率</p>
                </div>
            </div>
            <div class="float_item_info">
                <div class="float_item_info_left">
                    <p>{{$v->price}}元起投</p>
                </div>
                <div class="float_item_info_right">
                    <p> @if($v->attr == 1)18%
                        @elseif($v->attr == 2)21.6%
                        @elseif($v->attr == 3)24%
                        @endif</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach


</div>
<div class="line"></div>
<div class="container vip_container" style="padding-bottom: 15px" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>&nbsp;云算力合约
        </h2>
    </div>
    <div class="new_item">
        @foreach($suanli as $v)

                <div class="new_item_pro">
                    <a href="{{url('product/info/').'/'.$v->id}}">
                        <p>{{$v->name}}</p>
                        <div class="float-mark" style="width: 50px;text-indent: 5px;">
                            <span >升级版</span>
                        </div>
                        <p><span class="vag" style="margin-right: 4px;">{{$v->tagOne}}</span><span class="vag" style="margin-right: 4px;">{{$v->tagTwo}}</span></p>
                        <p>回报率</p>
                        <p>@if($v->cloud == 1)23%-64%
                            @elseif($v->cloud == 2)10%-96%
                            @endif</p>
                    </a>
                </div>

        @endforeach

    </div>
</div>
<div class="line"></div>
<div class="container vip_container" style="padding-bottom: 15px" >
    <div class="title-wrapper">

        <h2>
            <i class="glyphicon glyphicon-star"></i>矿机托管
        </h2>
    </div>
    @foreach($tuoguan as $v)
    <div class="invest_item" style="margin-bottom: 20px">
        <a href="{{url('product/info/').'/'.$v->id}}">
            <div class="float-mark" style="width: 70px;text-indent: 5px;">
                <span > @if($v->id ==18) BTC矿机 @else ETH矿机 @endif</span>
            </div>
            <div class="invest_item_title" style="margin-top: 10px;">
                <p>{{$v->name}}<span class="vag" style="font-weight: normal;margin-left: 5px;">{{$v->tagOne}}</span><span class="vag" style="font-weight: normal;margin-left: 5px;">{{$v->tagTwo}}</span></p>
            </div>
            <div class="invest_item_info">
                <div class="invest_item_info_left">
                    <p>低价电费、管理费</p>
                </div>
                <div class="invest_item_info_right">
                    <p>回报率</p>
                </div>
            </div>
            <div class="invest_item_info">
                <div class="invest_item_info_left">
                    <p>专业技术团队24小时监管</p>
                </div>
                <div class="invest_item_info_right">
                    <p style="color: rgb(205, 146, 83);
        font-size: 18px;">@if($v->id == 18)12%—181%
                        @elseif($v->id == 19)39%—231%
                        @endif</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach

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
            中外矿业成立于2018年7月，凭借着深厚的挖矿经验、极具竞争力的电费优势和迅速积累的规模效应，持续稳定的运营。中外矿业一直是全球领先的矿场平台。
        </div>
        <div class="safe_item_info2">
            安全运行时间(天)
        </div>
        <div class="day_item">
            <p>{{$day[0]}}</p>
            <p>{{$day[1]}}</p>
            <p>{{$day[2]}}</p>
{{--            <p>{{$day[3]}}</p>--}}
{{--            <p>2</p>--}}
{{--            <p>2</p>--}}
{{--            <p>2</p>--}}
        </div>
        <div class="reduce_item">
            <div class="lit_item">
                <p>累计发放收益</p>
                <p>{{Session::get('btc')}}BTC</p>
            </div>
            <div class="lit_item"><p>累计累计注册用户</p>
                <p>28976</p></div>

        </div>
    </div>
</div>


@stop
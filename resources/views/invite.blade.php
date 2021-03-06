@extends('pay')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    邀请返佣
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

    <div class="aui_content" >
        <div class="aui-tab nav_tab" id="tab">
            <div class="aui_item" data-toggle="tab" href="#tab1">
                <img src="{{asset('resources/assets/images/qing.png')}}" />
                <p>青铜会员</p>
            </div>
            <div class="aui_item" data-toggle="tab" href="#tab2">
                <img src="{{asset('resources/assets/images/bai.png')}}" />
                <p>白银会员</p>
            </div>
            <div class="aui_item" data-toggle="tab" href="#tab3">
                <img src="{{asset('resources/assets/images/huang.png')}}" />
                <p>黄金会员</p>
            </div>
            <div class="aui_item" data-toggle="tab" href="#tab4">
                <img src="{{asset('resources/assets/images/bo.png')}}" />
                <p>铂金会员</p>
            </div>
            <div class="aui_item" data-toggle="tab" href="#tab5">
                <img src="{{asset('resources/assets/images/zuan.png')}}" />
                <p>钻石会员</p>
            </div>
        </div>
        <div class="tab-content">
            <div class="aui-content tab1 tab-pane  @if($flag == 1) active @endif" id="tab1">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/qing.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">青铜会员</p>
                            <p class="aui-font-size-14">无返佣权益</p>
                        </div>
                        @if($flag == 1)
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                            @endif
                    </div>
                    @if($flag == 1)

                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【青铜会员】</p>
                        <p class="aui-padded-5">距离升级白银会员不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
                @endif
                    <div class="progress_box">
                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">自购算力</p>
                                <p class="aui-text-default">{{$zigou_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">推荐算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">总算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli+$zigou_suanli}}T<span class="color_9">(目标：≥0T)</span></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="aui-content tab2 tab-pane  @if($flag == 2) active @endif" id="tab2">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/bai.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">白银会员</p>
                            <p class="aui-font-size-14">权益收益0.2%</p>
                        </div>
                        @if($flag == 2)
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                            @endif
                    </div>
                    @if($flag == 2)
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【白银会员】</p>
                        <p class="aui-padded-5">距离升级黄金会员不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
                    @endif
                    <div class="progress_box">
                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(0deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">自购算力</p>
                                <p class="aui-text-default">{{$zigou_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">推荐算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">总算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli+$zigou_suanli}}T<span class="color_9">(目标：110T)</span></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="aui-content tab3 tab-pane  @if($flag == 3) active @endif" id="tab3">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/huang.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">黄金会员</p>
                            <p class="aui-font-size-14">权益收益0.3%</p>
                        </div>
                        @if($flag == 3)
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                            @endif
                    </div>
                    @if($flag == 3)
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【黄金会员】</p>
                        <p class="aui-padded-5">距离升级铂金会员不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
                    @endif
                    <div class="progress_box">
                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">自购算力</p>
                                <p class="aui-text-default">{{$zigou_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">推荐算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">总算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli+$zigou_suanli}}人<span class="color_9">(目标：550T)</span></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="aui-content tab4 tab-pane  @if($flag == 4) active @endif" id="tab4">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/bo.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">铂金会员</p>
                            <p class="aui-font-size-14">权益收益0.4%</p>
                        </div>
                        @if($flag == 4)
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                            @endif
                    </div>
                    @if($flag == 4)
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【铂金会员】</p>
                        <p class="aui-padded-5">距离升级钻石会员不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
                    @endif
                    <div class="progress_box">
                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">自购算力</p>
                                <p class="aui-text-default">{{$zigou_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">推荐算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">总算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli+$zigou_suanli}}T<span class="color_9">(目标：1650T)</span></p>
                            </div>
                        </div>


                </div>
            </div>
        </div>
            <div class="aui-content tab4 tab-pane  @if($flag == 5) active @endif" id="tab5">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/zuan.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">钻石会员</p>
                            <p class="aui-font-size-14">权益收益0.5%</p>
                        </div>
                        @if($flag == 5)
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                            @endif
                    </div>
                    @if($flag == 5)
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【钻石会员】</p>

                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
                    @endif
                    <div class="progress_box">
                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">自购算力</p>
                                <p class="aui-text-default">{{$zigou_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">推荐算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli}}T</p>
                            </div>
                        </div>

                        <div class="aui-row aui-margin-b-5">
                            <div class="aui-col-xs-2">
                                <div class="wrap_content">
                                    <div class="wrap">
                                        <!--大于180，则class=clip-auto circle，否则：circle-->
                                        <div class="clip-auto circle ">
                                            <!--度数为：当前进度*3.6-->
                                            <div class="percent left" style="-webkit-transform:rotate(360deg);"></div>
                                            <!--大于180，则class=percent right，否则为percent right wth0-->
                                            <div class=" percent right"></div>
                                        </div>
                                        <div class="num">
                                            <span>100</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aui-col-xs-10 ">
                                <p class="aui-text-default">总算力</p>
                                <p class="aui-text-default">{{$tuijian_suanli+$zigou_suanli}}<span class="color_9">(目标：≥5500T)</span></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
    </div>
    <footer class="aui-bar aui-bar-tab"  style="position: fixed;">
        <div class="aui-card-list aui-margin-b-0">
            <div class="aui-card-list-footer">
                <a class="aui-btn aui-btn-info aui-pull-left" href="{{url('share')}}" style="color: #333">
                    邀请好友
                </a>
                <a class="aui-btn aui-btn-info aui-pull-right" href="{{url('index')}}" style="color: #333">
                    立即购买
                </a>
            </div>
        </div>

    </footer>

@stop
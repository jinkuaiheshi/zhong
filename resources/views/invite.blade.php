@extends('header')

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

    <div class="aui_content">
        <div class="aui-tab nav_tab" id="tab">
            <div class="aui_item" data-toggle="tab" href="#tab1">
                <img src="{{asset('resources/assets/images/inv1.png')}}" />
                <p>普通小兵</p>
            </div>
            <div class="aui_item" data-toggle="tab" href="#tab2">
                <img src="{{asset('resources/assets/images/inv1.png')}}" />
                <p>优秀班长</p>
            </div>
            <div class="aui_item" data-toggle="tab" href="#tab3">
                <img src="{{asset('resources/assets/images/inv1.png')}}" />
                <p>优秀排长</p>
            </div>
            <div class="aui_item" data-toggle="tab" href="#tab4">
                <img src="{{asset('resources/assets/images/inv1.png')}}" />
                <p>优秀团长</p>
            </div>
        </div>
        <div class="tab-content">
            <div class="aui-content tab1 tab-pane active" id="tab1">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/inv1.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">lv1<span class="aui-padded-l-5">普通小兵</span></p>
                            <p class="aui-font-size-14">无返佣权益</p>
                        </div>
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                    </div>
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【普通小兵】</p>
                        <p class="aui-padded-5">距离升级优秀班长不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
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
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推销算力</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推荐实名注册用户</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">下级产生购买人数</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-content tab2 tab-pane" id="tab2">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/inv1.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">lv1<span class="aui-padded-l-5">普通小兵</span></p>
                            <p class="aui-font-size-14">无返佣权益</p>
                        </div>
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                    </div>
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【优秀班长】</p>
                        <p class="aui-padded-5">距离升级优秀班长不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
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
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推销算力</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推荐实名注册用户</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">下级产生购买人数</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-content tab3 tab-pane" id="tab3">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/inv1.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">lv1<span class="aui-padded-l-5">普通小兵</span></p>
                            <p class="aui-font-size-14">无返佣权益</p>
                        </div>
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                    </div>
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【普通小兵】</p>
                        <p class="aui-padded-5">距离升级优秀班长不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
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
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推销算力</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推荐实名注册用户</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">下级产生购买人数</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aui-content tab4 tab-pane" id="tab4">
                <div class="dialog_box">
                    <div class="aui-row">
                        <div class="aui-col-xs-2">
                            <img src="{{asset('resources/assets/images/inv1.png')}}" style="width: 50px
    ">
                        </div>
                        <div class="aui-col-xs-7 aui-padded-l-5">
                            <p class="aui-font-size-18 aui-text-default f_w">lv1<span class="aui-padded-l-5">普通小兵</span></p>
                            <p class="aui-font-size-14">无返佣权益</p>
                        </div>
                        <div class="aui-col-xs-3  aui-label">
                            当前等级
                        </div>
                    </div>
                    <div class="aui-text-center">
                        <p class="aui-text-default">当前等级【普通小兵】</p>
                        <p class="aui-padded-5">距离升级优秀班长不远啦，多多推广吧</p>
                        <p><a href="{{url('gonglue')}}" class="aui-text-info">查看升级攻略</a></p>
                    </div>
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
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推销算力</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">推荐实名注册用户</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
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
                                <p class="aui-text-default">下级产生购买人数</p>
                                <p class="aui-text-default">0T<span class="color_9">(目标：≥0T)</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="aui-bar aui-bar-tab">
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
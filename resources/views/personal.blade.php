@extends('header')

@section('content')
<div class="aui-content">
    <div class="aui-card-list">
        <div class="aui-card-list-header">
            <div class="aui-info aui-padded-b-0">
                <a class="aui-info-item" href="/mobile/profile/edit.html">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width:24px;" class="aui-img-round">
                    <span class="aui-margin-l-5 aui-text-default">{{$user->tel}}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="aui-card-list-content-padded">
        <div class="account aui-text-center">
            <p class="aui-margin-b-5">账户总估值(元)</p>
            <b class="aui-font-size-20">48.199</b>
        </div>
    </div>

    <div class="aui-card-list-footer">
        <div class="aui-row aui-padded-b-15" style="width: 100%;">
            <div class="aui-col-xs-6 aui-text-left">
                <p class="aui-font-size-12" style="margin: 0px; line-height: 14px;" >可用余额(元)</p>
                <b>0.00</b>
            </div>
            <div class="aui-col-xs-6 aui-text-right">
                <a class="aui-btn aui-btn-outlined aui-btn-warning w_4 " href="/mobile/user/withdraw.html">提现</a>
                <a class="aui-btn aui-btn-warning w_4 color_21" href="/mobile/user/recharge.html">充值</a>
            </div>
        </div>
    </div>
</div>
    <div class="aui-content aui-margin-b-15 user_icon">
        <div class="aui-grid">
            <div class="row">
                <div class="aui-col-xs-3 baseA">
                    <a href="{{url('index')}}">
                        <div class="baseline">
                            <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;vertical-align: middle;" class="ico" />
                        </div>
                        <div class="aui-grid-label aui-text-default">我的收益</div>
                    </a>
                </div>
                <div class="aui-col-xs-3 baseA">
                    <a href="{{url('index')}}">
                        <div class="baseline">
                            <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;vertical-align: middle;" class="ico" />
                        </div>
                        <div class="aui-grid-label aui-text-default">我的订单</div>
                    </a>
                </div>
                <div class="aui-col-xs-3 baseA">
                    <a href="{{url('index')}}">
                        <div class="baseline">
                            <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;vertical-align: middle;" class="ico" />
                        </div>
                        <div class="aui-grid-label aui-text-default">我的账单</div>
                    </a>
                </div>
                <div class="aui-col-xs-3 baseA">
                    <a href="{{url('index')}}">
                        <div class="baseline">
                            <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;vertical-align: middle;" class="ico" />
                        </div>
                        <div class="aui-grid-label aui-text-default">我的算力</div>
                    </a>
                </div>

            </div>
        </div>
        <div class="per-list" style="background: #f5f5f5; height: auto; overflow: hidden;">
            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    平台公告
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>
            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    我的订单
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    可购买电费包
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    个人中心
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    我的佣金
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    我的团队
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list" style="margin-top: 20px;">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    提现账号管理
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    常见问题
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    联系我们
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/username.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <div class="per-list-list-mid">
                    关于我们
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
            </div>
            <div class="per-out" style="margin-bottom: 40px;">
                <a href="{{url('logout')}}">安全退出</a>
            </div>
        </div>

    </div>




@stop

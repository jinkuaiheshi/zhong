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
                    <a href="{{url('income')}}">
                        <div class="baseline">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-checklist" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;">
                                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </div>
                        <div class="aui-grid-label aui-text-default">我的收益</div>
                    </a>
                </div>
                <div class="aui-col-xs-3 baseA">
                    <a href="{{url('order')}}">
                        <div class="baseline">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;" >
                                <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h5v-1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5v2.5A1.5 1.5 0 0 0 10.5 6H13v2h1V6L9 1z"/>
                                <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </div>
                        <div class="aui-grid-label aui-text-default">我的订单</div>
                    </a>
                </div>
                <div class="aui-col-xs-3 baseA">
                    <a href="{{url('index')}}">
                        <div class="baseline">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layout-text-sidebar-reverse" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;" >
                                <path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                                <path fill-rule="evenodd" d="M5 15V1H4v14h1zm8-11.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                            </svg>
                        </div>
                        <div class="aui-grid-label aui-text-default">我的账单</div>
                    </a>
                </div>
                <div class="aui-col-xs-3 baseA">
                    <a href="{{url('power')}}">
                        <div class="baseline">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layers-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;" >
                                <path fill-rule="evenodd" d="M3.188 8L.264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l-4.578 2.441a.5.5 0 0 1-.47 0L3.188 8z"/>
                                <path fill-rule="evenodd" d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4zM1.563 6L8 9.433 14.438 6 8 2.567 1.562 6z"/>
                            </svg>
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

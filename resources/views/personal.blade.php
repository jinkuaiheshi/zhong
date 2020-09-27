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
        <div class="account" style="background: #fea85d">
            <div class="card_title">
                <div class="card_title_left">
                    BTC
                </div>
                <div class="card_title_right">
                    <a href="{{url('getBTC')}}" >划转</a>
                    <a href="{{url('huazhuan')}}" >提币</a>
                    <a href="{{url('btc_mingxi')}}" >明细</a>
                </div>
            </div>
            <div class="card_body">
                <div class="card_body_one" style="margin-left: 5%">

                        <p class="per_p">总资产(BTC)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($btc==0) 0.00000000 @else {{number_format($btc,8,'.','')}} @endif</P>
                </div>
                <div class="card_body_one">
                    <p class="per_p"> 可用(BTC)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($btc==0) 0.00000000 @else {{number_format($btc,8,'.','')}} @endif</P>
                </div>
                <div class="card_body_one">
                    <p class="per_p"> 冻结(CNY)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($btc==0) 0.00000000 @else {{$hetong_btc}} @endif</P>
                </div>
            </div>
        </div>
    </div>
    <div class="aui-card-list-content-padded">
        <div class="account aui-text-center" style="background: #96a3c3">
            <div class="card_title">
                <div class="card_title_left">
                    ETH
                </div>
                <div class="card_title_right">
                    <a href="{{url('getETH')}}" >划转</a>
                    <a href="{{url('huazhuanEth')}}" >提币</a>
                    <a href="{{url('eth_mingxi')}}" >明细</a>
                </div>
            </div>
            <div class="card_body">
                <div class="card_body_one" style="margin-left: 5%">

                    <p class="per_p">总资产(ETH)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($eth==0) 0.00000000 @else {{number_format($eth,5,'.','')}} @endif</P>
                </div>
                <div class="card_body_one">
                    <p class="per_p"> 可用(ETH)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($eth==0) 0.00000000 @else {{number_format($eth,5,'.','')}} @endif</P>
                </div>
                <div class="card_body_one">
                    <p class="per_p"> 冻结(CNY)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($eth==0) 0.00000000 @else {{$hetong_eth}}  @endif</P>
                </div>
            </div>
        </div>
    </div>
    <div class="aui-card-list-content-padded">
        <div class="account aui-text-center">
            <div class="card_title">
                <div class="card_title_left">
                    CNY
                </div>
                <div class="card_title_right">

                    <a href="{{url('huazhuanCny')}}" >提现</a>
                    <a href="javascript:void(0)" >明细</a>
                </div>
            </div>
            <div class="card_body">
                <div class="card_body_one" style="margin-left: 5%">

                    <p class="per_p">总资产(CNY)</p>
                    <P class="per_p" style="margin-top: 6px;">{{$todel + $hetong_eth + $hetong_btc + $keyong}} </P>
                </div>
                <div class="card_body_one">
                    <p class="per_p"> 可用(CNY)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($keyong==0) 0.00000000 @else {{$keyong}} @endif</P>
                </div>
                <div class="card_body_one">
                    <p class="per_p"> 冻结(CNY)</p>
                    <P class="per_p" style="margin-top: 6px;">@if($todel==0 ) 0.00000000 @else {{$todel }}  @endif</P>
                </div>
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
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-layout-text-sidebar-reverse" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;" >
                        <path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                        <path fill-rule="evenodd" d="M5 15V1H4v14h1zm8-11.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                    </svg>
                </div>
                <a href="{{url('pingtai')}}"  style="width: 100%;min-height: 44px;line-height: 44px;">
                <div class="per-list-list-mid">
                    平台公告
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="per-list-list">
                <div class="per-list-list-left">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;" >
                        <path d="M9 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h5v-1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5v2.5A1.5 1.5 0 0 0 10.5 6H13v2h1V6L9 1z"/>
                        <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </div>
                <a href="{{url('order')}}"  style="width: 100%;min-height: 44px;line-height: 44px;">
                    <div class="per-list-list-mid">
                        我的订单
                        <div class="per-list-list-right">
                            <i class="glyphicon glyphicon-chevron-right color999"></i>
                        </div>
                    </div>
                </a>
            </div>



            <div class="per-list-list">

                    <div class="per-list-list-left">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;">
                            <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                            <path d="M13.784 14c-.497-1.27-1.988-3-5.784-3s-5.287 1.73-5.784 3h11.568z"/>
                            <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                <a href="{{url('profile')}}"  style="width: 100%;min-height: 44px;line-height: 44px;">
                    <div class="per-list-list-mid">
                        个人中心
                        <div class="per-list-list-right">
                            <i class="glyphicon glyphicon-chevron-right color999"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
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
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;" >
                        <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                    </svg>
                </div>
                <a href="{{url('team')}}"  style="width: 100%;min-height: 44px;line-height: 44px;">
                    <div class="per-list-list-mid">
                        我的团队
                        <div class="per-list-list-right">
                            <i class="glyphicon glyphicon-chevron-right color999"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="per-list-list" style="margin-top: 20px;">
                <div class="per-list-list-left">
                    <img src="{{asset('resources/assets/images/zhifubao.png')}}" style="width: 32px; height: 32px;    vertical-align: middle;" />
                </div>
                <a href="{{url('cash')}}"  style="width: 100%;min-height: 44px;line-height: 44px;">
                    <div class="per-list-list-mid">
                        提现账号管理
                        <div class="per-list-list-right">
                            <i class="glyphicon glyphicon-chevron-right color999"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
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
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;">
                        <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                </div>
                <a href="{{url('contact')}}"  style="width: 100%;min-height: 44px;line-height: 44px;">
                    <div class="per-list-list-mid">
                        联系我们
                        <div class="per-list-list-right">
                            <i class="glyphicon glyphicon-chevron-right color999"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="per-list-list">
                <div class="per-list-list-left">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #f96c02; font-size: 30px;">
                        <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <a href="{{url('guanyu')}}" target="_blank"  style="width: 100%;min-height: 44px;line-height: 44px;">
                <div class="per-list-list-mid">
                    关于我们
                    <div class="per-list-list-right">
                        <i class="glyphicon glyphicon-chevron-right color999"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="per-out" style="margin-bottom: 40px;">
                <a href="{{url('logout')}}">安全退出</a>
            </div>
        </div>

    </div>




@stop
